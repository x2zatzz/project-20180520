<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FetchController extends Controller
{
  public function main(){



    return json_encode($data);
  }
}
