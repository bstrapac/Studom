<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" ng-app="oModul" ng-controller="glavniController" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studentski dom</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/angular-cookies.min.js"></script>
    <script src="js/globals.js"></script>
    <script src="js/sobe.js"></script>
    <script src="js/app.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div  class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-fw fa-home"></i></a>
            <a class="navbar-brand" href="#!/pocetna"><i class="fa fa-fw fa-dashboard"></i></a>
            <a class="navbar-brand" href="#!/studenti"><i class="fa fa-fw fa-user"></i></a>
            <a class="navbar-brand" href="#!/sobe"><i class="fa fa-fw fa-key"></i></a>
            <a class="navbar-brand" href="#!/zahtjevi"><i class="fa fa-fw fa-table"></i></a>
            <a class="navbar-brand" ng-click="Odjava()"><i class="fa fa-fw fa-power-off"></i></a>
            
        </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <img id="logo" src="img/logo_studom2.png">
                </li>
                <li>
                    <a href="#!/pocetna"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#!/studenti"><i class="fa fa-fw fa-user"></i> Studenti</a>
                </li>
                
                <li>
                    <a href="#!/sobe"><i class="fa fa-fw fa-key"></i> Sobe</a>
                </li>
                <li>
                    <a href="#!/zahtjevi"><i class="fa fa-fw fa-table"></i> Zahtjevi</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Studentski dom</h1>
                   
                </div>
            </div>
             <div ng-view></div>
        </div>
    </div>    
</div>
<div id="modals" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div id="registracija_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #B0C4DE ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registracija:</h4>
          <p>Registracijom automatski šaljete zahtjev za sobu, molimo Vas da ispunite svoje podatke.</p>
        </div>
        <div class="modal-body">
          <form>    
          <div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input ng-model="inptFirstName" type="text" placeholder="Ime"  required>   
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input ng-model="inptLastName" type="text" placeholder="Prezime" required>
            </div> 
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
              <input ng-model="inptJmbag" minlength="9" maxlength="9" type="text" placeholder="Jmbag" required>
            </div> 
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
              <input ng-model="inptCollege" type="text" placeholder="Studij" required>
            </div> 
             <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input ng-model="inptEmail"  type="email" placeholder="E-mail adresa" required>
            </div>            
             <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
               <input ng-model="inptContact" minlength="9" maxlength="10" type="text" placeholder="Broj telefona" required>
            </div>            
            <label><b>Spol:</b></label><br>
            <div>
              <input type="radio" ng-model="gender" value="M"> Muško
            </div>
            <div>
               <input type="radio" ng-model="gender" value="F"> Žensko
            </div>  
          </div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
           <button ng-click="RegistracijaStudenta()" type="submit" class="button btn btn-info" data-dismiss="modal">Registracija</button>
      </form>
        </div>
      <div class="modal-footer" style="background-color: #B0C4DE">       
      </div>
        </div>
    </div>
    <script src="js/globals.js"></script>
    <script src="js/app.js"></script>
    <script src="js/sobe.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
