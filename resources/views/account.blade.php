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
                    <a class="navbar-brand" href="">
                        <span>
                        Furryna
                        </span>
                    </a>
                    <div class="listAccountMenuContainer" id="navbarSupportedContent">
                        <ul class="account-nav ">
                            <li class="nav-list active">
                                <a class="nav-link" href="Home">My Account <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="About"> My Products </a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="{{ route('Product') }}">Mail</a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="Why">Payment</a>
                            </li>
                            <li class="nav-list">
                                <a class="nav-link" href="Testimonial">Settings</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
    
    @include('layouts.uploadProductForm')
    
</body>
</html>