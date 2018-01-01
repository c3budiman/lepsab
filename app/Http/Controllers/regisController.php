<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Redirect;

class regisController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest');
  }

  public function getRegis()
  {
    return view('FormRegister');
  }

  public function postRegis()
  {
    $rolesnya = DB::table('roles')->select('id')->where('namaRule', '=', 'Admin')->get()->first()->id;
    $user = new User();
    $user->email = Input::get('email');
    $user->name = Input::get('nama');
    $user->password = bcrypt(Input::get('password'));
    $user->roles_id = $rolesnya;

    $user->save();
    return redirect('loginadmin');
  }

}
