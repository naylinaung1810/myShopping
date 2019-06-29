<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('bst4/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>
@include('fontEnd.layout.navbar')
<div class="" style="margin-top: 60px">
    {{--@include('fontEnd.layout.message')--}}
    @yield('content')
</div>

@include('fontEnd.layout.footer')

<script src="{{asset('bst4/js/jquery.js')}}"></script>
<script src="{{asset('bst4/js/popper.js')}}"></script>
<script src="{{asset('bst4/js/bootstrap.js')}}"></script>
@yield('script')
</body>
</html>