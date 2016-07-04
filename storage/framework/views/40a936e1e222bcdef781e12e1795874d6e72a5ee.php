<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>
</head>
<body ng-app>
<div style="padding: 15px;">
	<div class="btn-group" >
  <a href="#" class="btn btn-default">Default</a>
  <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
  <ul class="dropdown-menu">
   <li>
        <div class="checkbox-inline">
           	<label>
            	<input type="checkbox" ng-model="checked1">fefrvr

            </label>
        </div>
    </li>
    <li class="divider"></li>
   <li>
        <div class="checkbox-inline">
           	<label>
            	<input type="checkbox"  ng-model="checked2">spems
            </label>
        </div>
    </li>
    <li class="divider"></li>
    <li>
        <div class="checkbox-inline">
           	<label>
            	<input type="checkbox"  ng-model="checked3">reims
            </label>
        </div>
    </li>
  </ul>
</div>
<a href="#" class="btn btn-default">Default</a>
</div>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>ID Marché</th>
      <th>Objet du marché</th>
      <th>Budget</th>
      <th ng-show="checked1">ouqlid</th>

       <th ng-show="checked2">hidden3</th>
      <th ng-show="checked3">hidden3</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>2</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>3</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>4</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>5</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>6</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
    <tr>
      <td>7</td>
      <td>Column content</td>
      <td>Column content</td>
     <td ng-show="checked1">Can hide column 1</td> 
     <td ng-show="checked2">Can hide column 2</td> 
     <td ng-show="checked3">Can hide column 3</td> 
    </tr>
  </tbody>
</table> 
</body>
</html>