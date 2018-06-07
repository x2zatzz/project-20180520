<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use App\User;
use App\Item;
use App\Transaction;

class ViewController extends Controller
{
  public function indexPage(){
    $data[0] = User::all();
    $data[1] = Item::all();
    $data[2] = Transaction::all()->sortByDesc('updated_at');
    $data[3] = Transaction::all()->where('type','check-in')->where('updated_at','>=',today())->sortByDesc('updated_at');
    $data[4] = Transaction::all()->where('type','check-out')->where('updated_at','>=',today())->sortByDesc('updated_at');
    $data[5] = array(); //list of non-empty items

    foreach($data[1]->toArray() as $items){
      if($data[2]->where('item_id', $items['id'])->where('type','check-in')->sum('quantity')-$data[2]->where('item_id', $items['id'])->where('type','check-out')->sum('quantity') > 0){
        array_push($data[5],$items['id']);
      }
    }

    if(Auth::check()){
      $username = Auth::user()->username;
      $role = Auth::user()->role;

      if($role === 'manager'){


      } else if($role === 'staff'){


      }

      $snackbar = session('snackbar');
      $message = session('message');
      $webheader = 'index';

    } else{
      $username = null;
      $role = 'guest';
      $webheader ='index';
      $snackbar = session('snackbar');
      $message = session('message');
    }

    return view('index', [
        'snackbar' => $snackbar,
        'message' => $message,
        'webheader' => $webheader,
        'username' => $username,
        'role' => $role,
        'data' => $data,
      ]
    );
  }

  public function inventoryPage(){
    $webheader = 'staff';
    return view('index');
  }


  public function accountsPage(){
    if(Auth::check()){
      $role = Auth::user()->role;
      $username = Auth::user()->username;
      switch($role){
        case 'staff':
          break;

        case 'manager':
          $webheader = 'user-management';
          $snackbar = 'snackbar-success';
          $message = 'user profiles loaded';
          $data = User::all()->toArray();

          return view('accounts',
            [
              'snackbar' => $snackbar,
              'message' => $message,
              'webheader' => $webheader,
              'username' => $username,
              'role' => $role,
              'data' => $data,
            ]
          );
          break;

        default:

          break;
      }
    } else{

    }

  }

}
