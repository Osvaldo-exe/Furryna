

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo htmlspecialchars($products->product_name)?></title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link rel="stylesheet" href="/icon/css/all.min.css">

  <!-- Custom styles for this template -->
  <link href="/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link rel="stylesheet" href="/css/responsive.css"/>

</head>
<body>
    <header class="header_section">
        <div class="header_top">
          <div class="container-fluid">
            <div class="top_nav_container">
              <a class="navbar-brand" href="">
                <span>
                  Furryna
                </span>
              </a>
              <div class="user_option_box">
                <a href="/Account" class="account-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    My Account
                  </span>
                </a>
                <a href="" class="cart-link">
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
            </nav>
          </div>
        </div>
    </header>
    <div class="productDetails">
      <div class="detailsBox">
        <div class="detailsImage">
          <img src="../images/<?php echo htmlspecialchars($products->image); ?>" alt="">
        </div>
        <div class="detailsInfo">
            <h class="navbar-brand">
              <span class="brand">
                <?php echo htmlspecialchars($products->product_name); ?>
              </span><br>
              <span class="price">
                <?php echo 'Rp '.number_format(htmlspecialchars($products->price), 2,',','.'); ?>
              </span>
            </h>
            <div class="description">
              <h3>Description</h3>
              <p><?php echo htmlspecialchars($products->product_description); ?></p>
            </div>
        </div>
        <div class="checkout-container">
          <div class="checkout">
            <p>Amount</p>
            <div class="quantity">
              <button class="fa fa-minus" onclick="lessValue()"></button>
              <input type="text" value="1" id="inputQuantity" oninput="inputValue()">
              <input type="hidden" value="<?php echo htmlspecialchars($products->price)?> " id="inputPrice">
              <button class="fa fa-plus" onclick="addValue()"></button>
            </div>
            <p>Subtotal </p>
            <span id="subtotalPrice">
              <?php 
                echo 'Rp '.(number_format(htmlspecialchars($products->price), 2,',','.'));?>
              </span>
            <button>Add to Cart</button>
            <button>Buy</button>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/quantity.js"></script>
  </body>
</html>