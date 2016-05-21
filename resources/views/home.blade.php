<!DOCTYPE html>
<html>
<head>
    <title>INDH</title>
    <link rel="stylesheet" type="text/css" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
    <!--<link rel="stylesheet" href="{{url('https://bootswatch.com/paper/bootstrap.min.css')}}">
-->
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
    <div class="panel panel-danger">
        <div class="panel-body">
            <div ng-view></div>
        </div>
    </div>
    <script type="text/javascript" src="{{url('bower_components/jquery/dist/jquery.js')}}"></script>
    <script src="{{url('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{url('bower_components/angular/angular.js')}}"></script>

    <script type="text/javascript" src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script src="{{url('bower_components/angular-route/angular-route.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/app.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/homeCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/bgCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/bpCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/addMarketCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/indhCtrl.js')}}"></script>
    <script type="text/javascript" src="{{url('scripts/angular/controllers/addMaitreOuvrageCtrl.js')}}"></script>


<!--
    include the controllers and services here


   
-->
</body>
</html>
