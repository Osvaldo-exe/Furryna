<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link href="/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->
    <link rel="stylesheet" href="/icon/css/all.min.css">
    <link rel="stylesheet" href="/css/responsive.css"/>
    <link rel="stylesheet" href="/css/accountStyle.css">
</head>
<body class="accountBody">
    <nav>
        <div class="header_bottom">
          <div class="container-fluid">
                <nav class="navbarContainer">
                    <a id="navbar-brand" href="/">
                        <span>
                        Furryna
                        </span>
                    </a>
                    <div class="listAccountMenuContainer" id="navbarSupportedContent">
                        <ul class="account-nav ">
                            <li class="nav-list">
                                <a class="nav-link" href="{{ route('MyProfile') }}">My Profile <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="{{ route('MyProducts') }}"> My Products </a>
                            </li>
                            <li class="nav-list active">
                                <a class="nav-link" href="{{ route('Mail') }}">Mail</a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="Why">Payment</a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="Testimonial">Settings</a>
                            </li>
                            @auth
                            <form action="{{ route('LogoutUser') }}" method="POST">
                                @csrf
                                <button id="Logout" href="#" type="submit">Logout</button>
                            </form>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
    
    @auth
        @include('layouts.mailBody')
    @else
        @include('layouts.loginWarning')
    @endauth 
</body>
</html>