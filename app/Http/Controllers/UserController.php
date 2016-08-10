<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Http\Requests;

class UserController extends Controller
{

    public function store(Request $request){

      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');

      Log::info("Logger written as - It's Working!");
      $monolog = Log::getMonolog();
      var_dump($monolog);
      //return json_decode($monolog['handlers'][0]);
    }

    public function signin(Request $request){
      $email = $request->input('email');
      $password = $request->input('password');
      return "It's Working!";
    }
}
