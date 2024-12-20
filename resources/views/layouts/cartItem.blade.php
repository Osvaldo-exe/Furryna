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
                <?php foreach($cart as $items):  ?>  
                <tr class="cart-item">
                    <td> 
                        <img src='../images/Products-Images/<?php echo htmlspecialchars($items->product->image); ?>' alt='Product Image' class='product-image'>
                    </td>
                    <td style="text-align: left; vertical-align: top;">
                        <?php echo htmlspecialchars($items->product->product_name); ?>
                    </td>
                    <td>
                        <?php echo 'Rp ' . number_format(floatval($items->product->price), 2, ',', '.'); ?>
                        <input type="hidden" class="unit-price" data-price="<?php echo htmlspecialchars($items->product->price); ?>" value="">
                    </td>
                    <td>
                        <span class="quantity" style="border: 2px solid black; padding: 2px 1rem; border-radius: 3px; display: block; max-width: 4rem;">
                            <?php echo htmlspecialchars($items->quantity); ?>
                        </span>
                        <input type="hidden" class="quantity" value="<?php echo htmlspecialchars($items->quantity); ?>">
                    </td>
                    <td>
                        <form action="{{route('dropCart', $items->id)}}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button id="baten" type="submit" style="padding: 5px 1rem;">Discard</button>
                        </form>
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
                    <div>Admin Fee: </div><span id="admin-price"> </span>
                </div>
                <div style="font-weight: bold">
                    <div>Total Harga: </div><span id="final-price">
                </div>
            </div> 
    <form action="{{route('Checkout')}}" method="POST" style="display: flex; gap: 3rem;" id="checkoutForm">
            @csrf
            @foreach ($cart as $items)
                <input type="hidden" name="body" value="tes">
            @endforeach
            <button id="baten" type="submit" style="margin-left: 17rem">Checkout</button>
        </div>
    </form>
    <script src="../js/cartItem.js"></script>
</body>
</html>