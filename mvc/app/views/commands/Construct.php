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
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/Construct.css">
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
        <div class="col md-2 col-xs-1 col-sm-2 col-lg-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron">
            <?php echo $data['iron']; ?> <img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?> <img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?> <img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo $data['storage'];?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>

    <div class="row TabelMare">
        <table class="table table-responsive no-border TabelMare">
            <tbody>
            <tr>
                <td>
                    <table class="table table-responsive no-border HeaderTabel">
                        <tbody>
                        <tr>
                            <td>
                                <img src="/Proiect-TW/mvc/public/images/main3.png" alt="Main Build" >
                            </td>
                            <td>
                                <h4>Main Building (Level <?php echo $data['mainBuildingLevel']; ?>)</h4>

                                In the Main Building you can construct new buildings or upgrade existing ones.
                                The higher the level of your headquarters, the faster the constructions will be finished.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="Tabel Cladiri">
                        <table class="table table-responsive no-border  TabelCladiri">
                            <tbody>
                            <tr>
                                <th class="BuildingsTH">Buildings</th>
                                <th colspan="4">Necessities</th>
                                <th class="ConstructTH">Construct</th>
                            </tr>
                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/main3.png"  alt="Main Building" class="img-responsive"></a>
                                    Main Building
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['mainBuildingLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['mainBuildingNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['mainBuildingNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"><?php echo $data['mainBuildingNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['mainInConstruction']==0) echo 'Construction time:'.$data['mainBuildingTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['mainInConstruction']!=0) echo 'Construction finish on: '.$data['mainBuildingEndTime']; ?></span>

                                </td>
                                <td>

                                <?php
                                if ($data['mainInConstruction']!=0)
                                  echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/1">Level'.($data['mainBuildingLevel']+1).' </a>';
                                else
                                  echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/1">Level'.($data['mainBuildingLevel']+1).' </a>';
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/barracks3.png" alt="Barracks" class="img-responsive"></a>
                                    Barracks
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['barracksLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['barracksNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['barracksNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"><?php echo $data['barracksNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['barracksInConstruction']==0) echo 'Construction time:'.$data['barracksTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['barracksInConstruction']!=0) echo 'Construction finish on: '.$data['barracksEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['barracksInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/3">Level'.($data['barracksLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/3">Level'.($data['barracksLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/storage3.png"  alt="Storage" class="img-responsive"></a>
                                    Storage
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['storageLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['storageNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['storageNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"> <?php echo $data['storageNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['storageInConstruction']==0) echo 'Construction time:'.$data['storageTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['storageInConstruction']!=0) echo 'Construction finish on: '.$data['storageEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['storageInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/7">Level'.($data['storageLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/7">Level'.($data['storageLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/wall3.png" alt="Wall" class="img-responsive"></a>
                                    Wall
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['wallLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['wallNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['wallNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"> <?php echo $data['wallNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['wallInConstruction']==0) echo 'Construction time:'.$data['wallTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['wallInConstruction']!=0) echo 'Construction finish on: '.$data['wallEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['wallInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/2">Level'.($data['wallLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/2">Level'.($data['wallLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/wood3.png" alt="Wood" class="img-responsive"></a>
                                    Wood
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['woodLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['woodNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['woodNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"> <?php echo $data['woodNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['woodInConstruction']==0) echo 'Construction time:'.$data['woodTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['woodInConstruction']!=0) echo 'Construction finish on: '.$data['woodEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['woodInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/5">Level'.($data['woodLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/5">Level'.($data['woodLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/iron3.png" alt="Iron" class="img-responsive"></a>
                                    Iron
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['ironLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['ironNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['ironNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"> <?php echo $data['ironNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['ironInConstruction']==0) echo 'Construction time:'.$data['ironTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['ironInConstruction']!=0) echo 'Construction finish on: '.$data['ironEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['ironInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/6">Level'.($data['ironLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/6">Level'.($data['ironLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <a><img src="/Proiect-TW/mvc/public/images/stone3.png" alt="Stone" class="img-responsive"></a>
                                    Stone
                                    <br>
                                    <span style="font-size: 0.9em">Level <?php echo $data['stoneLevel']; ?></span>
                                </td>
                                <td class="cost_wood"><img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png"><?php echo $data['stoneNecessities']; ?></td>
                                <td class="cost_stone"><img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png"><?php echo $data['stoneNecessities']; ?></td>
                                <td class="cost_iron"><img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png"><?php echo $data['stoneNecessities']; ?></td>
                                <td><span class="glyphicon glyphicon-time "></span>
                                    <span><?php if ($data['stoneInConstruction']==0) echo 'Construction time:'.$data['stoneTimeFinal'].' seconds'; ?></span>
                                    <span><?php  if ($data['stoneInConstruction']!=0) echo 'Construction finish on: '.$data['stoneEndTime']; ?></span>

                                </td>
                                <td>

                                    <?php
                                    if ($data['stoneInConstruction']!=0)
                                        echo '<a type="button"  class="btn btn-primary btn-xs" style="pointer-events: none; cursor: default;" href="/Proiect-Tw/mvc/public/commands/constructOrder/4">Level'.($data['stoneLevel']+1).' </a>';
                                    else
                                        echo '<a type="button"  class="btn btn-primary btn-xs" href="/Proiect-Tw/mvc/public/commands/constructOrder/4">Level'.($data['stoneLevel']+1).' </a>';
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>



</div>
</div>
</body>
</html>