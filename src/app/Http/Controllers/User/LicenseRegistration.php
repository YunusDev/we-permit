<?php

namespace App\Http\Controllers\User;

use App\LicenseReg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LicenseRegistration extends Controller
{
    //

    public  function index(){

        $user = auth()->user();

        if (!$user->stage_1){

            return redirect(route('register.stage.one'));

        }

        if ($user->complete_reg){

            return redirect(route('profile'));

        }

        return view('register.license', compact('user'));

    }

    public function store(Request $request){

        $this->validate($request, [

            'application_type' => 'required',
            'test_score' => 'required',
            'state' => 'required',
            'address' => 'required',

        ]);

        $user = auth()->user();

        if ($user->licenseReg){

            $licence_reg = LicenseReg::find($user->licenseReg->id);

        }else{

            $licence_reg = new LicenseReg;

        }

        $licence_reg->application_type = $request->application_type;
        $licence_reg->test_score = $request->test_score;
        $licence_reg->state = $request->state;
        $licence_reg->address = $request->address;
        $licence_reg->user_id = $user->id;
        $licence_reg->is_first_time = $request->is_first_time ? 1 : 0;

        $licence_reg->save();

        $user->complete_reg = 1;

        $user->save();

        $text = 'Success!, ' . $user->fname. ' You have successfully completed the vehicle license registration';

        Mail::raw($text, function ($message) use ($user) {
            $message->to($user->email);
        });

        return redirect(route('profile'));

    }
}
