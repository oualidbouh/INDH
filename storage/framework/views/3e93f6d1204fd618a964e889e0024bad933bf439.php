<!DOCTYPE html>
<html>
<head>
    <title>INDH</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('styles/datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('styles/md-bootstrap.min.css')); ?>">  
    <link rel="stylesheet" href="<?php echo e(url('styles/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('styles/toastr.min.css')); ?>">
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
        <div class="panel-heading form-group">
            <span class="pull-left">
                <b>{{year }} > {{budgetType}}</b>
            </span>
            <span class="pull-right">
                <a href="#/config"><i class="glyphicon glyphicon-cog " ></i>&nbsp;</a>
            </span>
        </div>
        <div class="panel-body" flow-init="{target : '/upload',testChunks : false , headers : {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}}">
            <div ng-view></div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(url('bower_components/jquery/dist/jquery.js')); ?>"></script>
    <script src="<?php echo e(url('bower_components/bootstrap/dist/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(url('bower_components/angular/angular.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('bower_components/moment/min/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/datepicker.js')); ?>"></script>
    
    <script src="<?php echo e(url('bower_components/angular-route/angular-route.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('bower_components/flow.js/dist/flow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('bower_components/ng-flow/dist/ng-flow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/factories/collaboratorFactory.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/factories/marketsFactory.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/factories/imageFactory.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/homeCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/addMarketCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/marketsCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/addMaitreOuvrageCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/detailsCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/controllers/imagesCtrl.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/angular/directives/ngEnter.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('scripts/toastr.js')); ?>"></script>
</body>
</html>
