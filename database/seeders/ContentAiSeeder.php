<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ContentAiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        Article::truncate();

        $days = 30;
        $this->command->getOutput()->progressStart($days);

        $faker = Factory::create('pl_PL');
        $start = Carbon::now()->subDays($days);


        for($i=0; $i < 10; $i++)
        {
            User::create([
                'name' => $faker->firstName . " " . $faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('admin'),
                'type' => UserType::Writer->value,
                'created_at' => $start->timestamp,
                'updated_at' => $start->timestamp,
            ]);
        }

        $categories = Category::with('subCategories')->whereNull('category_id')->get();

        for($i=0; $i < $days; $i++)
        {
            $timestamp = $start->timestamp;

            foreach($categories as $category)
            {
                $numbersOfArticles = random_int(10, 15);

                for($j=0; $j < $numbersOfArticles; $j++)
                {
                    $articleTimestamp = $timestamp + random_int(60, 60*60*20);

                    $randomSubcategory = random_int(0, count($category->subCategories));
                    $randomSubcategory--;
                    if($randomSubcategory == -1) {
                        $randomSubcategory = $category;
                    } else {
                        $randomSubcategory = $category->subCategories[$randomSubcategory];
                    }

                    Article::create([
                        'name' => "000test000 " . str()->uuid(),
                        'category_id' => $randomSubcategory->id,
                        'user_id' => random_int(1, 10),
                        'created_at' => $articleTimestamp,
                        'updated_at' => $articleTimestamp,
                        'published_at' => $articleTimestamp
                    ]);

                }
            }

            $start->addDays(1);
            $this->command->getOutput()->progressAdvance();
        }

    }
}
