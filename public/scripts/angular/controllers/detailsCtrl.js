
app.controller("marketDetailsCtrl",function ($scope,$location,$rootScope,$http,$filter,collaborators,marketsFactory,authService) {
	toastr.options = {
  						"closeButton": true,
  						"debug": false,
  						"newestOnTop": false,
  						"progressBar": true,
  						"positionClass": "toast-bottom-full-width",
  						"preventDuplicates": false,
  						"onclick": null,
  						"showDuration": "5",
  						"hideDuration": "1000",
  						"timeOut": "5000",
  						"extendedTimeOut": "1000",
  						"showEasing": "swing",
  						"hideEasing": "linear",
  						"showMethod": "fadeIn",
  						"hideMethod": "fadeOut"
					}
	$scope.montant = "";
	$scope.avenant ="";
	$scope.error = {};
		if($rootScope.year == undefined && $rootScope.budgetType == undefined){
			$location.path("/");
		}else{

					$http.get("/market/"+$rootScope.market.id+"/decomptes")
						.success(function(res) {
							$rootScope.market.decomptes = res;
						})
						.error(function () {
							//alert('error');
							$scope.error.message = "Erreur lors du chargement des decomptes !";
							$("#errorModal").modal('toggle');
						});

					$http.get("/market/"+$rootScope.market.id+"/avenants")
						.success(function(res) {
							$rootScope.market.avenants = res;
						})
						.error(function () {
							$scope.error.message = "Erreur lors du chargement des avenants !";
							$("#errorModal").modal('toggle');
						});
            
                    $scope.updateMarketsDetails = function(){
                        var totalDec = $rootScope.market.somme_decomptes;
						var totaAvenants = $rootScope.market.somme_avenants;
						var montant = $rootScope.market.montant;
                        
                        $rootScope.market.pourcentage_financier = Math.round(100*(parseInt(totalDec)/(parseInt(montant)+parseInt(totaAvenants))));
                    }
                    
					$scope.addDecompte = function(){
						if($scope.montant != ""){
							$http.post('/market/newDecompte',{"marche_id":$rootScope.market.id,"montant":$scope.montant})
							.success(function(res){
								$rootScope.market.decomptes.push(res);
								$rootScope.market.somme_decomptes += parseInt($scope.montant);
								$scope.updateMarketsDetails();
								$scope.montant="";
							}).error(function() {
								$scope.error.message = "Erreur lors de l'ajout des decomptes !";
								$("#errorModal").modal('toggle');
							});
						}else{
							//alert("valeur de decompte non valide")
							$scope.error.message = "Valeur de decompte non valide !";
							$("#errorModal").modal('toggle');
						}
					};
					$scope.avenant = {};
					$scope.addAvenant = function(){
						if($scope.avenant.objet != "" && $scope.avenant.objet !="" ){
							$http.post('/market/newAvenant',{"marche_id":$rootScope.market.id,"objet":$scope.avenant.objet,"montant" : $scope.avenant.montant})
							.success(function(res){
								var d= $filter('date');
								$rootScope.market.avenants.push(res);
                                $rootScope.market.somme_avenants += parseInt($scope.avenant.montant);
								$scope.updateMarketsDetails();
								$scope.avenant = {};
							}).error(function() {
								$scope.error.message = "Erreur lors de l'ajout des avenants !";
								$("#errorModal").modal('toggle');
							});
						}else{
							$scope.error.message = "Valeur de l'avenant non valide !";
							$("#errorModal").modal('toggle');						}
					}
                    $scope.deleteDecompte = function(i){
                        marketsFactory.deleteDecompte($rootScope.market.decomptes[i].id)
                            .success(function(res){
                                $rootScope.market.somme_decomptes -= $rootScope.market.decomptes[i].montant
                                $rootScope.market.decomptes.splice(i,1);
                                $scope.updateMarketsDetails();
                            })
                            .error(function(){
                               $scope.error.message = "erreur lors de la suppression du decompte !";
								$("#errorModal").modal('toggle');
                            });
                    }
                    
                    $scope.deleteAvenant = function(i){
                        marketsFactory.deleteAvenant($rootScope.market.avenants[i].id)
                            .success(function(res){
                                $rootScope.market.somme_avenants -= $rootScope.market.avenants[i].montant;
                                $rootScope.market.avenants.splice(i,1);
                                $scope.updateMarketsDetails();
                                toastr.success("la suppression de l'avenant a réussi ");
                            })
                            .error(function(){
                                $scope.error.message = "erreur lors de la suppression de l'avenant !";
								$("#errorModal").modal('toggle');
                            });
                    }
			$scope.edit = false;
            $scope.tmpMarket = {};
			$scope.editMarket = function() {
				$scope.edit = !$scope.edit?true:false;
                
				if(!$scope.edit){
					//this code is run when updating the market
					marketsFactory.updateMarket($rootScope.market)
                        .success(function(res){
                           toastr.success("Le marché a été mis à jour ! ");
                        })
                        .error(function(){
                            $scope.error.message = "erreur lors de la mise à jour du marché !";
								$("#errorModal").modal('toggle');
                        });
					
				}else{
					//load the collaborators into rootScope:
					collaborators.getAll()
						.success(function(resp) {
							$rootScope.collaborators = resp;
						})
						.error(function () {
							 $scope.error.message = "erreur lors du chargement des collaborateurs !";
							 $("#errorModal").modal('toggle');
						});
                    $scope.tmpMarket = $rootScope.market;
				}
			}
            
			$scope.setLab = function(){
				$rootScope.market.labo_id = $rootScope.collaborators.labos[labIndex].id;
			}	
			$scope.setArch = function(){
				$rootScope.market.architecte_id = $rootScope.collaborators.architectes[archIndex].id;
			}	
			$scope.setSociete = function(){
				$rootScope.market.societe_id = $rootScope.collaborators.societes[societeIndex].id;
			}	
			$scope.setMaitre = function(){
				$rootScope.market.maitre_id = $rootScope.collaborators.maitreOuvrages[maitreIndex].id;
			}	
			$scope.setBet = function(){
				$rootScope.market.bet_id = $rootScope.collaborators.bets[betIndex].id;
			}	
			$scope.logout = function() {
				if($rootScope.user){
					authService.logout();
				}
			}
			$scope.saveCollaborator = function (coll) {
				
				collaborators.post(coll,$scope[coll])
                    .success(function(res){
                        $rootScope.collaborators[coll+"s"].push($scope[coll]);
                        $rootScope.market[coll] = $scope[coll];
                        $("#"+coll+"Modal").modal('toggle');
                    })
                    .error(function(){
                        $scope.error.message='erreur lors de l\'enregistrement du collaborateur';
                        $("#errorModal").modal('toggle');
                    });
				    
			}

			$scope.printMarket = function () {
				
				toastr.success('génération du pdf en cours..');
				$http.get('/pdf/market/'+$rootScope.market.id).success(function(res){
					window.open('/pdf/market/'+$rootScope.market.id);
				}).error(function(){
					toastr.error('erreur lors de la génération du pdf..');
				});

			}
			$scope.sendMail = function () {
				toastr.success('envoie de l\'email en cours..');
				$http.post("/mail",{"obj":$scope.dest,"mail":$scope.mail}).success(function(res){
					$('#mailModal').modal("toggle");
				}).error(function(){
					toastr.error('erreur lors de l\'envoie du mail..');
				});
			}

			$scope.cancelMail=function(){
				$scope.dest = {};
				$scope.mail = {};
				$('#mailModal').modal("toggle");
			}
		}
});