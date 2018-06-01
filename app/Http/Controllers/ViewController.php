<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\User;
use Auth;
use App\Itemincoming;
use App\Itemoutgoing;
use App\Item;

class ViewController extends Controller
{
  public function indexPage(){
    $data[0] = Itemincoming::select('updated_at','item_id','quantity','user_id')->where('updated_at','>=',today())->orderBy('updated_at', 'id')->get()->toArray();
    $data[1] = Itemoutgoing::select('updated_at','item_id','quantity','user_id')->where('updated_at','>=',today())->orderBy('updated_at', 'id')->get()->toArray();
    $data[2] = Item::all();
    $data[3] = User::all();
    $data[4] = Itemincoming::all()->groupBy('item_id')->toArray();
    $data[5] = Itemoutgoing::all()->groupBy('item_id')->toArray();
    $data[6] = [];
    $data[7] = [];
    $data[8] = collect($data[0])->merge(collect($data[1]))->sortBy('updated_at')->reverse()->unique('item_id')->keyBy('item_id');
    $data[9] = $data[2]->where('')->sortBy('name')->toArray();

    // array_map(function($items){

    //   $sum = 0;
    //   foreach($items as $item){
    //     $sum += $item['quantity'];
    //   }

    //   return($sum);
    // },$data[4]);

    // dd($data[4]);

    foreach($data[4] as $key => $items){
      $sum = 0;
      foreach($items as $item){
        $sum += $item['quantity'];
      }
      array_push($data[6],['item_id' => $key,'quantity' => $sum]);
      // array_push($data[6],[$key => $sum]);
    }
    $data[6] = collect($data[6])->keyBy('item_id');

    foreach($data[5] as $key => $items){
      $sum = 0;
      foreach($items as $item){
        $sum += $item['quantity'];
      }
      array_push($data[7],['item_id' => $key,'quantity' => $sum]);
      // array_push($data[6],[$key => $sum]);
    }
    $data[7] = collect($data[7])->keyBy('item_id');
    // dd($data[7]);

    // $data[1] = Itemoutgoing::all();
    // $data[0] = Itemincoming::all();


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
