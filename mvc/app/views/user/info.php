<!DOCTYPE html>
<html lang="en">
<head>
    <title>Divide&Conquer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Proiect-TW/mvc/public/css/info.css">
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
                <li><a href="/Proiect-TW/mvc/public/village/privireAsupraSatului"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="/Proiect-TW/mvc/public/UserProfile/getProfile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
                <li><a href="/Proiect-TW/mvc/public/map/getMap"><span class="glyphicon glyphicon-globe"></span> Map </a></li>
                <li><a href="/Proiect-TW/mvc/public/reports/reportslist"><span class="glyphicon glyphicon-comment"></span> Reports <span class="badge">17</span> </a></li>
                <li><a href="/Proiect-TW/mvc/public/ranking/rankingPopulation"><span class="glyphicon glyphicon-stats"></span> Ranking </a></li>
                <li><a href="/Proiect-TW/mvc/public"><span class="glyphicon glyphicon-off"></span> LogOut </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left">
</div>
<div class="center">

    <table class="table no-border table-responsive tabel">
       <tr><th colspan="1" class="text-center">

            <span style="font-size:1.4em">Game Info</span>
        </th>

</tr>
        <tr><td> <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#info">Game's Purpose</button>
            <div class="modal fade" id="info" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Games's Purpose</h4>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:1.4em" class="paragraf-no-line">Divide And Conquer is one of the most popular browser games in the world. As a player in Divide And Conquer, you will build
                                your own empire, recruit a mighty army, and fight with your allies for game world hegemony.</span>
                            </div>
                        </div>
                    </div>
                </div>
        </td>
        </tr>
        <tr><td> <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#howtowin">How to win</button>
            <div class="modal fade" id="howtowin" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Games's Purpose</h4>
                        </div>
                        <div class="modal-body">
                            <span style="font-size:1.4em" class="paragraf-no-line">In the end there can be only one king that shall rule the world.<br>In order for you to be that king
                            you need to conquer everybody that stays in your way.<br>Show them no mercy!</span>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        </tr>
        <tr><td> <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#support">Support</button>
            <div class="modal fade" id="support">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tell us what's bothering you!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Please let us know about any inconvenience that you are experiencing</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="comment">Ticket:</label>
                                    <textarea class="form-control textarea" maxlength="420" rows="5" id="comment" required name="textarea"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary instruct" >Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        </tr>
        <tr><td> <button type="button" class="btn btn-primary instruct" data-toggle="modal" data-target="#rules">Rules</button>
            <div class="modal fade" id="rules" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Rules</h4>
                        </div>
                        <div class="modal-body">
                            <ul>

                            <li><span style="font-size:1.4em" class="paragraf-no-line">Divide And Conquer is an English game. The use of other languages in game is forbidden.
                                This means all profiles and any other publication must be in English.</span></li>

                           <li><span style="font-size:1.4em" class="paragraf-no-line">It is not allowed to sell, buy or offer accounts or parts of accounts in exchange for Premium Points or any other outside benefit.</span>
                            </li>
                                <li><span style="font-size:1.4em" class="paragraf-no-line">Encouraging or tricking others into breaking the rules is strictly prohibited.</span>
                                </li>
                                </ul>


                        </div>
                    </div>
                </div>
            </div>
        </td>
        </tr>

    </table>

</div>


<div class="rigth"></div>
</body>
</html>