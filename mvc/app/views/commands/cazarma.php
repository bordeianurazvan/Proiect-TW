<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/cazarma.css">
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
                <li><a href="/Proiect-TW/mvc/public/village/PrivireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/UserProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge"><?php echo $data['reportsCount']; ?></span> </a></li>
                <li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left"></div>
<div class="center">


    <div class="row">
        <div class="col-md-4 col-xs-2 col-sm-6 col-lg-6 Village"><?php echo $data['village_name']; ?></div>
        <div class="col md-2 col-xs-1 col-sm-2 col-lb-2"></div>
        <div class="col-md-6 col-xs-9 col-sm-4 col-lg-4 Iron"  >
            <?php echo $data['iron']; ?> <img alt="Iron" src="/Proiect-TW/mvc/public/images/iron.png">
            <?php echo $data['wood']; ?> <img alt="Wood" src="/Proiect-TW/mvc/public/images/wood.png">
            <?php echo $data['stone']; ?> <img alt="Stone" src="/Proiect-TW/mvc/public/images/stone.png">
            <?php echo $data['storage']; ?><img alt="Resources" src="/Proiect-TW/mvc/public/images/resources.png">
        </div>
    </div>

   <div class="troops">
    <div class="row nume">
       <div class="col-xs-3 col-md-3 col-lg-3 Spear">SpearMan
           </div>
       <div class="col-xs-3 col-md-3 col-lg-3 Axe">AxeMan

       </div>
       <div class="col-xs-3 col-md-3 col-lg-3 Sword">SwordsMan
          </div>
       <div class="col-xs-3 col-md-3 col-lg-3 Archer">Archer
           </div>
   </div>
       <div class="row trupe">
           <div class="col-xs-3 col-md-3 col-lg-3 Spear">
               <img alt="spear" src="/Proiect-TW/mvc/public/images/spear.png" class="img-responsive poza_spear"></div>
           <div class="col-xs-3 col-md-3 col-lg-3 Axe">
               <img alt="Axe" src="/Proiect-TW/mvc/public/images/axe.png" class="img-responsive poza_axe">
           </div>
           <div class="col-xs-3 col-md-3 col-lg-3 Sword">
               <img alt="Swords" src="/Proiect-TW/mvc/public/images/sword.png" class="img-responsive poza_sword"></div>
           <div class="col-xs-3 col-md-3 col-lg-3 Archer">
               <img alt="Archer" src="/Proiect-TW/mvc/public/images/archer.png" class="img-responsive poza_archer"></div>
       </div>

       <div class="row cost">
           <div class="col-xs-3 col-md-3 col-lg-3 ">Cost: <?php echo $data['spearCost']; ?>
               <img alt="spear" src="/Proiect-TW/mvc/public/images/resources.png" class="img-responsive"></div>
           <div class="col-xs-3 col-md-3 col-lg-3 ">Cost: <?php echo $data['axeCost']; ?>
               <img alt="Axe" src="/Proiect-TW/mvc/public/images/resources.png" class="img-responsive">
           </div>
           <div class="col-xs-3 col-md-3 col-lg-3 ">Cost: <?php echo $data['swordCost']; ?>
               <img alt="Swords" src="/Proiect-TW/mvc/public/images/resources.png" class="img-responsive"></div>
           <div class="col-xs-3 col-md-3 col-lg-3 ">Cost: <?php echo $data['archerCost']; ?>
               <img alt="Archer" src="/Proiect-TW/mvc/public/images/resources.png" class="img-responsive"></div>
       </div>
       <div class="row comanda">
           <form action="" method="POST">
           <div class="col-xs-3 col-md-3 col-lg-3 Spear_command">

                   <div>

                       <input type="number" class="form-control spear_form"  min="0" name="spear">
                   </div>

               </div>
           <div class="col-xs-3 col-md-3 col-lg-3 Axe_command">

                   <div>
                       <input type="number" class="form-control axe_form"  min="0" name="axe">
                   </div>

           </div>
           <div class="col-xs-3 col-md-3 col-lg-3 Sword_command">

                   <div>
                       <input type="number" class="form-control sword_form"  min="0" name="sword">
                   </div>

               </div>
           <div class="col-xs-3 col-md-3 col-lg-3 Archer_command">

                   <div>
                       <input type="number" class="form-control archer_form"  min="0" name="archer">
                   </div>

               </div>
               <div class="row">
               <button type="submit" class="btn btn-primary instruct">Instruct</button>
               <button type="button" class="btn btn-primary instruct" data-toggle="modal" data-target="#info"><span class="glyphicon glyphicon-info-sign"></span>Help</button>
               </div>
           </form>

       </div>

       <div class="row">

           <div class="modal fade modal-div" id="info">
               <div class="modal-dialog">
                   <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Troops Info</h4>
                            </div>
                       <div class="modal-body">
                           <table class="table no-border tabel-modal">
                               <tr>
                                  <th><img alt="Archer" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>
                                   <td>The archer has a very low Atack power but is a verry good offensive troop having a small resources cost and a small instruction time</td>
                               </tr>
                               <tr>
                                   <th><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png"></th>
                                   <td>The SwordsMan is the best offensive troop !but instruct them wisely because they have a great resources cost and time cost aswell</td>
                               </tr>
                               <tr>
                               <th><img alt="Axe" src="/Proiect-TW/mvc/public/images/unit_axe.png"></th>
                               <td>The AxeMan is the unit in offence but he has a very big instruction time and has a very big resources cost aswell</td>
                           </tr>

                               <tr>
                                   <th><img alt="spear" src="/Proiect-TW/mvc/public/images/unit_spear.png"></th>
                                   <td>The SpearMan is the most common unit.The spear man is good in defence and offence and has medium costs</td>
                               </tr>




                           </table>
                           </div>
                       </div>
       </div>
    </div>
</div>
</div>

    <div class="container-fluid tabel">
        <span style="font-size:1.4em">Active Commands</span>

        <table class="table no-border">
            <thead>
            <tr>
                <th>Troop Type</th>
                <th>Troop Number</th>
                <th>End Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
                for($index=0;$index<count($data['troopsName']);$index++)
                    echo '<tr><td>' . $data['troopsName'][$index] . '</td><td>' . $data['troopsNumber'][$index] . '</td><td>' . $data['troopsTime'][$index] . '</td></tr>';
            ?>
            </tbody>
        </table>
           </div>

</div>

<div class="rigth"></div>
</body>
</html>