/*Ce controlleur est associé à la page de modification des collaborateurs*/
app.controller("configCtrl",function ($scope,$location,$rootScope,collaborators,authService,userFactory) {
	
	console.log($rootScope.user.id);
	
	if($rootScope.user == undefined){
		$location.path("/login");

	}

	else if( $rootScope.user.type ==="visitor"){
		$location.path('/home');
	}


	else {
	
	$scope.archis = [];
	$scope.labos = [];
	$scope.bets = [];
	$scope.societes = [];
	$scope.maitres = [];
	$scope.newLab = {};
	$scope.newBet = {};
	$scope.newArch = {};
	$scope.newMaitre = {};
	$scope.newSoc = {};
	$scope.obj = {};
	$scope.myDropDown = "mai";
	 collaborators.getAll().success(function(res){
	 	$scope.archis = res.architectes;
	 	$scope.labos = res.labos;
	 	$scope.bets = res.bets;
	 	$scope.societes = res.societes;
	 	$scope.maitres = res.maitreOuvrages; 	

	 })
	 .error(function(){
	 	alert("erreur")
	 });

	 /* permet de transmettre les information d'un collaborateur au modal de modification quand 
	 l'utilisateur click sur un marché  */
	$scope.modifLab= function(i){
			$scope.newLab = $scope.labos[i];

	}

	$scope.modifArch = function(i){
			$scope.newArch = $scope.archis[i];
	}

	$scope.modifBet = function(i){
			$scope.newBet = $scope.bets[i];
	}

	$scope.modifSoc = function(i){
			$scope.newSoc = $scope.societes[i];
	}

	$scope.modifMaitre = function(i){
			$scope.newMaitre = $scope.maitres[i];
	}
	
		$scope.logout = function() {
		if($rootScope.user){
			authservice.logout();
		}
	}
	/*permet d'enregistrer les modifications souhaité à un collaborateur
		l'ensemble des nouvels informations sont stocké dans l'objet obj
		"s" contient le type de collaborateur (architect, laboratoire ..)
		la definition complette de la methode est dans le fichier collaboratorCtrl.php
	*/
	$scope.saveCollaborator = function(obj,s){
				obj.type = s;
				collaborators.putCollaborator(obj)
					.success(function(res){
						$("#"+s+"Modal").modal("toggle");
					})
	};


	userFactory.getUsers().success(function(res){
		
		$scope.users = res;
		
	}).error(function(){
		toastr.warning("erreur lors du chargements des utilisateurs !");
	});

	$scope.modifUser = function(i){
		
		$scope.newUser = $scope.users[i];		
	}

	$scope.saveUser = function(obj){
		userFactory.updateUser(obj).success(function(res){
			$("#userModal").modal("toggle");
			toastr.success("l'utilisateur a été mis à jour avec sucés ! ");
		}).error(function(){
			toastr.error("erreur lors de la mise à jour de l'utilisateur");
		});
	}
	}
});
