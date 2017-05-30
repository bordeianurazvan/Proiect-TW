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
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/user/info">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-TW/mvc/public/village/villageView"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/userprofile/getprofile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge"><?php echo $data['reportsCount']; ?></span> </a></li>
                <li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left">
</div>
<div  class="center">

    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo $data['storage']; ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
        </div>

<div class="divi" >
    <?php echo $data['generatedMap'];?>

    <script>
      function myFunction(x) {
    coord_x = x.parentNode.rowIndex +1;
    coord_y = x.cellIndex +1;
    }
    function redirect() {

        window.location ='/Proiect-TW/mvc/public/map/getMap'+'/'+coord_x+'/'+coord_y+'/attack';
    }
    function redirectProfile()
    {
        window.location ='/Proiect-TW/mvc/public/Userprofile/getotherprofilebymap'+'/'+coord_x+'/'+coord_y+'/attack';
    }
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
            <a type="button" class="btn btn-primary" onclick="redirect()">Attack</a>
            <a type="button" class="btn btn-primary" onclick="redirectProfile()">Player's Profile</a>

        </div>
      </div>
    </div>
  </div>

    </div>


   



<div class="rigth"></div>
</body>
</html>

