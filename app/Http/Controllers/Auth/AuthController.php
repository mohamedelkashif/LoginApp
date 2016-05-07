<?php

namespace LoginApp\Http\Controllers\Auth;
use OAuth;
use Socialite;

use Request;


use LoginApp\User;
use Validator;
use LoginApp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth; 
use DB;
use Hash;
use Illuminate\Support\Facades\Redirect;


//use Laravel\Socialite\Facades\Socialite;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($auth=Null)
    {
        // $providerKey = \Config::get(app_path().'/config/google.php');
        // if(empty($providerKey))
        //     return view('welcome')
        //         ->with('error','No such provider');

        //$oauth= new Socialite(app_path().'/config/google.php');
         //$provider = $oauth->authenticate('Google');


        return Socialite::driver('Google')->redirect();

        //return 1;
    }



    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $token = $user->token;

        $google_user_id = $user->getId(); 
        $name = $user->getName();
        $email = $user->getEmail();


        
         //$user->getName();
        echo $name;

$found = false;
          $users = DB::table('log')->get();
        foreach ($users as $user)
    {
      if($user->email == $email)
            {
                $userx =  DB::table('log')->where('email', $email);
                $userx = User::find($user->id);
                Auth::login($userx);
                if(Auth::check())
                 {
                    DB::table('log')->where('username', $userx->name);
                       return redirect('/home') ;
                    //return view('/home'); 
                    //echo "string";
                 }
            }
         
        }
        if(!$found) {
              $newuser = new User;
              $newuser->email=$email;
              $newuser->username=$name;
              $password = str_random(6);
              $newuser->password=Hash::make($password);
              //$newuser->confirmationcode = 'google';
              //$newuser->confirmed = true;
              if($newuser->save())
              {
                 $userx = User::find($newuser->id);
                 Auth::login($userx);
                 if(Auth::check())
                 {
                       return redirect('/home') ;
                    //return view('/home'); 
                    //echo "string";
                 }
              }
            
        
    }
        



//$username = $profile->displayName;

        // //$token=$user->token;
       
        //return $user->getName();

    }




//     public function loginWithGoogle(Request $request)
// {
//     // get data from request
//     //$code = $request->get('code');

//     // get google service
//     $googleService = \OAuth::consumer('Google');

//     // check if code is valid

//     // if code is provided get user data and sign in
//     // if ( ! is_null($code))
//     // {
//     //     // This was a callback request from google, get the token
//     //     $token = $googleService->requestAccessToken($code);

//     //     // Send a request with it
//     //     $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

//     //     $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
//     //     echo $message. "<br/>";

//     //     //Var_dump
//     //     //display whole array.
//     //     dd($result);
//     // }
//     // // if not ask for permission first
//     // else
//     // {
//     //     // get googleService authorization
//     //     $url = $googleService->getAuthorizationUri();

//     //     // return to google login url
//     //     return redirect((string)$url);
//     // }
// }

}
