@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    @include('backEnd.layout.alert')
    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            New User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">New User</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        {{--<div class="container">--}}
        <div class="row" style="margin-left: 5px">
            <a href="{{route('users')}}" class="btn btn-primary"><i class="fa fa-user-circle"></i> Users</a>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <form method="post" action="{{route('new-user')}}">
                            @csrf
                            <div class="form-group has-feedback @if($errors->has('name')) has-error @endif">
                                <label for="name" class="control-label">Username</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @if($errors->has('name')) <span class="help-block">{{$errors->first('name')}}</span> @endif
                            </div>
                            <div class="form-group has-feedback @if($errors->has('email')) has-error @endif">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @if($errors->has('email')) <span class="help-block">{{$errors->first('email')}}</span> @endif
                            </div>
                            <div class="form-group has-feedback @if($errors->has('role')) has-error @endif">
                                <label for="role" class="control-label">Roles</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('role')) <span class="help-block">{{$errors->first('role')}}</span> @endif
                            </div>
                            <div class="form-group has-feedback @if($errors->has('password')) has-error @endif">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @if($errors->has('password')) <span class="help-block">{{$errors->first('password')}}</span> @endif
                            </div>
                            <div class="form-group has-feedback @if($errors->has('con_pass')) has-error @endif">
                                <label for="con_pass" class="control-label">Confirm Password</label>
                                <input type="password" name="con_pass" id="name" class="form-control">
                                @if($errors->has('con_pass')) <span class="help-block">{{$errors->first('con_pass')}}</span> @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--</div>--}}
    </section>
@stop