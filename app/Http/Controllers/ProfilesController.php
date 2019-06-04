<?php
namespace App\Http\Controllers;
use \App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findorFail($user); /** Aca llamamos a la clase User, para guardarlo en una variable $user */

        return view('profiles.index',[
            'user' => $user,

            ]);


    }
}
