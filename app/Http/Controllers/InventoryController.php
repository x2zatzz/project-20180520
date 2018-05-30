<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class InventoryController extends Controller
{
  public function view(){
    if(Auth::check()){
      $role = Auth::user()->role;
    } else{
      $role = 'guest';
    }


    switch($role){
      case 'manager':
        $webheader = 'inventory';
        return view('inventory',
          [
            'webheader' => $webheader,
            'role' => $role,
            'data' => $data,
          ]
        );
        break;

      case 'staff':
        break;

      default:
        break;
    }

  }

}
