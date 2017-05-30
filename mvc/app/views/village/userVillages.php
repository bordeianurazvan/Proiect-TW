<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/PrivireDeAnsamblu.css">
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
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/userProfile/info">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-TW/mvc/public/village/villageView"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/userProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge"><?php echo $data['reportsCount']; ?></span> </a></li>
                <li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron" >
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo ($data['storage']*1000); ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 Overview "><?php echo $data['username']; ?> 's villages</div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class=" Table">
                <table class="table no-border">
                    <thead>
                    <tr>
                        <th>Village Name</th>
                        <th>Points</th>
                        <th>Coordinates</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($index=0;$index<count(($data['villageList']));$index++){
                        echo '<tr>';
                        echo '<td><a class="c-link" href="/Proiect-TW/mvc/public/attack/getAttack/enemy/village/' . $data['coordsList'][$index*2] . '/' . $data['coordsList'][($index*2)+1] . '">' . $data['villageList'][$index] . '</a></td>';
                        echo '<td>' . $data['pointsList'][$index] . '</td>';
                        echo '<td>' .  $data['coordsList'][$index*2] . '|' . $data['coordsList'][($index*2)+1] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <ul class="pagination">
            <?php
            if($data['prevPage']<1){
                echo '<li><a href="/Proiect-TW/mvc/public/village/userVillages/' . $data['id'] . '/' . $data['prevPage'] . '" style="pointer-events: none; cursor: default;"> &lt; Prev</a></li> ';
            }else{
                echo '<li><a href="/Proiect-TW/mvc/public/village/userVillages/' . $data['id'] . '/' . $data['prevPage'] . '"> &lt; Prev</a></li> ';
            }
            ?>
            <?php
            if($data['nextPage']>$data['maxPagesNumber']){
                echo '<li><a href="/Proiect-TW/mvc/public/village/userVillages/' . $data['id'] . '/' . $data['nextPage'] . '" style="pointer-events: none; cursor: default;"> Next &gt;</a></li> ';
            }
            else{
                echo '<li><a href="/Proiect-TW/mvc/public/village/userVillages/' . $data['id'] . '/' . $data['nextPage'] . '"> Next &gt;</a></li> ';
            }
            ?>
        </ul>
    </div>
</div>


</body>
</html>

