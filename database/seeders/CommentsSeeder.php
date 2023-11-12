<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Article;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $this->command->getOutput()->progressStart(count($articles));
        $faker = Factory::create('pl_PL');

        foreach($articles as $article)
        {
            $commentsCount = random_int(30, 1000);

            for($i=$article->comments()->count()+1; $i <= $commentsCount; $i++)
            {
                $article->comments()->updateOrCreate([
                    "user_id" => 1,
                ], [
                    "content" => $faker->realText(random_int(10, 500)),
                ]);
            }

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();

    }
}
