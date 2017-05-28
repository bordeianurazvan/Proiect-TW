<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/changes.css">
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
            <a class="navbar-logo" href="#">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-TW/mvc/public/village/privireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/UserProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reports"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="/Proiect-TW/mvc/ranking/ranking"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"></div>
<div class="col-md-8 col-xs-8 col-sm-8  col-lg-8 center">

    <div class="formular">
        <img alt="Logo2" src="/Proiect-TW/mvc/public/images/logocrop3.png" class="img-responsive Logo2">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-6 col-lg-4">
                <table class="table no-border table-responsive LeftTable">
                   <tr>
                        <th colspan="1" class="text-center">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span style="font-size:1.4em">Settings</span>
                        </th>
                   </tr>
                    <tr><td><a href="/Proiect-TW/mvc/public/UserProfile/changePassword" class="btn btn-primary btn-xs ButtonPass">Change Password</a></td></tr>
                    <tr><td><a href="/Proiect-TW/mvc/public/UserProfile/changeUsername" class="btn btn-primary btn-xs">Change Username</a></td></tr>
                    <tr><td><a href="/Proiect-TW/mvc/public/UserProfile/delete"  class="btn btn-primary btn-xs DeleteButton">Delete Account</a></td></tr>
                    <tr><td></td></tr>

                </table>

            </div>
            <div class="col-md-6 col-sm-5 col-xs-5 col-lg-6">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password" required name="password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" required> Confirm </label>
                    </div>
                    <?php if($data['retry']=='yes') echo '<h4><font color="red">Delete account FAILED</font></h4>';?>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
            <div class="col-md-2 col-sm-0 col-xs-0 col-lg-2"></div>
        </div>
    </div>
</div>
<div class="col-md-2 col-xs-2 col-sm-2  col-lg-2"></div>

</body>
</html>