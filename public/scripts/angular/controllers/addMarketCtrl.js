
/*Controller function*/
app.controller("addMarketCtrl",function($scope,$rootScope,$location,collaborators,marketsFactory){

    if($rootScope.year == undefined || $rootScope.budgetType == undefined || $rootScope.user == undefined || $rootScope.user.type == 'visitor'){
        $location.path('/');
    }
    $rootScope.position = "Ajouter un marché";
    $scope.market = {year:$rootScope.year};
	/*these array store data that comes from the server*/
	$scope.laboratoires=[];
	$scope.architectes=[];
	$scope.bets= [];
	$scope.societes = [];
	$scope.maitres = [];
    /*these objects store the data that the user types to fill the forms of collaborators*/
    $scope.labo = {};
    $scope.soc = {};
    $scope.maitre = {};
    $scope.archi = {};
    $scope.bet = {};
    /*these objects are used to set the saved collaborator in the select component*/
    $scope.selectedLabo = "";
    $scope.selectedSociete="";
    $scope.selectedArchitecte = "";
    $scope.selectedBet = "";
    $scope.selectedMaitre = "";

	collaborators.getLabs()
        .success(function(res){
            $scope.laboratoires = res;
            $scope.selectedLabo = $scope.laboratoires[0];
            $scope.market.labo_id = $scope.laboratoires[0].id;
        })
        .error(function(){
            toastr.error('Erreur lors du chargement des  Laboratoires');
        });

	collaborators.getArchs()
        .success(function(res){
            $scope.architectes = res;
            $scope.selectedArchitecte = $scope.architectes[0];
            $scope.market.archi_id = $scope.architectes[0].id;
        })
        .error(function(){
            toastr.error('Erreur lors du chargement des  architectes');
        });
	
	collaborators.getBETS()
        .success(function(res){
            $scope.bets = res;
            $scope.selectedBet = $scope.bets[0];
            $scope.market.bet_id = $scope.bets[0].id;
        })
        .error(function(){
            toastr.error('Erreur lors du chargement des  bets');
        });

	collaborators.getSocietes()
        .success(function(res){
            $scope.societes = res;
            $scope.selectedSociete = $scope.societes[0];
            $scope.market.societe_id = $scope.societes[0].id;
        })
        .error(function(){
            toastr.error('Erreur lors du chargement des  societes');
        });

	collaborators.getMaitre()
        .success(function(res){
            $scope.maitres = res;
            $scope.selectedMaitre = $scope.maitres[0];
            $scope.market.maitre_ouvrage_id = $scope.maitres[0].id;
        })
        .error(function(){
            toastr.error("Erreur lors du chargement des  maitres d'ouvrage");
        });


    $scope.saveSociete = function(){
        for(var i = 0; i < $scope.societes.length ; i++){
                if($scope.societes[i].name_societe === $scope.soc.name_societe){
                    toastr.error('le collaborateur saisi existe déjà !');
                    return;
                }
            }
        collaborators.postSociete($scope.soc)
            .success(function(res){
               if(res){
                    $scope.societes.push(res);
                    $scope.selectedSociete = res;
                    $scope.market.societe_id = res.id;
                    $('#societeModal').modal("toggle");
                    $scope.soc = {};
               }

            })
            .error(function(){
                toastr.error("Erreur lors de l'ajout de la societe")
            });
    }
	$scope.saveLabo = function(){
        for(var i = 0; i < $scope.laboratoires.length ; i++){
                if($scope.laboratoires[i].name_labo === $scope.labo.name_labo){
                    toastr.error('le collaborateur saisi existe déjà !');
                    return;
                }
            }
		collaborators.postLab($scope.labo)
            .success(function(res){
                $scope.laboratoires.push(res);
                $scope.selectedLabo = res;
                $scope.market.labo_id= res.id
                $('#labModal').modal("toggle");
                $scope.labo = {};
            })
            .error(function(){
                toastr.error('');
            });
	}
    
    $scope.saveArchitect = function(){
        collaborators.postArch($scope.archi)
            .success(function(res){
                $scope.architectes.push(res);
                $scope.selectedArchitecte = res;
                $scope.market.archi_id = res.id;
                $('#archModal').modal("toggle");
                $scope.archi = {};
            })
            .error(function(){
                toastr.error("Erreur lors de l'ajout de l'architecte")
            });
    }
    $scope.saveBet = function(){
		collaborators.postBET($scope.bet)
            .success(function(res){
                $scope.bets.push(res);
                $scope.selectedBet = res;
                $scope.market.bet_id = res.id;
                $('#betModal').modal("toggle");
                $scope.bet = {};
            })
            .error(function(){
                toastr.error("Erreur lors de l'ajout du bureau d'étude");
            });
	}
    
    $scope.saveMaitre = function(){
        collaborators.postMaitre($scope.maitre)
            .success(function(res){
                $scope.maitres.push(res);
                $scope.selectedMaitre = res
                $scope.market.maitre_ouvrage_id = res.id;
                $('#maitreModal').modal("toggle");
                $scope.maitre = {};
            })
            .error(function(){
                toastr.error("Erreur lors de l'ajout du maitre d'ouvrage")
            });
    }

    $scope.saveMarket = function(){
        marketsFactory.postMarket($scope.market)
            .success(function(){
                $scope.market = {};
                $location.path("/"+$rootScope.typeBudget);
            })
            .error(function(){
                toastr.error('Erreur lors de la sauvgarde du marché')
            });
        
    }

    $scope.cancelMarket = function () {
        if(confirm("Voulez vous vraiment annuler.")){
            window.history.back();
        }
    }
});