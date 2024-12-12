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

</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
          <div class="header_top">
            <div class="container-fluid">
              <div class="top_nav_container">
                <h class="navbar-brand" href="">
                  <span>
                    Furryna
                  </span>
                </h>
                <from class="search_form">
                  <input type="text" class="form-control" placeholder="Search here...">
                  <button class="" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </from>
                <div class="user_option_box">
                  <a href="{{ Route('MyProfile') }}" class="account-link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                      My Account
                    </span>
                  </a>
                  <a href="{{ Route('Cart') }}" class="cart-link">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>
                      Cart
                    </span>
                  </a>
                </div>
              </div>
    
            </div>
          </div>
          <div class="header_bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                </button>
</body>
</html>