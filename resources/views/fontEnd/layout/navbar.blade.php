<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-secondary">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{route('/')}}">
        <img src="{{asset('logo.png')}}" width="50" height="50" class="d-inline-block align-top" alt="">
        Bar Nyar Online Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="navbar-nav mr-5">
            @if(Auth::User())
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}"><i class="fa fa-sign"></i></a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" @if(Session::has('cart'))href="{{route('cart.get')}}"@endif><i class="fa fa-shopping-basket"></i>
                    <span class="badge badge-light" id="cart">

                    </span>
                </a>
            </li>
        </ul>

    </div>
    </div>
</nav>