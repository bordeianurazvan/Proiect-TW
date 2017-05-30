<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/actual-report.css">
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
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
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

<div class="center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4" >
            <?php echo $data['iron']; ?> <img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?> <img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?> <img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo $data['storage']; ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 Reports "><?php echo $data['title']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
        <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 attackerText"><?php echo $data['attName'].' from village '.$data['attVillageName']; ?></div>
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
    </div>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 Table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th class="col-md-4 col-xs-4 col-sm-4 col-lg-4">Attacker</th>

                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_spear.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_axe.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Troops</td>
                    <td><?php echo $data['attSpearC']; ?></td>
                    <td><?php echo $data['attAxeC']; ?></td>
                    <td><?php echo $data['attSwordC']; ?></td>
                    <td><?php echo $data['attArcherC']; ?></td>
                </tr>
                <tr>
                    <td>Victims</td>
                    <td><?php echo $data['attSpearD']; ?></td>
                    <td><?php echo $data['attAxeD']; ?></td>
                    <td><?php echo $data['attSwordD']; ?></td>
                    <td><?php echo $data['attArcherD']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
            <div class="col-md-1"></div>
    </div>

    <div class="row free-space">
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
        <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 defenderText"><?php echo $data['defName'].' from village '.$data['defVillageName']; ?></div>
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 Table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th class="col-md-4 col-xs-4 col-sm-4 col-lg-4">Defender</th>

                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_spear.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_axe.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Troops</td>
                    <td><?php echo $data['defSpearC']; ?></td>
                    <td><?php echo $data['defAxeC']; ?></td>
                    <td><?php echo $data['defSwordC']; ?></td>
                    <td><?php echo $data['defArcherC']; ?></td>
                </tr>
                <tr>
                    <td>Victims</td>
                    <td><?php echo $data['defSpearD']; ?></td>
                    <td><?php echo $data['defAxeD']; ?></td>
                    <td><?php echo $data['defSwordD'];?></td>
                    <td><?php echo $data['defArcherD']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row event-msg text-center free-space">
        <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"></div>
        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 resMessageText"><?php echo $data['msg'];  ?></div>
        <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"></div>
    </div>
</div>

</body>
</html>