<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/PrivireAsupraSatului.css">
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

<div class="col-md-2 col-xs-1 col-lg-2 col-sm-1">
</div>
<div class="col-md-8 col-xs-10 col-lg-8 col-sm-10 center">
    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            <?php echo $data['iron']; ?><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo ($data['storage']*1000); ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-xs-0 col-sm-1 col-lg-1"></div>
        <div class="col-md-8 col-xs-12 col-sm-10 col-lg-10">
            <div id="image_map">
                <map id="map_id" name="map_example">
                    <area href="/Proiect-TW/mvc/public/commands/construct" alt="Main-Building" target="_blank" shape=poly coords="420,100,540,100,540,210,420,210">
                    <area href="/Proiect-TW/mvc/public/village/storage" alt="Storage" target="_blank" shape=poly coords="160,170,270,170,270,280,160,280">
                    <area href="/Proiect-TW/mvc/public/commands/cazarma" alt="Barracks" target="_blank" shape=poly coords="540,290,660,290,660,410,540,410">
                    <area href="/Proiect-TW/mvc/public/village/wood" alt="Wood" target="_blank" shape=poly coords="650,450,770,450,770,570,650,570">
                    <area href="/Proiect-TW/mvc/public/village/stone" alt="Stone" target="_blank" shape=poly coords="5,400,120,400,120,500,5,500">
                    <area href="/Proiect-TW/mvc/public/village/iron" alt="Iron" target="_blank" shape=poly coords="1,1,120,1,120,100,1,100">
                </map>

                <img id="my_image" src="/Proiect-TW/mvc/public/images/map.png" alt="image map example" usemap="#map_example" class="align-none full-size img-responsive imaginea">
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
            <img alt="Spear" src="/Proiect-TW/mvc/public/images/unit_spear.png"> :<?php echo $data['spear']; ?>
            <img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png"> :<?php echo $data['sword']; ?>
            <img alt="Axe" src="/Proiect-TW/mvc/public/images/unit_axe.png"> :<?php echo $data['axe']; ?>
            <img alt="Archer" src="/Proiect-TW/mvc/public/images/unit_archer.png"> :<?php echo $data['archer']; ?>
        </div>
    </div>
    <div class="row">
        <div class="butoane">
            <br>
            <a href="/Proiect-TW/mvc/public/commands/construct" class="btn btn-primary butonel" role="button">Main Building</a>
            <a href="/Proiect-TW/mvc/public/commands/cazarma" class="btn btn-primary " role="button">Baracks</a>
            <a href="/Proiect-TW/mvc/public/village/storage" class="btn btn-primary " role="button">Storage</a>
            <a href="/Proiect-TW/mvc/public/village/wood" class="btn btn-primary " role="button">Wood</a>
            <a href="/Proiect-TW/mvc/public/village/stone" class="btn btn-primary " role="button">Stone</a>
            <a href="/Proiect-TW/mvc/public/village/iron" class="btn btn-primary " role="button">Iron</a>
            <a href="/Proiect-TW/mvc/public/attack/movements" class="btn btn-primary " role="button">Movements</a>
            <a href="/Proiect-TW/mvc/public/village/overview/1" class="btn btn-primary " role="button">Villages</a>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#support">Change VillageName</button>
            <div class="modal fade" id="support">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change village name</h4>
                        </div>
                        <div class="modal-body">
                            <p>Put in the Name that you prefer</p>
                            <form action="/Proiect-tw/mvc/public/VillageName/changeVillageName/" method="post">
                                <div class="form-group">
                                    <label for="text">Village Name:</label>
                                    <input type="text" class="form-control" id="text" placeholder="Enter Village Name" name="name"
                                </div>
                                <button type="submit" class="btn btn-primary instruct" >Commit Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2 col-xs-1 col-lg-2 col-sm-1">
</div>
</body>
</html>
