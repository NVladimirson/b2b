<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\Storage\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index(Request $request){
        $storages = Storage::first();
        dd($storages);
        return view('storages.index');
    }

    public function show(Request $request, $id){
        $storage_info = Storage::find($id);
        return view('storages.show');
    }
}
