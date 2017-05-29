<?php
echo $_SESSION['x'].' '.$_SESSION['y'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Divide&Conquer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/Proiect-Tw/mvc/public/css/atac.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-logo" href="/Proiect-Tw/mvc/public/user/info">
                <img alt="Logo" src="/Proiect-Tw/mvc/public/images/logocrop60%25.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-Tw/mvc/public/village/PrivireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-Tw/mvc/public/user/profile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-Tw/mvc/public/map/map"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-Tw/mvc/public/reports/reports"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="/Proiect-Tw/mvc/public/ranking/Ranking"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-Tw/mvc/public/home/login"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="left">
</div>
<div class="center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village">Village (23|99) </div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron"  >
            234 <img alt="Iron" src="/Proiect-Tw/mvc/public/images/iron.png">
            543 <img alt="Wood" src="/Proiect-Tw/mvc/public/images/wood.png">
            532 <img alt="Stone" src="/Proiect-Tw/mvc/public/images/stone.png">
            1000<img alt="Resources" src="/Proiect-Tw/mvc/public/images/resources.png">
        </div>
        </div>
 <div class="legend">Target's coordinates:</div>
    <div class="row coordonate">
        <form class="form-inline">
            <div class="form-group">
            <label for="x">X:</label>
            <input type="number"  class="allign"  value="<?php echo $_SESSION['x'];?>"  name="x" id="x" min="0">
        </div>
            <div class="form-group">
                <label for="y">Y:</label>
                <input type="number" class="allign"  value="<?php echo $_SESSION['y'];?>" name="y" id="y" min="0">
            </div>
        </form>
    </div>
    <div class="row rand_trupe">

        <div class="col-md-6 col-lg-3 ">
    <form class="form-inline trupe">

           <div class="form-group">
               <label for="archer"> <img alt="Archer" src="/Proiect-Tw/mvc/public/images/unit_archer.png" class="img-responsive"></label>
                <input type="number" class="allign" name="archer" value=""  id="archer" min="0">
          </div>
        <div class="form-group">
            <label for="sword"> <img alt="Sword" src="/Proiect-Tw/mvc/public/images/unit_sword.png" class="img-responsive"></label>
            <input type="number"  class="allign" name="sword" value=""  id="sword" min="0">
        </div>
        <br>
        <div class="form-group">
            <label for="axe"> <img alt="Axe" src="/Proiect-Tw/mvc/public/images/unit_axe.png" class="img-responsive"></label>
            <input type="number"  class="allign" name="axe" value=""  id="axe" min="0">
        </div>
        <div class="form-group">
            <label for="spear"> <img alt="spear" src="/Proiect-Tw/mvc/public/images/unit_spear.png" class="img-responsive"></label>
            <input type="number"  class="allign" name="spear" value=""  id="spear" min="0">
        </div>
    </form>
            </div>
        <div class="col-xs-1 col-md-1 col-lg-1 col-sm-1">
            </div>
        </div>
    <div class="row buton">
        <a type="submit" class="btn btn-primary" href="/Proiect-Tw/mvc/public/atac/movements">Send</a>

    </div>

</div>
<div class="rigth"></div>
</body>
</html>