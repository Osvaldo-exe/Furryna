<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furryna</title>
</head>
<body>
    
    <div class="wrapper">
        <table class="cartTable">
            <?php foreach($cart as $items): ?>   
                <tr>
                    <td> 
                        <img src='../images/Products-Images/<?php echo htmlspecialchars($items->product->image); ?>' alt='Product Image' class='product-image'>
                    </td>
                    <td style="text-align: left; vertical-align:top;">
                        <?php echo htmlspecialchars($items->product->product_name); ?>
                    </td>
                    <td>
                        <div class="cart-item" style="margin-top: 0">
                            <p class="unit-price" style="color: black;" 
                            data-price="<?php echo htmlspecialchars($items->product->price); ?>">
                            <?php echo 'Rp ' . number_format(floatval($items->product->price), 2, ',', '.'); ?></p>
                            <div class="quantity-wrapper" style="margin-top: 2px; align-items: left;" class="interaction">
                                <button class="btn btn-sm btn-outline-secondary btn-quantity" data-change="-1">-</button>
                                <input type="number" class="quantity" value="1">
                                <button class="btn btn-sm btn-outline-secondary btn-quantity" data-change="1">+</button>
                            </div>
                        </div>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="summary">
        <h2>Total</h2>
        <div class="priceSummary" style="margin-top: 0px">
            <div>
                <div>Subtotal: </div><span id="total-price"></span>
            </div>
            <div>
                <div>Admin Fee: </div><span> Rp 2.000,00</span>
            </div>
            <div style="font-weight: bold">
                <div>Total Harga: </div><span id="final-price">
            </div>
        </div>
        <button class="checkout">Checkout</button>
    </div>
    <script src="../js/cartItem.js"></script>
</body>
</html>