<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $counter = 0;

        foreach ($products as $items) {
            if ($counter >= $maxIterations) {
                break; 
            }
            $counter++;
    ?>
        <div class="col-sm-6 col-lg-4">
            <div class="box">
                <div class="img-box">
                    <img src    ="../images/Products-Images/<?php echo htmlspecialchars($items->image); ?>" alt="">
                        <a href="{{ route('products.details', $items->id) }}" class="add_cart_btn">
                            Details
                        </a>         
                </div>
                <div class="detail-box">
                    <h5>
                        <?php echo htmlspecialchars($items->product_name); ?>
                    </h5>
                    <div class="product_info">
                        <h5>
                            <span><?php echo 'Rp '.number_format(htmlspecialchars($items->price), 2,',','.'); ?></span> 
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</body>
</html>