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
        $input['name'] = $req->name;
        $email_target = $req->email;
        // $email_target = "danendraclever24@gamil.com";

        $reg_rule = array('email' => 'required|email|unique:users,email', 'password' => 'required|min:8', 'name' => 'required');

        $validator = Validator::make($input, $reg_rule);

        // if ($validator->fails()) {
        //     return redirect('/register')->with('failed', 'Email has been registered, please use another email');
        // } 
        // else {
            User::create([
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "name" => $req->name,
            ]);

            $user = User::where("email", "=", $email_target)->first();

            $data = array(
                "id" => $user->id
            );

            FacadesMail::send('main.email.veriffication', $data, function ($message) use ($email_target) {
                $message->to($email_target, $email_target)->subject("Account Veriffication");
                $message->from("enginerredstone0@gmail.com");
            });
            return redirect("/register")->with("success", "Please kindly check your email for veriffication");
        // }
    }

    // public function register_dummy()
    // {
    //     FacadesMail::to("danendraclever24@gmail.com", "danendraclever24@gmail.com")->subject("email verif")->from("enginerredstone0@gmail.com");
    //     FacadesMail::send()
    //     // FacadesMail::send('email.veriffication', $data, function($message) use ($email_target){
    //     //     $message->to($email_target, $email_target)->subject("Account Veriffication");
    //     //     $message->from("enginerredstone0@gmail.com");
    //     // });
    // }

    public function login(Request $req)
    {
        $credentials = ['email' => $req->email, 'password' => $req->password];
        if (Auth::attempt($credentials))
            return redirect('/');
    }

    public function verify($id)
    {
        $succes = User::where(['id' => $id])->update(["register_status" => 1]);

        if ($succes)
            return redirect("/login")->with("success", "You've registered your account successfully");
        else
            return redirect("/login")->with("failed", "Failed on registering your account");
    }
}
