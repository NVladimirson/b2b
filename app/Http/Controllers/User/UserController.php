<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function profile()
  {
    $permissions = auth()->user()->getRole->getRolePermission->only(['order','manage_orders','manage_content_storages','admin']);
    $role = auth()->user()->getRole->getRolePermission->getRole->role;
    $company = Company::find(auth()->user()->company_id);
    //dd($permissions,$role,$company);
    return view('user.profile', compact('permissions','role','company'));
  }
  public function settings()
  {
    return view('user.settings');
  }
  public function log()
  {
    return view('user.log');
  }
}
