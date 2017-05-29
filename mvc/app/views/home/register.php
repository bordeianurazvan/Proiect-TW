
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/register.css">
    <script type="text/javascript">
        var datefield=document.createElement("input");
        datefield.setAttribute("type", "date");
        if (datefield.type!="date"){
            document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n');
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n');
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n');
        }
    </script>

    <script>
        if (datefield.type!="date"){
            jQuery(function($){
                $('#bday').datepicker({changeYear: true,changeMonth: true,yearRange: '1950:2003',defaultDate: '01/01/2003'});
            })
        }
    </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-logo" href="/Proiect-TW/mvc/public/home/login">
                <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/Proiect-TW/mvc/public/home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="/Proiect-TW/mvc/public/home/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        </ul>
    </div>
</nav>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>
<div class="col-md-8 col-xs-12 col-sm-12  col-lg-8">

    <div class="formular">
        <img alt="Logo2" src="/Proiect-TW/mvc/public/images/logocrop3.png" class="img-responsive Logo2">
        <form action="" method="post">
            <div class="form-group">
                <label for="text">Username:</label>
                <input type="text" class="form-control" id="text" placeholder="Enter username" required name="user_name">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" required name="password">
            </div>
            <div class="form-group">
                <label for="conf_pwd">Confirm Password:</label>
                <input type="password" class="form-control" id="conf_pwd" placeholder="Confirm Password" required name="c_password">
            </div>
            <div class="form-group">
                <label for="bday">Birthdate</label>
                <input type="date" class="form-control" id="bday" name="bday" min="1950-01-01" max="2003-12-31" required>
            </div>
            <div class="form-group">
                You must be at least 13 years old.
            </div>
            <div class="checkbox">
                <label><input type="checkbox" required> Accept our terms and conditions available at <a href="/Proiect-TW/mvc/public/home/terms">Terms & conditions</a></label>
            </div>

            <button type="submit" class="btn btn-default">Sign Up</button>
            <?php if($data['retry']=='yes') echo '<h4><font color="red">REGISTER FAILED</font></h4>'; ?>
        </form>
    </div>
</div>
<div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>

</body>
</html>