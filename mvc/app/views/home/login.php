<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Divide&Conquer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='http://connect.facebook.net/en_US/all.js'></script>
        <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/login.css">
    </head>
    <script>

        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if(response.status =='connected')
            {

                      Login();
            }

            if (response.status == 'not_authorized') {

                Login();
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1926385554274693',
                cookie     : true,

                xfbml      : true,
                version    : 'v2.8'
            });



            /*FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });*/


        };


        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        function Login() {
            FB.api('/me', function(response) {
                response.name=response.name.split(' ').join('%20');
                //window.alert('INCERC SA ACCESEZ'+'/Proiect-tw/mvc/public/home/loginFb/'+response.id+'/'+response.name);
                window.location.href='/Proiect-tw/mvc/public/home/loginFb/'+response.id+'/'+response.name;
            });
        }

    </script>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-logo" href="/Proiect-TW/mvc/public/home/login">
                    <img alt="Logo" src="/Proiect-TW/mvc/public/images/logocrop60%25.png" class="img-responsive">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Proiect-TW/mvc/public/home/login"><span class="glyphicon glyphicon-log-in"></span>
                        Login</a></li>
                <li><a href="/Proiect-TW/mvc/public/home/register"><span class="glyphicon glyphicon-user"></span> Sign
                        Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>
    <div class="col-md-8 col-xs-12 col-sm-12  col-lg-8">

        <div class="formular">
            <img alt="Logo2" src="/Proiect-TW/mvc/public/images/logocrop3.png" class="img-responsive Logo2">
            <form action="" method="post">
                <div class="form-group">
                    <?php
                    if($data['popup']!='yes'){
                    ?>
                    <label for="text">Username:</label>
                    <input type="text" class="form-control" id="text" placeholder="Enter username" name="username"
                           required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"
                           required>
                </div>
                <?php
                if ($data['retry'] == 'yes') echo '<h4><font color="red">LOGIN FAILED</font></h4>'; ?>
                <button type="submit" class="btn btn-default" value="Login">Login</button>

                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                </fb:login-button>
      </div>
                <?php
                }
                else
                {?>
                <div class="form-group">
                    <label for="text">Village Name:</label>
                    <input type="text" class="form-control" id="text" placeholder="Enter  UserName" name="name"
                </div>
                <?php if($data['invalid_username']=='yes')
                    echo '<h2>Username already exists</h2>'
                ?>
                <button type="submit" class="btn btn-primary instruct" >Commit</button>
                <?php }?>
            </form>
        </div>

    </div>
    <div class="col-md-2 col-xs-0 col-sm-0 col-lg-2"></div>

    </body>
    </html>
