<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageProduct extends Model
{
    use HasFactory;

    public function storage(){
      //'App\Models\Storage\Storage'
      return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
}
