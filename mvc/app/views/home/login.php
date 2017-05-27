<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-logo" href="login">
                <img alt="Logo" src="../public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="home/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        </ul>
    </div>
</nav>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>
<div class="col-md-8 col-xs-12 col-sm-12  col-lg-8">

    <div class="formular">
        <img alt="Logo2" src="../public/images/logocrop3.png" class="img-responsive Logo2">
        <form action="" method="post">
            <div class="form-group">
                <label for="text">Username:</label>
                <input type="text" class="form-control" id="text" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default" value="Login">Login</button>
        </form>
    </div>
</div>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>

</body>
</html>