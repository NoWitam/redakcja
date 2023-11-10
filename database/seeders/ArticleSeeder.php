<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Hubert Golewski',
            'email' => 'wowek31@gmail.com',
        ], ['password' => Hash::make('admin')]);

        $article = Article::firstOrCreate([
            'name' => 'Multi-Process PHP',
            'category_id' => Category::where('slug', 'tworzenie-stron')->first()->id,
            'user_id' => $user->id,
        ], ['published_at' => Carbon::now()]);

        if($article->wasRecentlyCreated) {
            $article->sections()->create([
                'title' => 'Creating Processes',
                'content' => '<p> You probably know a few of the ways to execute shell commands from PHP scripts. It usually goes something like:

                exec("php child.php");
                Not exactly thrilling stuff. But it is the cornerstone of everything I’m going to show you today. That exec() function causes a separate runtime process to spin up, so that child.php can be executed.

                Please escape all command parameters, using something like escapeshellarg()!

                Now, in order to manage these child processes, we need some way of… </p>'
            ]);

            $article->sections()->create([
                'title' => 'Getting A Process ID',
                'content' => '<p> The exec() function only returns the results of executing the child process. It doesn’t tell us anything about the process as it is running. What we need is the PID of the child process. We can do that will a little bash trickery…

                $ echo "hello world" > /dev/null
                Redirecting output to /dev/null means we don’t see stuff that would usually go to stdout. See what happens when you enter this in terminal:

                $ echo "hello world" > /dev/null & echo $!
                What you get is the PID of the process! </p>'
            ]);

            $article->sections()->create([
                'title' => 'Getting Process Load',
                'content' => '<p> So we know how to start child processes, and how to get their PID. If we want to tell how much CPU and memory load our child processes are calling, then we can use their PID to check:

                $ ps -o pid,%cpu,%mem,state,start -p 123
                Replace 123 with the PID of a child process and you’ll get the PID returned, along with % CPU usage, % memory usage, process state and the time the process was started. This is all very useful stuff for working out how healthy child process are, and how many child processes you can reliably spawn before overloading the system. </p>'
            ]);

            $article->sections()->create([
                'title' => 'Killing Processes',
                'content' => '<p> Finally, we need a way to kill child processes. Once you know the ID of a process, killing it is simple:

                $ kill -9 123
                -9 is a strong suggestion to the child process that it needs to stop. You may want to avoid using it if there are clean-up operations that need to be run, or if you want the worker to be able to intercept interrupt codes and gracefully stop. </p>'
            ]);

            $article->sections()->create([
                'title' => 'Putting It All Together',
                'content' => '<p> I won’t go into minute detail, but the main loop looks like this:

                public function tick()
                {
                    $waiting = array();
                    $running = array();

                    foreach ($this->waiting as $task) {
                        if (!$this->canRunTask($task)) {
                            $waiting[] = $task;
                            continue;
                        }

                        $binary = $this->getBinary();
                        $worker = $this->getWorker();
                        $stdout = $this->getStdOut();
                        $stderr = $this->getStdErr();

                        $pid = $this->getShell()->exec(
                            "{$binary} {$worker} %s {$stdout} {$stderr} & echo $!",
                            array(
                                $this->getTaskString($task),
                            )
                        );

                        $task->setId($pid);

                        $this->running[] = $task;
                    }

                    foreach ($this->running as $task) {
                        if (!$this->canRemoveTask($task)) {
                            $running[] = $task;
                        }
                    }

                    $this->waiting = $waiting;
                    $this->running = $running;

                    return count($waiting) > 0 || count($running) > 0;
                }
                This tick() method runs at short intervals. It’s the kind of “work” function that you would expect to see in a task or task manager. Each time it is run, it checks for queued (or “waiting”) tasks.

                There’s a canRunTask() method (not included) which is used to see if the task can be run. This is where you could put logic about the number of tasks that the manager is permitted to run in parallel.

                If a task is not allowed to be run then it is put back in the queue. If it is allowed to be run then the method spawns a new child process and returns the PID. $binary is the path to the PHP binary and $worker is a path to the worker script that unserialises a task for evaluation. We’ll see an example of that worker script shortly…

                Once a child process is created, we store the PID and move the task to the “running” array. Then, for each task in the “running” array; we check to see if it can be removed. The canRemoveTask() method (not included) should return true if the process is no longer running or has stalled. It’s also a good place to add logic about whether the task has expired.

                Finally, we return true if there are still queued or running child processes. This means tick() will return true until all child processes are completed. It’s best suited to a long-running process, though even if the manager script terminates, the child processes will run to completion.

                Now, let’s take a look at that worker script:

                if (count($argv) < 2) {
                    throw new InvalidArgumentException("Invalid call");
                }

                array_shift($argv);

                $task = array_shift($argv);
                $task = @unserialize($task);

                if ($task instanceof Task) {
                    $handler = $task->getHandler();

                    $object = new $handler();

                    if ($object instanceof Handler) {
                        $object->handle($task);
                    }
                }
                The worker script needs to check to make sure a serialised task has been supplied, as an argument. $argv holds all arguments, the first of which is the name of the script PHP is executing (from the command line). If the script is called worker.php and the command being run is php worker.php foo then $argv[0] is worker.php and $argv[1] is foo.

                We shift the script off the front of $argv and unserialise the task. If you want to send multi-line data then it’s probably best to base64_encode() and base64_decode() the serialised task before trying to spawn a child process.

                We use @ in case the provided task string is invalid, and can’t be unserialised. Then we check the type. If the task implements the interface we expect, and it has the handler we expect, and the handler implements an interface we expect… </p>'
            ]);

            $article->sections()->create([
                'title' => 'Doorman',
                'content' => '<p> Recently I put all of this together in a library, called Doorman. It wraps all of these tricks up in a simple, tested package. You can use it like this:

                use AsyncPHP\Doorman\Manager\ProcessManager;
                use AsyncPHP\Doorman\Task\ProcessCallbackTask;

                $task1 = new ProcessCallbackTask(function () {
                    print "in task 1";
                });

                $task2 = new ProcessCallbackTask(function () {
                    print "in task 2";
                });

                $manager = new ProcessManager();

                $manager->addTask($task1);
                $manager->addTask($task2);

                while ($manager->tick()) {
                    usleep(250);
                }
                You can install it in your projects with:

                $ composer require asyncphp/doorman
                There are some detailed docs, but it works on the principles I’ve outlined in this post. </p>'
            ]);

            $article->sections()->create([
                'title' => 'Conclusion',
                'content' => '<p> I built this library so that SilverStripe queued jobs can be executed in parallel. We’re in the process of integrating it with queued jobs module, which is a fundamental part of the SilverStripe framework and CMS.

                Users can issue jobs to be run in the future, and those jobs are stored in a database. Once a minute, a cron job runs a script which starts a manager. This manager fetches jobs from the database, and executes them in parallel (assuming parallel execution has been enabled).

                It’s one small way in which asynchronous code execution can be used in every-day applications.

                One of the challenges, when writing this library, was that we wanted to allow SilverStripe developers to be able to upgrade (with a minor version) and have all this shiny new stuff. That meant using as few extensions (like PCNTL and Pthreads) as possible, and supporting PHP 5.3.

                I had loads of fun working within those constraints. Ultimately, the only feature I really missed was traits. The exec() function is just a really old part of PHP, and yet it’s all we need for this kind of execution model.

                I intend to continue developing Doorman. There are already some awesome ideas being suggested by my co-workers. I’m also looking for ways to use it in my other projects, and suggesting it where I think it could be useful for others.

                If you have questions about it, or would like to give feedback on the library… speak to me on Twitter I guess! </p>'
            ]);
        }

        $article = Article::firstOrCreate([
            'name' => 'Składanie komputera',
            'category_id' => Category::where('slug', 'komputery')->first()->id,
            'user_id' => $user->id,
        ], ['published_at' => Carbon::now()]);

    }
}
