
app.controller("marketDetailsCtrl",function ($scope,$location,$rootScope,$http,$filter,collaborators,marketsFactory) {
	$scope.montant = "";
	$scope.avenant ="";
		if($rootScope.year == undefined && $rootScope.budgetType == undefined){
			$location.path("/");
		}else{

					$http.get("/market/"+$rootScope.market.id+"/decomptes")
						.success(function(res) {
							$rootScope.market.decomptes = res;
						})
						.error(function () {
							alert('error')
						});

					$http.get("/market/"+$rootScope.market.id+"/avenants")
						.success(function(res) {
							$rootScope.market.avenants = res;
						})
						.error(function () {
							alert('error')
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
								alert('error adding decomptes')
							});
						}else{
							alert("valeur de decompte non valide")
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
								alert('error adding avenants')
							});
						}else{
							alert('valeur de l\'avenant  non valide')
						}
					}
                    $scope.deleteDecompte = function(i){
                        marketsFactory.deleteDecompte($rootScope.market.decomptes[i].id)
                            .success(function(res){
                                $rootScope.market.somme_decomptes -= $rootScope.market.decomptes[i].montant
                                $rootScope.market.decomptes.splice(i,1);
                                $scope.updateMarketsDetails();
                            })
                            .error(function(){
                                alert('error');
                            });
                    }
                    
                    $scope.deleteAvenant = function(i){
                        marketsFactory.deleteAvenant($rootScope.market.avenants[i].id)
                            .success(function(res){
                                $rootScope.market.somme_avenants -= $rootScope.market.avenants[i].montant;
                                $rootScope.market.avenants.splice(i,1);
                                $scope.updateMarketsDetails();
                            })
                            .error(function(){
                                alert('error')
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
                            alert('market updated');
                        })
                        .error(function(){
                            alert('error')
                        });
					
				}else{
					//load the collaborators into rootScope:
					collaborators.getAll()
						.success(function(resp) {
							$rootScope.collaborators = resp;
						})
						.error(function () {
							alert('loding all collaborators error')
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

			$scope.saveCollaborator = function (coll) {
				
				collaborators.post(coll,$scope[coll])
                    .success(function(res){
                        $rootScope.collaborators[coll+"s"].push($scope[coll]);
                        $rootScope.market[coll] = $scope[coll];
                        $("#"+coll+"Modal").modal('toggle');
                    })
                    .error(function(){
                        alert('error saving '+coll);
                    });
				    
			}

			$scope.printMarket = function () {
				alert('printing market')
			}
			$scope.sendMail = function () {
				$http.post("/mail",{"obj" : $scope.dest}).success(function(res){
					console.log("hhhh");
				}).error(function(){
					alert("error");
				});
			}
		}
});