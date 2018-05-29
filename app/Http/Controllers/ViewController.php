<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ViewController extends Controller
{
  public function indexPage(){

    if(Auth::check()){
      $username = Auth::user()->username;
      $role = Auth::user()->role;
      $snackbar = session('snackbar');
      $message = session('message');
      $webheader = 'index';

    } else{
      $username = null;
      $role = 'guest';
      $webheader ='index';
      $snackbar = session('snackbar');
      $message = session('message');

      // if(!isset($snackbar)){
      //   $snackbar = 'snackbar-greet';
      //   $message = 'Welcome Guest!';
      // } else{
      //   $snackbar = session('snackbar');
      //   $message = session('message');
      // }
    }

    // if(Auth::check()){
    //   $username = User::find(Auth::id()->username);
    //   $role = User::find(Auth::id()->role);
    // } else{
    //   $username = null;
    //   $role = 'guest';
    // }

    return view('index', [
        'snackbar' => $snackbar,
        'message' => $message,
        'webheader' => $webheader,
        'username' => $username,
        'role' => $role,
      ]
    );
  }

  public function inventoryPage(){
    $webheader = 'staff';
    return view('index');
  }


  public function accountsPage(){
    if(Auth::check()){
      $role = User::find(Auth::id())->first()->role;

      switch($role){
        case 'staff':

          break;

        case 'manager':

          break;

        default:

          break;
      }
    } else{

    }

  }

}
