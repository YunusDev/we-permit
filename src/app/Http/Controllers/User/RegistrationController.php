<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    //

    public function index(){

        $user = auth()->user();

//        return $user;

        if ($user->stage_1){

            return redirect(route('register.stage.two'));

        }

        return view('register.stage1', compact('user'));

    }

    public function store(Request $request){

        $this->validate($request, [

           'fname' => 'required',
           'lname' => 'required',
           'sex' => 'required',
           'dob' => 'required',
           'state_of_origin' => 'required',
           'occupation' => 'required',
           'picture' => 'required|mimes:jpeg,png,jpg',
           'pdf_doc' => 'required|mimes:pdf',
           'word_doc' => 'required|mimes:jpeg, png',

        ]);

        if ($file = $request->file('picture')){

            $picture = time() . $file->getClientOriginalName();
            $file->move('profile_pic', $picture);

        }
        if ($file = $request->file('word_doc')){

            $word_doc = time() . $file->getClientOriginalName();
            $file->move('word_doc', $word_doc);

        }

        if ($file = $request->file('pdf_doc')){

            $pdf_doc = time() . $file->getClientOriginalName();
            $file->move('pdf_doc', $pdf_doc);

        }

        $user = auth()->user();

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->sex = $request->sex;
        $user->state_of_origin = $request->state_of_origin;
        $user->dob = $request->dob;
        $user->picture = $picture;
        $user->occupation = $request->occupation;
        $user->word_doc = $word_doc;
        $user->pdf_doc = $pdf_doc;
        $user->stage_1 = 1;

        $user->save();

        $text = 'Hello, ' . $user->fname. ' You have completed the first stage of the registration';

        Mail::raw($text, function ($message) use ($user) {
            $message->to($user->email);
        });

        return redirect(route('register.stage.two'))->with('success', 'Success! Your Application was submitted successfully!');

    }
}
