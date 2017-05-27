<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/PrivireAsupraSatului.css">
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
                <li><a href="privireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="profile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="map"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="reports"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="ranking"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="login"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="col-md-2 col-xs-1 col-lg-2 col-sm-1">
</div>
<div class="col-md-8 col-xs-10 col-lg-8 col-sm-10 center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village">Village (23|99)</div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            234 <img  alt="Iron" src="/images/iron.png">
            543 <img alt="Wood" src="/images/wood.png">
            532 <img alt="Stone" src="/images/stone.png">
            1000<img alt="Resources" src="/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-xs-0 col-sm-1 col-lg-1"></div>
        <div class="col-md-8 col-xs-12 col-sm-10 col-lg-10">
            <div id="image_map">
                <map id="map_id" name="map_example">
                    <area href="construct" alt="Main-Building" target="_blank" shape=poly coords="420,100,540,100,540,210,420,210">
                    <area href="storage" alt="Storage" target="_blank" shape=poly coords="160,170,270,170,270,280,160,280">
                    <area href="cazarma" alt="Barracks" target="_blank" shape=poly coords="540,290,660,290,660,410,540,410">
                    <area href="wood" alt="Wood" target="_blank" shape=poly coords="650,450,770,450,770,570,650,570">
                    <area href="stone" alt="Stone" target="_blank" shape=poly coords="5,400,120,400,120,500,5,500">
                    <area href="iron" alt="Iron" target="_blank" shape=poly coords="1,1,120,1,120,100,1,100">
                </map>

                <img id="my_image" src="/images/map.png" alt="image map example" usemap="#map_example" class="align-none full-size img-responsive imaginea">
                <script>
                    window.onload = function () {
                        var ImageMap = function (map, img) {
                                    var n,
                                            areas = map.getElementsByTagName('area'),
                                            len = areas.length,
                                            coords = [],
                                            previousWidth = 800;
                                    for (n = 0; n < len; n++) {
                                        coords[n] = areas[n].coords.split(',');
                                    }
                                    this.resize = function () {
                                        var n, m, clen,
                                                x = img.offsetWidth / previousWidth;
                                        for (n = 0; n < len; n++) {
                                            clen = coords[n].length;
                                            for (m = 0; m < clen; m++) {
                                                coords[n][m] *= x;
                                            }
                                            areas[n].coords = coords[n].join(',');
                                        }
                                        previousWidth = img.offsetWidth;
                                        return true;
                                    };
                                    window.onresize = this.resize;
                                },
                                imageMap = new ImageMap(document.getElementById('map_id'), document.getElementById('my_image'));
                        imageMap.resize();
                        return;
                    }
                </script>
                <br>

            </div>
        </div>
        <div class="col-md-1 col-xs-0 col-sm-1 col-lg-1"></div>
    </div>
    <div class="coloana row">
        <div class="trupe">
            <img alt="Spear" src="/images/unit_spear.png"> :500
            <img alt="Sword" src="/images/unit_sword.png"> :1000
            <img alt="Axe" src="/images/unit_axe.png"> :1500
            <img alt="Archer" src="/images/unit_archer.png"> :2000
        </div>
    </div>
    <div class="row">
        <div class="butoane">
            <br>
            <a href="construct" class="btn btn-primary butonel" role="button">Main Building</a>
            <a href="cazarma" class="btn btn-primary " role="button">Baracks</a>
            <a href="storage" class="btn btn-primary " role="button">Storage</a>
            <a href="wood" class="btn btn-primary " role="button">Wood</a>
            <a href="stone" class="btn btn-primary " role="button">Stone</a>
            <a href="iron" class="btn btn-primary " role="button">Iron</a>
            <a href="movements" class="btn btn-primary " role="button">Movements</a>
            <a href="privireDeAnsamblu" class="btn btn-primary " role="button">Villages</a>
        </div>
    </div>
</div>
<div class="col-md-2 col-xs-1 col-lg-2 col-sm-1">
</div>
</body>
</html>
