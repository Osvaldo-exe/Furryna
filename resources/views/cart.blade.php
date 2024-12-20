<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furryna</title>

      <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

    <!-- font awesome style -->
    <link rel="stylesheet" href="/icon/css/all.min.css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/cartStyle.css">
    <link rel="stylesheet" href="../css/productList.css">
    <link rel="stylesheet" href="../css/calculation.css">

</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
          <div class="header_top">
            <div class="container-fluid">
              <div class="top_nav_container">
                <a class="navbar-brand" href="{{route('Home')}}">
                  <span>
                    Furryna
                  </span>
                </a>
                
                <div class="user_option_box">
                  <a href="{{ Route('MyProfile') }}" class="account-link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                      My Account
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </header>
        <div class="contentContainer">
          <div style="display: flex">
            @include($includeView) 
          </div>
        </div> 
    </div>
</body>
</html>