<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/profile.css">
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
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/UserProfile/info">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-TW/mvc/public/village/villageView"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/UserProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge"><?php echo $data['reportsCount']; ?></span> </a></li>
                <li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-2">
</div>
<div class="col-md-8 col-xs-8 col-lg-8 col-sm-8 center">

    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?> </div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron"  >
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone'];; ?> <img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            1000<img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
<h4 class="legend"><?php echo $data['username']; ?>'s profile</h4>
    <table class="table no-border">
        <tr>
            <th>Username:</th>
            <td><?php echo $data['username']; ?></td>
        </tr>
        <tr><th>Sign up date:</th>
        <td><?php echo $data['signUpDate']; ?></td></tr>
        <tr><th>Battle points: </th>
            <td><?php echo $data['battlePoints']; ?></td>
        </tr>
        <tr><th>General points: </th>
            <td><?php echo $data['generalPoints']; ?></td>
        </tr>
        <tr><th>Number of villages:</th>
        <td><?php echo $data['numberOfVillages']; ?></td>
        </tr>
        <tr><th>Age:</th>
        <td><?php echo $data['varsta']; ?></td></tr>



    </table>

    <?php
        if($data['fb']==0)

            echo'<a class="btn btn-primary buton" href="/Proiect-TW/mvc/public/UserProfile/changePassword"><span class="glyphicon glyphicon-cog"></span>Settings</a>';?>
</div>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-2"></div>
</body>
</html>