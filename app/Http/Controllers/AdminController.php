<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin-home');
    }
}
