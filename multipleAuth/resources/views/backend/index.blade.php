@extends('layouts.back_master')
@section('title','Dash')
@section('main_content')
    <div class="container mt-4">
        <h4>Admin Dash</h4>
        <div class="row mt-5 pt-5 justify-content-center">
            <div class="col-6 ">
                Hello {{Auth::user()->name}}
                <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button class="btn btn-info">Logout</button>
                </form>
            </div>
        </div>
    </div>
@stop