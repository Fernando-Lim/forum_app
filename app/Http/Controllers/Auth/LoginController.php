<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        // Check validation - Note : you can change validation as per your requirements 
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        // Get user record
        $user = User::select('id', 'name','email','username','divisi','status_level','hak_akses_fitur','password','created_at','updated_at');
        $user = $user->where('username', $request->get('username'))->first();
        // Check Condition user No. Found or Not
        if (empty($user)) {
            $errors = ['username' => 'Invalid Username!'];
            return back()->withErrors($errors);
        }
        // Check Condition password does not match with hash password or invalid password
        if (!Hash::check($request->get('password'), $user->password)) {
            $errors = ['password' => 'Invalid Password!'];
            return back()->withErrors($errors);
        }

        if($user->updated_at == $user->created_at){
            Auth::login($user);
            return redirect()->route('changePass');
        }else{
            // Set Auth Details
        Auth::login($user);
        return redirect()->route('home');
        }
    }
}
