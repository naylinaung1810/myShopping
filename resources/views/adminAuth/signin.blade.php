<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('bst4/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fa/css/all.css')}}">
</head>
<body>

<div class="container mt-lg-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-sign-in"></i> Login</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('login')}}">
                        @csrf

                            <div class="input-group mb-2 @if($errors->has('email')) valid-feedback @endif">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        @if($errors->has('email')) <span class="help-block text-danger">{{$errors->first('email')}}</span> @endif

                            <div class="input-group mb-2" style="border-radius: 20px">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        @if($errors->has('password')) <span class="help-block text-danger">{{$errors->first('password')}}</span> @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('bst4/js/jquery.js')}}"></script>
<script src="{{asset('bst4/js/bootstrap.js')}}"></script>
</body>
</html>