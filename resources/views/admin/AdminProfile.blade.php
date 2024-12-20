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
    <link rel="stylesheet" href="/css/login.css">
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
                            <li class="nav-list active">
                                <a class="nav-link" href="{{ route('AdminProfile') }}">My Profile <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="{{ route('MyProducts') }}"> Users Products </a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="{{ route('Mail') }}">Mail</a>
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
    <div class="profile-container" id="profile-container">
        @auth
            @include('admin.AdminBiodata')
        @else
            @include($includeView)
        @endauth
    </div>
    <script src="../js/login-signup.js"></script>
</body>
</html>