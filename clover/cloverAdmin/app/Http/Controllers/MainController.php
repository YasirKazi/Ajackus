<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',  
            'password' => 'required'
         ]);

         $userData = array(
             'name'     => $request->get('name'),
             'password'     => $request->get('password')
         );

         if(Auth::attempt($userData))
         {
            return redirect('login/successLogin');
         }
         else
         {
            return back()->with('error', 'Invalid Login Details');
         }
    }

    public function successLogin()
    {
        return view('/home');
    }    
}