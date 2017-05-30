<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/Ranking.css">
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
        <div class="col md-2 col-xs-1 col-sm-2 col-lg-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo ($data['storage']*1000); ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-2 col-xs-2 col-lg-3 col-sm-2 RankingTitle ">Ranking</div>
            <div class="col-md-9 col-xs-10 col-lg-9 col-sm-9 Buttons">
                <div class="btn-group-horizontal">
                    <a type="button" class="btn btn-primary btn-xs" href="/Proiect-TW/mvc/public/ranking/rankingPopulation">Population</a>
                    <a type="button" class="btn btn-primary btn-xs" href="/Proiect-TW/mvc/public/ranking/rankingAttackers">Attackers</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-0"></div>
        <div class="col-md-10 col-sm-10 col-xs-12 Table">
            <table class="table table-condensed no-border ">
                <thead>
                <tr>
                    <th class="text-center">Loc</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Number Of Villages</th>
                    <th class="text-center">Points</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for($index=0;$index<count($data['resultsList']);$index++){
                    echo '<tr>';
                    echo '<td>' . ((($data['prevPage'])*5) + $index+1) . '</td>';
                    echo '<td><a class="c-link" href="/Proiect-TW/mvc/public/userprofile/getOtherProfile/' . $data['resultsList'][$index] . '">' . $data['resultsList'][$index] .  '</a></td>';
                    echo '<td>' . $data['villageList'][$index] . '</td>';
                    echo '<td>' . $data['pointsList'][$index] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-0"></div>
    </div>
    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-0"></div>
        <div class="col-md-6 col-xs-5 col-sm-6 col-lg-6">
            <form class="navbar-form Search" role="search" action="" method="post">
                <div class="form-group">
                    <input name="search" type="text" class="form-control" placeholder="Search username">
                </div>
                <button type="submit" class="btn btn-primary SearchButton">Search</button>
            </form>
        </div>
        <div class="col-md-5  col-xs-7 col-sm-5 col-lg-5 Paginare">
            <ul class="pagination">
                <?php
                if($data['prevPage']<1){
                    echo '<li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation/' . $data['prevPage'] . '" style="pointer-events: none; cursor: default;"> &lt; Prev</a></li> ';
                }else{
                    echo '<li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation/' . $data['prevPage'] . '"> &lt; Prev</a></li> ';
                }
                ?>
                <?php
                if($data['nextPage']>$data['maxPagesNumber']){
                    echo '<li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation/' . $data['nextPage'] . '" style="pointer-events: none; cursor: default;"> Next &gt;</a></li> ';
                }
                else{
                    echo '<li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation/' . $data['nextPage'] . '"> Next &gt;</a></li> ';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>