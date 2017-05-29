<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/Storage.css">
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
                <li><a href="/Proiect-TW/mvc/public/village/privireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/userProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
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
        <div class="col-md-12 col-xs-12 img-responsive name"><img  alt="Storage" src="/Proiect-TW/mvc/public/images/storage.png">Storage (Level <?php echo $data['storage']; ?>)</div>
    </div>
    <div class="row description">
        <div>The warehouse stores your resources. The higher its level the more resources can be stored.</div>
    </div>
    <div>
        <div class="Table1">
            <table class="table no-border">
                <thead>
                <tr>
                    <th>Storage capacity</th>
                    <th>Units per resource</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Current storage capacity</td>
                    <td><?php echo ($data['storage']*1000); ?></td>
                </tr>
                <tr>
                    <td>Storage capacity on level <?php echo ($data['storage']+1); ?></td>
                    <td><?php echo (($data['storage']+1)*1000); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="Table2">
            <table class="table no-border">
                <thead>
                <tr>
                    <th>Warehouse full</th>
                    <th>Time (hh:mm:ss)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> <img  alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">Wood</td>
                    <td><?php echo $data['storageWoodTime']; ?></td>
                </tr>
                <tr>
                    <td> <img  alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">Stone</td>
                    <td><?php echo $data['storageStoneTime']; ?></td>
                </tr>
                <tr>
                    <td> <img  alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">Iron</td>
                    <td><?php echo $data['storageIronTime']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>

