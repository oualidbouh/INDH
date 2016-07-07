/*Ce controlleur est associé à la page de modification des collaborateurs*/
app.controller("configCtrl",function ($scope,$location,$rootScope,collaborators,authService,userFactory) {
	
	
	
	if($rootScope.user == undefined){
		$location.path("/login");

	}

	else if( $rootScope.user.type ==="visitor"){
		$location.path('/home');
	}


	else {
		
		$rootScope.position = "Page de configuration";
		$scope.newUser = {};
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
	 	toastr.error('Erreur lors du chargement des collaborateurs ');
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
		var index = 0;
		for(var i=0; i < $scope.users.length;i++){
			if($scope.users.id === $rootScope.user.id){
				index = i;
			}
		} 
		
		$scope.users.splice(index, 1);
		
	}).error(function(){
		toastr.warning("erreur lors du chargements des utilisateurs !");
	});

	$scope.changeType =function(type){
		
		if(type=='admin'){
		var j =0;
		var k = 0;
		for(var i = 0 ; i < $scope.users.length ; i++){
			if($scope.users[i].type === 'admin'){
				k=i;
				j++;
			}
		}
		if(j===0){
			toastr.error("Veuillez au moins designer un administrateur ! ");
			
			$scope.users[k].type = 'admin';
			$scope.apply();
			return ; 
		}
	}
		return; 
	}

	$scope.modifUser = function(i){
		
		$scope.newUser = $scope.users[i];		
	}

	$scope.saveUser = function(obj){
		var j =0;
		for(var i = 0 ; i < $scope.users.length ; i++){
			if($scope.users[i].type === 'admin'){
				j++;
			}
		}
		if(j===0){
			toastr.error("Veuillez au moins designer un administrateur ! ");
			return ; 
		}

		userFactory.updateUser(obj).success(function(res){
			$("#userModal").modal("toggle");
			toastr.success("l'utilisateur a été mis à jour avec sucés ! ");
		}).error(function(){
			toastr.error("erreur lors de la mise à jour de l'utilisateur");
		});
	}

	$scope.saveCollab = function(newCollab){
		if($scope.newCollab.type==='archi'){
			for(var i = 0; i < $scope.archis.length ; i++){
				if($scope.archis[i].name_archi === $scope.newCollab.name){
					toastr.error('le collaborateur saisi existe déjà !');
					return;
				}
			}
		}
		
	
		if($scope.newCollab.type==='lab'){
			for(var i = 0; i < $scope.labos.length ; i++){
				if($scope.labos[i].name_labo === $scope.newCollab.name){
					toastr.error('le collaborateur saisi existe déjà !');
					return
				}
			}
		}

		if($scope.newCollab.type==='bet'){
			for(var i = 0; i < $scope.bets.length ; i++){
				if($scope.bets[i].name_bet === $scope.newCollab.name){
					toastr.error('le collaborateur saisi existe déjà !');
					return;
				}
			}
		}

		if($scope.newCollab.type==='maitre'){
			for(var i = 0; i < $scope.maitres.length ; i++){
				if($scope.maitres[i].name_maitre_ouvrage === $scope.newCollab.name){
					toastr.error('le collaborateur saisi existe déjà !');
					return;
				}
			}
		}

		if($scope.newCollab.type==='soc'){
			for(var i = 0; i < $scope.societes.length ; i++){
				if($scope.societes[i].name_societe === $scope.newCollab.name){
					toastr.error('le collaborateur saisi existe déjà !');
					return;
				}
			}
		}

			collaborators.postCollabrator(newCollab).success(function(res){

				if($scope.newCollab.type === 'archi'){
					var a = {};
					a.name_archi = $scope.newCollab.name;
					a.email_archi = $scope.newCollab.email;
					a.fax_archi = $scope.newCollab.fax;
					a.tel_archi = $scope.newCollab.tel;
					a.adresse_archi = $scope.newCollab.adresse;
					$scope.archis.push(a);
				}

				if($scope.newCollab.type === 'lab'){
					var a = {};
					a.name_labo = $scope.newCollab.name;
					a.email_labo = $scope.newCollab.email;
					a.fax_labo = $scope.newCollab.fax;
					a.tel_labo = $scope.newCollab.tel;
					a.adresse_labo = $scope.newCollab.adresse;
					$scope.labos.push(a);
				}

				if($scope.newCollab.type === 'bet'){
					var a = {};
					a.name_bet = $scope.newCollab.name;
					a.email_bet = $scope.newCollab.email;
					a.fax_bet = $scope.newCollab.fax;
					a.tel_bet = $scope.newCollab.tel;
					a.adresse_bet = $scope.newCollab.adresse;
					$scope.bets.push(a);
				}

				if($scope.newCollab.type === 'maitre'){
					var a = {};
					a.name_maitre_ouvrage = $scope.newCollab.name;
					a.email_maitre_ouvrage = $scope.newCollab.email;
					a.fax_maitre_ouvrage = $scope.newCollab.fax;
					a.tel_maitre_ouvrage = $scope.newCollab.tel;
					a.adresse_maitre_ouvrage = $scope.newCollab.adresse;
					$scope.maitres.push(a);
				}
				if($scope.newCollab.type === 'soc'){
					var a = {};
					a.name_societe = $scope.newCollab.name;
					a.email_societe = $scope.newCollab.email;
					a.fax_societe = $scope.newCollab.fax;
					a.tel_societe = $scope.newCollab.tel;
					a.adresse_societe = $scope.newCollab.adresse;
					$scope.societes.push(a);
				}

				$("#collabModal").modal("toggle");
				toastr.success("le collaborateur a été ajouté avec succés");
				$scope.newCollab = {};
			}).error(function(){
				toastr.error("erreur lors de l'ajout du collaborateur");
			});

		}
	}

	$scope.saveUser1 = function(){
		
			for(var i = 0; i < $scope.users.length ; i++){
				if($scope.users[i].name === $scope.user1.name){
					toastr.error("le nom de l'utilisateur doit etre unique ! ");
					return;
				}
			}
		
		userFactory.postUser($scope.user1).success(function(res){
			toastr.success("L'utilisateur a été ajouté avec succés !");
			$scope.users.push($scope.user1);
		}).error(function(){
			toastr.error("erreur lors de l'ajout de l'utilisateur !");
		});
	}

	$scope.cancelSaveUser = function(){
		$scope.user1 = {};
		$scope.user1.email = "";
	}


});
