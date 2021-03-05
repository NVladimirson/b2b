<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use App\Models\Company\CompanyStorage;
use App\Models\Option\Option;
use App\Models\Option\OptionValue;
use App\Models\Product\Product;
use App\Models\Storage\Storage;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function datatableIndex(Request $request){

    }

    public function index (Request $request){

    }

    public function store(Request $request){

    }

    public function create(Request $request){

    }

    public function show (Request $request, $id){
        if($id == auth()->user()->company_id){
            $company = Company::with(['company_storages.storage.names','users'])->find($id);
            $company->storages = $company->company_storages->pluck('storage')->map(function ($item){
                return ['id' => $item->id, 'name' => $item->localized_name];  
              });

            return view('companies.show',compact('company'));
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

}
