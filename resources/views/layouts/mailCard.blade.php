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
    <div class="mailCard" style="display: flex; position: relative;" >
        <div>
            <p>Sender : <?php echo htmlspecialchars($item->sender_email); ?></p>
            <p>Subject : Order <?php echo htmlspecialchars($item->id); ?></p>
            <p>Item : <?php echo htmlspecialchars($item->pname). " X ". htmlspecialchars($item->quantity); ?></p>
        </div>
        <p style="position:absolute; bottom: 6px; right: 6px; padding: 0;"><?php echo htmlspecialchars($item->created_at); ?></p>
    </div>
    @endforeach
</body>
</html>