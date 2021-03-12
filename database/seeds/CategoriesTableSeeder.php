<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        [
          "name" => "italiano",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "messicano",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "cinese",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "giapponese",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" =>  "indiano",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "carne",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" =>   "pesce",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "vegetariano",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "pizza",
          "img" => "asdfasdfasdf"
        ],
        [
          "name" => "fast-food",
          "img" => "asdfasdfasdf"
        ]

      ];
      foreach($categories as $category) {
        $newCategory = new Category();
        $newCategory->name = $category['name'];
        $newCategory->img = $category['img'];
        $newCategory->save();
      }
      
    }
}
