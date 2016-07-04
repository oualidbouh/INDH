<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>
	<script type="text/javascript">
		var app = angular.module('app',[]);
		app.controller('archiCtrl',function($scope,$http){
			//console.log('test');
			$scope.submitArchi=function(){
				//event.preventDefault();
				console.log('test');
				$http.post('/addArchi',{"name_archi":$scope.name_archi,"tel_archi":$scope.tel_archi,"fax_archi":$scope.fax_archi,"email_archi":$scope.email_archi,"adresse_archi":$scope.adresse_archi}).success(function(res){
						console.log(data);
				});
				console.log("test");	
			}
		});
	</script>
</head>
<body ng-app="app" ng-controller="archiCtrl">
<form>
	<label>Nom</label>
	<input type="text" ng-model="name_archi"/><br>
	<label>Nom</label>
	<input type="text" ng-model="tel_archi"/><br>
	<label>Nom</label>
	<input type="text" ng-model="fax_archi"/><br>
	<label>Nom</label>
	<input type="text" ng-model="email_archi"/><br>
	<label>Nom</label>
	<input type="text" ng-model="adresse_archi"/>
	<input type="button" value="submit" ng-click="submitArchi()"></input>
</form>
</body>
</html>