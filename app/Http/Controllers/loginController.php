<?php

namespace LoginApp\Http\Controllers;

use Illuminate\Http\Request;

use LoginApp\Http\Requests;
use LoginApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable; 
use LoginApp\User;
use Input;
use Illuminate\Support\Facades\Redirect;
use DB;
 use Session;
 use Mail;
 use View;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showlogin()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $flag_confirmed = false;
        $email = Input::get('email');
        $users = DB::table('log')->get();
        $message = '';
        $found = false;
        $pass = Input::get('password');

        foreach ($users as $user)
              {
                $message = $message.$user->email.$user->confirmed;
                 if($user->email == $email)
                 {
                     $message = $user->email;   
                     if($user->confirmed == true)
                     {
                         $flag_confirmed = true;
                         //$message = $message.'confirmed';
                     }
                     //else if(!$user->confirmed)
                         //$message = $message.'not confirmed';
                 }
             }
             
                   if($flag_confirmed == true)
                   {
                   if (Auth::attempt($request->only('email', 'password')))  
                      {  
                        return view('/home');
                      }
                   }
                  else if($flag_confirmed == false)

                     {

                      return redirect('/login')->with('message', 'Account not activated');
                     }


    
    // else if($user->email != $email)
     //{
        return redirect('login')->with('messageerror','Username Or Password Is Incorrect');
    //}
                
              

  }      
        
        


//return redirect('login')->with('messageerror','Username Or Password Is Incorrect');
    




    
public function logout()
{
    Session::flush();
      Auth::logout();  
 
       return redirect('/');  
}

    
}
