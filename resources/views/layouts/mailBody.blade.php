<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mail.css">
</head>
<body>
    <div style="display: grid; align-content:center; margin-bottom: 11rem;">
        <div class="mailReceived">
            Received Mails
        </div>
        <div class="mailContainer" style="">
            @include('layouts.mailCard')
        </div>
    </div>
</body>
</html>