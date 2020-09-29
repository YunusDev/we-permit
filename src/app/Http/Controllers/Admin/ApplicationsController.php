<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    //

    public function index(){

        $applications = User::where('complete_reg', 1)->latest()->get();

        return view('admin.application.reviewer', compact('applications'));

    }

    public function reviewApp(Request $request, $id){

        $user = User::find($id);

        $user->reviewer_approves = $request->is_approved;

        if(!$request->is_approved){

            $user->reviewer_comment = $request->comment;

            $text = 'Hello!, ' . $user->fname. ' Your registration was rejected by the reviewer because of some reasons. which are - ' . $request->comment;

            Mail::raw($text, function ($message) use ($user) {
                $message->to($user->email);
            });


        }
        $user->save();

        return $user;

    }

    public function viewAppProcessor(){

        $applications = User::where('reviewer_approves', 1)->latest()->get();

        return view('admin.application.processor', compact('applications'));

    }


    public function reviewAppProcessor(Request $request, $id){

        $user = User::find($id);

        $user->processor_approves = $request->is_approved;

        if(!$request->is_approved){

            Log::debug("-----------");;

            $user->processor_comment = $request->comment;

            $text = 'Hello!, ' . $user->fname. ' Your registration was rejected by the processor because of some reasons. which are - ' . $request->comment;

            Mail::raw($text, function ($message) use ($user) {
                $message->to($user->email);
            });


        }else{

            Log::debug("************");;

            $text = 'Hello!, ' . $user->fname. ' Your application have been accepted. Gracias!';

            Mail::raw($text, function ($message) use ($user) {
                $message->to($user->email);
            });




        }
        $user->save();

        return $user;

    }
}
