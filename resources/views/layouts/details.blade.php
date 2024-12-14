

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
  <link rel="stylesheet" href="../css/responsive.css"/>
  <link rel="stylesheet" href="../css/calculation.css">

</head>
<body>
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
                <a href="{{route('MyProfile')}}" class="account-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    My Account
                  </span>
                </a>
                <a href="{{route('Cart')}}" class="cart-link">
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
          <img src="../images/Products-Images/<?php echo htmlspecialchars($products->image); ?>" alt="">
        </div>
        <div class="productDesc" style="display: grid">
          <h1 class="navbar-brand" style="font-size: 2.25rem"><?php echo htmlspecialchars($products->product_name); ?></h1>
          <div class="ownerInfo">
            <img class="ownerPicture" style="max-width: 3rem;max-height: 3rem;margin: 0;border-radius: 50%;padding: 0;" src="../images/Web-Images/<?php echo htmlspecialchars($products->User->profile_picture); ?>" alt="pp">
            <h4 class="ownerName"><?php echo htmlspecialchars($products->User->name); ?></h4>
          </div>
          <?php echo htmlspecialchars($products->product_description)?>
          <div class="comment-section">
            <div class="comment-input">
              <textarea id="commentText" placeholder="  Write a comment..."></textarea>
              <button id="post-comment">Post</button>
            </div>
            <div class="comments-display" id="commentsDisplay">
              <!-- Comments will appear here -->
            </div>
          </div>
        </div>
        <div class="col-md-8 card">
          <div class="title">
            <div class="row">
              <div class="col">
                <h4><b>Amount</b></h4>
              </div>
            </div>
          </div>

          <form action="">
            
          </form>
            <div class="row" style="border-top: 1px solid #a2a2a2; border-bottom: 1px solid #a2a2a2;">
              <div class="row main" style="padding: 1rem 0rem;">
                <div class="col" style="white-space: nowrap; align-items: center; align-content: center ;">
                  <?php echo 'Price: Rp '.(number_format(htmlspecialchars($products->price), 2,',','.'));?>
                </div>
                <input type="hidden" id="unitPrice" value="<?php echo htmlspecialchars($products->price)?>">
                <div class="col quantity-controls">
                  <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(this, -1)">-</button>
                  <input class="border px-3 quantity" value="1" id="quantity" oninput="updateSummary()"></sinput>
                  <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
            </div>

            <div class="row" style="padding: 3vh 0vh 1vh 0vh;">
              <div class="col">Subtotal</div>
                <div class="col text-right">
                  <span id="total-price"><?php echo 'Rp '.(number_format(htmlspecialchars($products->price), 2,',','.'));?></span> 
                </div>
              </div>
              <form action="{{route('addToCart')}}" method="POST">
                @csrf
                <input type="hidden" value="<?php echo htmlspecialchars($products->id)?>"  name="product_id"></sinput>
                <input type="hidden" value="1" class="quantity" name="quantity"></sinput>
                <button  id="baten" type="submit">Add to Cart</button>
              </form>

              <div class="back-to-shop">
                <a href="{{route('Product')}}"><span class="text-muted"">Back to shop</span></a>
              </div>
        </div>
      </div>
      
    <script src="../js/quantity.js"></script>
  </body>
</html>