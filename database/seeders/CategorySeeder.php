<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = "Kategoria newsów i artykułów dotyczących seriali wydawnictwa DC Comics, takich jak: Titans, Swamp Thing, Lucifer, Preacher, Stargirl i Gotham.";
        $defaultCategories = [
            "Finanse i Ekonomia" => ["Bankowość", "Finanser osobiste", "Inwestowanie"],
            "Rolnictwo" => ["Fundusze unijne", "Hodowla", "Uprawy"],
            "Twórczość" => ["Poezja", "Książki"],
            "Komputery" => ["Grafika i animacja", "Gry", "Konsole", "Tworzenie stron"],
            "Motoryzacja" => ["Motocykle", "Tuning", "Wyścigi"],
            "Polityka" => [],
            "Rozwój osobisty" => ["Coaching", "Medytacja", "Zarządzanie czasem"],
            "Technologia" => ["Sztuczna inteligencja", "RTV"],
            "Sport" => ["Sporty walki", "eSport", "Sport zimowe", "Piłka nożna", "Siatkówka", "Rugby"]
        ];

        foreach ($defaultCategories as $category => $subCategories) {
            $createdCategory = Category::firstOrCreate(['name' => $category, 'description' => $description]);
            foreach($subCategories as $subCategory) {
                $createdCategory->subCategories()->firstOrCreate(['name' => $subCategory, 'description' => $description]);
            }
        }
    }
}
