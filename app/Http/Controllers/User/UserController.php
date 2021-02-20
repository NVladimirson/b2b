<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function profile()
  {
    return view('user.profile');
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
