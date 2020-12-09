@extends('layouts.back_master')
@section('main_content')
    <div class="container mt-4">
        <h4>Admin login</h4>
        <div class="row mt-5 pt-5 justify-content-center">
            <div class="col-6 ">
                <form action="{{route('admin.login.post')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('user.regi')}}">Reg</a>
                </form>
            </div>
        </div>
    </div>
@stop