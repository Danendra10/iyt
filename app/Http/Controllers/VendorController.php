<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Vendor;

class VendorController extends Controller
{
    // public function vendorData()
    // {
    //     $vendordatas = Vendor::where("email", "=", Auth::user()->email)->first();

    //     return view("partner.Vendor.")
    // }

    public function login(Request $req)
    {
        // echo "masuk kok";
        // $credentials = ['email' => $req->email, 'password' => $req->password];
        // if (Auth::attempt($credentials))
        //     return redirect('/partner/vendor/dashboard');
        // else
        //     echo "failed to login";

        $cred = Vendor::where(["email" =>$req])->first();

        echo $req->email;
        echo $req->password;

        if($cred && Hash::check($req->input("password"), $cred->password)){
            return "Username or Password doesn't match";
        } else{
            $req->session()->put('vendors', $cred);
            return redirect("/partner/vendor/dashboard");
        }
    }
}
