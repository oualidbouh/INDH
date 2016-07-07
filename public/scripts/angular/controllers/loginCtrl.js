
app.controller("loginCtrl",function ($rootScope,$scope,$location ,authService) {

	$rootScope.position = "Authentification";
	if($rootScope.user == undefined){

		$scope.login = function () {
			authService.login($scope.user)
				.success(function (res) {
					
					if(res.length != 0){

						
						$rootScope.user = res[0];
						$location.path('/home')
						
					}else{

						toastr.warning("login ou mot de passe incorrecte!");
						
					}
				})
				.error(function () {

					toastr.error("erreur de connexion");
					
				})
		}

	}else{

		$location.path("/home");

	}
});