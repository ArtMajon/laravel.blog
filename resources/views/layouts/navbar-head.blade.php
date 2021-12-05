<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="logo" href="{{route('home')}}">
                <img src="../assets/front/images/version/market-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.single', ['slug'=> 'marketing'])}}">Marketing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.single', ['slug'=> 'make-money'])}}">Make
                            Money</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                    </li>
                </ul>

                <ul class="navbar-nav mr-3">
                    @if(auth()->check())
                        <li class="nav-item">
                            <i class="nav-link">  <small> Приветствую, {{ auth()->user()->name }}  </small></i></small>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-hand-o-right ">
                                    <small>  Выйти</small></i></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <small> <a class="nav-link" href="{{route('login.create')}}"><i
                                        class="fa fa-hand-o-right"></i>
                                    <small>Вход  </small></a></small>
                        </li>
                        <li class="nav-item">
                            <small><a class="nav-link" href="{{route('register.create')}}"><i
                                    class="fa fa-hand-o-right"></i>   <small>Регистрация  </small></a></small>
                        </li>
                    @endif
                </ul>

                <form class="form-inline" method="get" action="{{route('search')}}">
                    <input name="s" class="form-control mr-sm-2 @error('s') is-invalid @enderror" type="text"
                           placeholder="Search ... " required>
                    <button class="btn btn my-2 my-sm-0" type="submit">Search</button>
                </form>

                <style>
                    .market-header .form-inline .form-control.is-invalid {
                        border: 1px solid red;
                    }
                </style>

            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
