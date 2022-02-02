<?php

namespace App\Http\Controllers;

use App\Models\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserFormController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        if(!is_string($request->phone)){ 
            return response()->json([
                'status'  => 422,
                'message' => 'Numbers should not be string'
            ]);
        }

        if(strlen($request->phone) > 10 || strlen($request->phone) < 10 )  {
            return response()->json([
                'status'  => 422,
                'message' => 'Number format is not correct'
            ]);
        }

        UserForm::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        $email = $request->get('email');
        $name  = $request->get('username');

        Mail::send([], [
            'name' => $request->name,
            'email' => $request->email,
            'comment' => "Thank you for submission the form" ],
            function ($message) use ($email,$name){
                    $message->from('aryalkrishna642@gmail.com');
                    $message->to($email, $name)
                            ->subject('Hello from test project');
    });

        return back()->with('success', 'Thank you submitting the form. Check your mailtrap inbox');
    }
}
