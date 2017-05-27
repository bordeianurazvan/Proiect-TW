<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/PrivireDeAnsamblu.css">
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
            <a class="navbar-logo" href="info">
                <img alt="Logo" src="/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="PrivireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="profile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="map"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="reports"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="Ranking"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="login"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village">Village (23|99)</div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron" >
            234 <img  alt="Iron" src="/images/iron.png">
            543 <img alt="Wood" src="/images/wood.png">
            532 <img alt="Stone" src="/images/stone.png">
            1000<img alt="Resources" src="/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 Overview ">Overview</div>
    </div>
    <div class="row">
        <div class="container-fluid">
        <div class=" Table">
            <table class="table no-border">
                <thead>
                <tr>
                    <th>Village</th>
                    <th>Points</th>
                    <th>Resources</th>
                    <th>Storage</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>**vodo**'s village 1(358|495)</td>
                    <td>7852</td>
                    <td>2340<img alt="Iron" src="/images/iron.png"> 5430<img alt="Wood" src="/images/wood.png"> 5320<img alt="Stone" src="/images/stone.png">
                    </td>
                    <td>10000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 2(417|504)</td>
                    <td>2315</td>
                    <td>1140 <img alt="Iron" src="/images/iron.png"> 986 <img alt="Wood" src="/images/wood.png"> 1536 <img alt="Stone" src="/images/stone.png"></td>
                    <td>8000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 3(438|533)</td>
                    <td>4661</td>
                    <td>15400 <img alt="Iron" src="/images/iron.png"> 9800 <img alt="Wood" src="/images/wood.png"> 12340 <img alt="Stone" src="/images/stone.png"></td>
                    <td>27000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 4(439|534)</td>
                    <td>12154</td>
                    <td>15320 <img alt="Iron" src="/images/iron.png"> 25123 <img alt="Wood" src="/images/wood.png"> 19254 <img alt="Stone" src="/images/stone.png"></td>
                    <td>400000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 5(259|334)</td>
                    <td>10000</td>
                    <td>25000 <img alt="Iron" src="/images/iron.png"> 25000 <img alt="Wood" src="/images/wood.png"> 25000 <img alt="Stone" src="/images/stone.png"></td>
                    <td>27000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 6(739|138)</td>
                    <td>9866</td>
                    <td>14320 <img alt="Iron" src="/images/iron.png"> 23123 <img alt="Wood" src="/images/wood.png"> 12564 <img alt="Stone" src="/images/stone.png"></td>
                    <td>120000</td>
                </tr>
                <tr>
                    <td>**vodo**'s village 7(134|244)</td>
                    <td>12154</td>
                    <td>15400 <img alt="Iron" src="/images/iron.png"> 9800 <img alt="Wood" src="/images/wood.png"> 12340 <img alt="Stone" src="/images/stone.png"></td>
                    <td>400000</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    <table class="vis">
        <tbody>
        <tr>
            <th colspan="1">Villages per page: </th>
            <td>
                <input name="page_size" type="text" value="10">
            </td>
            <td>
                <input class="btn btn-primary" type="submit" value="Ok">
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>


</body>
</html>

