<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Category\CategoryName::factory(400)->create();
      \Cache::pull('counter');
      for ($i = 1; $i <= 400; $i++) {
        if($i%2){
          $category =  \App\Models\Category\CategoryName::find($i);
          $category->category_id = ($i + $i%2)/2;
          $category->name = 'Category #'.strval(($i + $i%2)/2);
          $category->save();
        }
        else{
          $category =  \App\Models\Category\CategoryName::find($i);
          $category->category_id = $i/2;
          $category->language = 'ru';
          $category->name = 'Категория #'.strval($i/2);
          $category->save();
        }
      }
    }
}
