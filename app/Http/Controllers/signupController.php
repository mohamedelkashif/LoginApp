<?php

namespace LoginApp\Http\Controllers;

use Illuminate\Http\Request;

use LoginApp\Http\Requests;
use LoginApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use LoginApp\User;
use Illuminate\Mail\Mailer;
use Illuminate\Contracts\Mail\Mailer as Mail;
use Hash;
use View;
use DB;
use Auth;
//use Illuminate\Support\Facades\Mail;

class signupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function register()
    {
        return view('register');
    }

    public function doregister(Request $request)
    {

         $activation_code = str_random(60);
        if(Input::get('password') == Input::get('confpassword')){
                    $user = new User;
                    $user->firstname=Input::get('firstname');
                    $user->lastname=Input::get('lastname');
                    //$user->password=Hash::make(Input::get('password'));
                    $user->email=Input::get('email');
                    $user->password=Hash::make(Input::get('password'));
                    $user->confirmpass=Hash::make(Input::get('confpassword'));
                    $user->confirmationcode = $activation_code;
                    //$user->confirmed = false;
                     $user->confirmed = false;
                    if($user->save())
                    {
                        \Mail::send('emails.activiateaccount', array(
                            'key' => $user->firstname,'code' => $activation_code
                            ), function($message) use ($user) {
                            $message->to(Input::get('email'), 'Please activate your account.')->subject('Mail Verification');});
                        return View::make('thanks');
                    }
                    }
                else if(Input::get('password') != Input::get('confpassword'))
                    return Redirect::to('signup');
                     
    }




    public function confirmationState($confirmationCode)
    {
        
        
        $users = DB::table('log')->get();
        $found = false;
        $auth = false;
        $message = '';
        foreach ($users as $user)
        {
            if($user->confirmationcode == $confirmationCode)
            {
                $found = true;
                DB::table('log')
                ->where('email', $user->email)
                ->update(array('confirmationcode' => '','confirmed'=>true));
                $userx =  DB::table('log')
                ->where('email', $user->email);
                $userx = User::find($user->id);
                 return redirect('/login')->with('messageconfirmed','Account has been activated');
                //Auth::login($userx);
            }
        }
        if(!$found) $message = 'Sorry, Couldn\'t find a  username to match this confirmation code';
        else if(Auth::check()) $message = 'Confirmation Successfull';
        $data['message'] = $message;
        return View::make('emailconf',$data);
    }
     public function postConfirmation(){
     // {
     //     $message = 'Auth unsuccessfull';
     //     $data['message'] = $message;
     //     if(Auth::check())
             return redirect('/home');
         // else
         //     return View::make('emailconf',$data);
     }

}
