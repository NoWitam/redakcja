<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $this->command->getOutput()->progressStart(count($articles));

        foreach($articles as $article)
        {
            $reactionCount = random_int(15000, 30000);

            for($i=1; $i <= $reactionCount; $i++)
            {
                $article->reactions()->updateOrCreate([
                    "user_id" => $i,
                ], [
                    "type" => random_int(1, 6),
                ]);
            }

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
