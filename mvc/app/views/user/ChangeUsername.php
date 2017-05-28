<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/changes.css">
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
            <a class="navbar-logo" href="info.html">
                <img alt="Logo" src="images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="PrivireAsupraSatului.html"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="map.html"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="reports.html"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="Ranking.html"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="login.html"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="col-md-2 col-xs-2 col-sm-2 col-lg-2"></div>
<div class="col-md-8 col-xs-8 col-sm-8  col-lg-8 center">

    <div class="formular">
        <img alt="Logo2" src="images/logocrop3.png" class="img-responsive Logo2">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-6 col-lg-4">
                <table class="table no-border table-responsive LeftTable">
                   <tr>
                        <th colspan="1" class="text-center">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span style="font-size:1.4em">Settings</span>
                        </th>
                   </tr>
                    <tr><td><a href="changePassword.html"  class="btn btn-primary btn-xs ButtonPass">Change Password</a></td></tr>
                    <tr><td><a href="ChangeUsername.html"  class="btn btn-primary btn-xs">Change Username</a></td></tr>
                    <tr><td><a href="DeleteAccount.html"   class="btn btn-primary btn-xs DeleteButton">Delete Account</a></td></tr>
                    <tr><td></td></tr>

                </table>

            </div>
            <div class="col-md-6 col-sm-5 col-xs-5 col-lg-6">

                <form>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="text">New Username:</label>
                        <input type="text" class="form-control" id="text" placeholder="Enter Username" required>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" required> Confirm changes </label>
                    </div>
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