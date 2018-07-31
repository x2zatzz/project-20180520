<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class AuthController extends Controller
{
  public function form(){
    // switch(User::find(Auth::id())->role){
    //   case 'staff':
    //     break;

    //   case 'manager':
    //     break;

    //   default:
    //     break;
    // }

    // if(isset($username)){
    // } else{
    //   $username = null;
    // }

    // if(isset($role)){
    // } else{
    //   $role = 'guest';
    // }

    // return view('auth');

    if(!Auth::check()){
      return view('auth',
        [
          'role' => 'guest',
          'webheader' => 'signin',
        ]
      );
    } else{

    }
  }

  public function check(Request $request){
    if(Auth::check()){
      Auth::logout();

      return redirect('/')->with(
        [
          'snackbar' => 'snackbar-success',
          'message' => 'Sign-out successful',
        ]
      );

    } else{
      $username = $request->input('username');

      if(count(User::where('username', $username)->get()) === 0){
        return redirect()->intended('/')->with(
          [
            'snackbar' => 'snackbar-fail',
            'message' => "\"$username\" is not registered",
          ]
        );
      } else{

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
          return redirect()->intended('/')->with(
            [
              'snackbar' => 'snackbar-success',
              'message' => 'Log-In successful',
            ]
          );

        } else{
          return redirect('')->with(
            [
              'snackbar' => 'snackbar-fail',
              'message' => 'Log-In failed',
            ]
          );
        }
      }

    }




    // $username = $request->input('username');
    // $password = $request->input('password');



    // $data = User::where('username', $username)->first();

    // // dd($password);
    // // dd($data->password);
    // // dd(Hash::check($password, $data->password));


    // if($data !== null){
    //   if(Hash::check($password, $data->password)){
    //     $role = $data->role;
    //     $username = $data->username;
    //     $snackbar = 'success';
    //     $message = 'Login Successful';
    //   } else{
    //     $role = 'guest';
    //     $username = null;
    //     $snackbar = 'fail';
    //     $message = 'Wrong Password';
    //   }
    // } else{
    //   $role = 'guest';
    //   $username = null;
    //   $snackbar = 'fail';
    //   $message = 'Login Failed';

    // }
    // $webheader = 'index';

    // return redirect()->intended('/')->with(
    //   [
    //     'webheader' => $webheader,
    //     'username' => $username,
    //     'role' => $role,
    //     'snackbar' => $snackbar,
    //     'message' => $message,
    //   ]
    // );
    // return redirect('/',
    // );
    // return view('main',
    //   [
    //     'webheader' => $webheader,
    //     'username' => $username,
    //     'role' => $role,
    //     'snackbar' => $snackbar,
    //     'message' => $message,
    //   ]
    // );
  }

  public function adduser(Request $request){
    echo $request;
  }
}
