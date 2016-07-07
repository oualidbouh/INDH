<!DOCTYPE html>
<html>
<head>
    <title>INDH</title>
    <link rel="stylesheet" type="text/css" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('styles/datepicker.css')}}" />
    <link rel="stylesheet" href="{{url('styles/md-bootstrap.min.css')}}">  
    <link rel="stylesheet" href="{{url('styles/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('styles/toastr.min.css')}}">
    <style type="text/css">
        body{
            padding-top: 15px;
        }
        .years{
            max-height: 500px;
            overflow: auto;
        }
    </style>
</head>
<body class="container" ng-app="indh">
<nav class="navbar navbar-default" ng-show="user!=undefined">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DAMANATI</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li ng-hide="user.type=='visitor'"><a href="/#/config"><i class="glyphicon glyphicon-cog"></i>&nbsp;Paramètres</a></li>
        <li><a href="/#/home"><i class="glyphicon glyphicon-home"></i>&nbsp;Page d'acceuil</a></li>
        <li><a href="#" ng-click="logout()"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Se déconnecter</a></li>
         
      </ul>
    </div>
  </div>
</nav>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <b>@{{position}}</b>
        </div>
        <div class="panel-body" flow-init="{target : '/upload',testChunks : false , headers : {'X-CSRF-TOKEN': '{{csrf_token()}}'}}">
            <div ng-view></div>
        </div>
    </div>
    <script type="text/javascript" src="{{url('bower_components/jquery/dist/jquery.js')}}"></script>
    <script src="{{url('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{url('bower_components/angular/angular.js')}}"></script>

    <script type="text/javascript" src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/datepicker.js')}}"></script>
    
    <script src="{{url('bower_components/angular-route/angular-route.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components/flow.js/dist/flow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components/ng-flow/dist/ng-flow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/factories/collaboratorFactory.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/factories/marketsFactory.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/factories/imageFactory.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/factories/userFactory.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/homeCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/addMarketCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/marketsCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/addMaitreOuvrageCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/detailsCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/loginCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/configCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/imagesCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/directives/ngEnter.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/services/authService.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/toastr.js')}}"></script>
</body>
</html>
