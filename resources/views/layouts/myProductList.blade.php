<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furryna</title>
    <link rel="stylesheet" href="ProductList.css">
</head>
<body>
    <div class="myProductContainer">
        <div class="buttonContainer">
            <a class="btn_box" href="{{ route('addProduct')}}">Add</a>
        </div>
        <div class="cardContainer">   
            <div class="content">
                @include('layouts.cartContainerCard')       
            </div>   
        </div>
    </div>
</body>
</html>