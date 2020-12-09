<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function redirect;
use function view;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::USER_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return $this->loggedOut($request) ?: redirect('user/login');
    }
    public function showRegiForm(){
        return view('frontend.reg');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users'],
            'password'=>['required']
        ]);
        $formData= $request->all();
        $formData['password']= Hash::make($request->password);
        if(User::create($formData)){
            return redirect()->route('user.login');
        }
    }
}
