<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Socialite;
 
class SocialAuthController extends Controller
{
    //
    public function redirect($service)
    {
        //dd($service);
        return Socialite::driver($service)->redirect();
        
    }
 
    public function callback($service)
    {
        //$user = Socialite::with($service)->user();
        $user = Socialite::driver($service)->stateless()->user();
        //dd($user);
        return view ('home')->withDetails($user)->withService ($service);
    }
}