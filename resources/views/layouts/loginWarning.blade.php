<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="WarningContainer">
        <div>
            <div>
                <h1>
                    Please login to access this page...
                </h1>
                <span>
                    Proceed to <a href="{{route('MyProfile')}}">login</a>
                </span>
            </div>
            <img src="../images/Web-Images/3526-furina-emotional.png" alt="Oops">
        </div>
    </div>
</body>
</html>
<style>
    body{
        background-color: #d0d1de;
    }

    .WarningContainer{
        margin: 0;
        width: 100vw;
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .WarningContainer div{
        align-items: center;
        display: flex;
    }

    .WarningContainer div div{
        display: grid;
        justify-content: center;
    }
</style>