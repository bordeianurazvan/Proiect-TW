<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/login.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/home/login">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Proiect-TW/mvc/public/home/login"><span class="glyphicon glyphicon-log-in"></span>
                    Login</a></li>
            <li><a href="/Proiect-TW/mvc/public/home/register"><span class="glyphicon glyphicon-user"></span> Sign
                    Up</a></li>
        </ul>
    </div>
</nav>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>
<div class="col-md-8 col-xs-12 col-sm-12  col-lg-8">

    <div class="formular">
        <img alt="Logo2" src="/Proiect-TW/mvc/public/images/gameover.png" class="img-responsive Logo2">
        <div align="center">
            <h1>Player <?php  echo $_SESSION['username']?> won! </h1>
        </div>
    </div>
</div>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>

</body>
</html>
