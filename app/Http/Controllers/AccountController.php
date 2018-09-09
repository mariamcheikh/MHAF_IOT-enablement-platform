<?php
/**
 * Created by PhpStorm.
 * User: Mariam
 * Date: 21/05/2018
 * Time: 01:48
 */

namespace App\Http\Controllers;
use  Illuminate\Http\Request;

use JWTAuth;

class AccountController extends Controller

{


    public function __construct()
    {
        $this -> middleware('jwt.auth');
    }
    public  function  index(){
        $user = JWTAuth::toUser();
        return response()->json($user);
    }


}