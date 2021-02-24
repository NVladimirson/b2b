<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function names(){
      return $this->hasMany('App\Models\Category\CategoryName','category_id');
    }
}
