<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //


    public function index(){


        $user = auth()->user();


        if (!$user->stage_1){

            return redirect(route('register.stage.one'));

        }

        if (!$user->complete_reg){

            return redirect(route('register.stage.two'));

        }

        return view('auth.profile', compact('user'));

    }
}
