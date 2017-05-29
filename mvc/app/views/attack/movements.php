<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-Tw/mvc/public/css/movements.css">
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
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/userprofile/info">
                <img alt="Logo" src="/Proiect-Tw/mvc/public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-Tw/mvc/public/village/privireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-Tw/mvc/public/userprofile/getprofile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-Tw/mvc/public/map/getmap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-Tw/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="/Proiect-Tw/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-Tw/mvc/public/home/login"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4" >
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo $data['storage']; ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 movements ">Troop Movements</div>
    </div>

      <?php echo $data['commands_table']; ?>

    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-2 col-lg-4"></div>
        <div class="col-md-4 col-xs-8 col-sm-8 col-lg-4 text-center">
            <ul class="pagination">
                <?php
                if($data['prevPage']<1){
                    echo '<li><a href="/Proiect-TW/mvc/public/attack/movements/' . $data['prevPage'] . '" style="pointer-events: none; cursor: default;"> &lt; Prev</a></li> ';
                }else{
                    echo '<li><a href="/Proiect-TW/mvc/public/attack/movements/' . $data['prevPage'] . '"> &lt; Prev</a></li> ';
                }
                ?>
                <?php
                if($data['nextPage']>$data['maxPagesNumber']){
                    echo '<li><a href="/Proiect-TW/mvc/public/attack/movements/' . $data['nextPage'] . '" style="pointer-events: none; cursor: default;"> Next &gt;</a></li> ';
                }
                else{
                    echo '<li><a href="/Proiect-TW/mvc/public/attack/movements/' . $data['nextPage'] . '"> Next &gt;</a></li> ';
                }
                ?>
            </ul>
        </div>
        <div class="col-md-4 col-xs-2 col-sm-2 col-lg-4"></div>
    </div>
</div>

</body>
</html>