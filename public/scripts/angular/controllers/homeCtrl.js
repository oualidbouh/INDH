app.controller("homeCtrl",function($scope,$rootScope,$location,authService) {
	$scope.years = [];
	if(!$rootScope.user){
		$location.path('/login');
	}else{
	var selected_index = 0;
	for(i = 2005;i<=2050;i++){
		$scope.years.push({year:i,active:""});
	}
	$scope.years[0].active = "active";

	$rootScope.logout = function() {
		if($rootScope.user){
			authService.logout();
		}
	}

	$scope.selectYear = function (i) {
		$scope.years[selected_index].active = "";
		$scope.years[i].active = "active";
		selected_index = i;
		$rootScope.year = $scope.years[selected_index].year;
	}

	$scope.selectBudget = function(type) {
		$rootScope.budgetType  =  type;
	}
	$scope.selectYear(0);
	}
});