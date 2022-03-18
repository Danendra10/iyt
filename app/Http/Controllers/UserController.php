<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Mail;

use App\Models\User;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserController extends Controller
{

    public function register(Request $req)
    {
        $input['email'] = $req->email;
        $input['password'] = $req->password;
        $email_target = $req->email;

        $reg_rule = array('email' => 'required|email|unique:users,email', 'password' => 'required|min:8');

        $validator = Validator::make($input, $reg_rule);

        if($validator->fails())
            return redirect('/register')->with('failed', 'Email has been registered, please use another email');
        else{
            User::create([
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "access_right" => 0,
            ]);

            $user = User::where("email", "=", $email_target)->first();

            $data = array(
                "id" => $user->id
            );

            FacadesMail::send('email.veriffication', $data, function($message) use ($email_target){
                $message->to($email_target, $email_target)->subject("Account Veriffication");
                $message->from("danendraclever24@gmail.com");
            });
        }
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
