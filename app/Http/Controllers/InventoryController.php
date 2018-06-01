<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class InventoryController extends Controller
{
  public function checkout(Request $request){
    dd($request);


    
    return redirect('/');
  }
}
