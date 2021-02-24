<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Category\Category::factory(200)->create();
      \Cache::pull('counter');
      // for ($i=1; $i <= 200; $i++) {
      //   $category =  \App\Models\Category\Category::find($i);
      //
      //   if(rand(0,1)){
      //     $category->parent = $i;
      //   }else{
      //     $category->parent = rand(1,200);
      //   }
      //
      //   $category->save();
      // }
    }
}
