<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/map.css">
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
            <a class="navbar-logo" href="info.html">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="PrivireAsupraSatului.html"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="map.html"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="reports.html"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="Ranking.html"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="login.html"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left">
</div>
<div  class="center">

    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village">Village (23|99) </div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            234 <img alt="Iron" src="images/iron.png">
            543 <img alt="Wood" src="images/wood.png">
            532 <img alt="Stone" src="images/stone.png">
            1000<img alt="Resources" src="images/resources.png">
        </div>
        </div>

<div class="divi" >
    <script>
     var myTable="";


        myTable+='<table class="tabel-map">';
    for(var i=1; i<=100; i++){
        myTable+='<tr data-toggle=\"modal\" data-id=\"1\" data-target=\"#mini-menu\">';
    for(var j=1;j<=100;j++) {
        var x=Math.floor(Math.random() * 11) + 1;
        myTable+='<td><img alt="Resources" src="images/'+ x +'.png" title="'+x +'|'+j +'"> </td>';
    }
        myTable+='</tr>';
    }
        myTable+='</table>';
     document.write( myTable);

    </script>
        
    </div>
    <div class="modal fade" id="mini-menu" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <span style="font-size:1.4em" class="paragraf-no-line">Action Menu</span>
        </div>
        <div class="modal-body">
        <a type="button" class="btn btn-primary" href="atac.html">Attack</a>
        <a type="button" class="btn btn-primary" href="profile.html">Player's Profile</a>
         
        </div>
        
      </div>
      
    </div>
  </div>
      <div class="row coordonate">
        <form class="form-inline">
         
            <div class="form-group">
            <label for="x">X:</label>
            <input type="number" class="allign"  value=""  id="x">
        </div>
            <div class="form-group">
                <label for="y">Y:</label>
                <input type="number"  class="allign"  value=""  id="y">
            </div>
            <div class="form-group">
                  <button type="submit" class="btn btn-primary search">Search</button>
            </div>
        </form>
    </div>
    </div>


   



<div class="rigth"></div>
</body>
</html>

