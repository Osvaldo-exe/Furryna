<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($receivedMails as $item)
        <div class="mailCard">
            <p>Sender : <?php echo htmlspecialchars($item->sender_email); ?></p>
            <p>Subject : Order</p>
            <p>Item : <?php echo htmlspecialchars($item->product_name); ?></p>
        </div>
    @endforeach
</body>
</html>