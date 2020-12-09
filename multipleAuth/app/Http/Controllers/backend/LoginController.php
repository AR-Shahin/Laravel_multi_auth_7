<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function redirect;
use function view;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.login');
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        return $this->loggedOut($request) ?: redirect('admin/login');
    }
    public function showRegiForm(){
        return view('backend.reg');
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
            return redirect()->route('admin.login');
        }
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
