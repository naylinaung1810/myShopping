@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    <section class="content-header" style="padding-bottom: 15px;background: gainsboro;border-bottom: 1px solid">
        <h1>
            All Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">All User</li>
        </ol>
    </section>
    @include('backEnd.layout.alert')

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="row" style="margin-left: 5px">
            <a href="{{route('new-user')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User</a>
        </div>
      <div class="row" style="margin-top: 5px">
          <div class="table-responsive">
              <table class="table table-striped text-center">
                  <thead style="background: gainsboro">
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                      <th>Created Date</th>
                  </tr>
                  </thead>
                  @foreach($users as $user)
                      <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->getRoleNames()[0]}}</td>
                          <td>
                              <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                              <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i> </a>
                          </td>
                          <td>{{$user->created_at}}</td>
                      </tr>
                      @endforeach
              </table>
          </div>
      </div>
    </section>
    @stop