
/*Controller function*/
app.controller("addMarketCtrl",function($scope,$rootScope,$location,collaborators,marketsFactory){

    if($rootScope.year == undefined || $rootScope.budgetType == undefined){
        $location.path('/')
    }

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
            alert('error loading Laboratoires');
        });
	collaborators.getArchs()
        .success(function(res){
            $scope.architectes = res;
            $scope.selectedArchitecte = $scope.architectes[0];
            $scope.market.archi_id = $scope.architectes[0].id;
        })
        .error(function(){
            alert('error loading Archs');
        });
	
	collaborators.getBETS()
        .success(function(res){
            $scope.bets = res;
            $scope.selectedBet = $scope.bets[0];
            $scope.market.bet_id = $scope.bets[0].id;
        })
        .error(function(){
            alert('error loading bets');
        });

	collaborators.getSocietes()
        .success(function(res){
            $scope.societes = res;
            $scope.selectedSociete = $scope.societes[0];
            $scope.market.societe_id = $scope.societes[0].id;
        })
        .error(function(){
            alert('error loading societes');
        });

	collaborators.getMaitre()
        .success(function(res){
            $scope.maitres = res;
            $scope.selectedMaitre = $scope.maitres[0];
            $scope.market.maitre_ouvrage_id = $scope.maitres[0].id;
        })
        .error(function(){
            alert('error loading maitres');
        });


    $scope.saveSociete = function(){
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
                alert('error')
            });
    }
	$scope.saveLabo = function(){
		collaborators.postLab($scope.labo)
            .success(function(res){
                $scope.laboratoires.push(res);
                $scope.selectedLabo = res;
                $scope.market.labo_id= res.id
                $('#labModal').modal("toggle");
                $scope.labo = {};
            })
            .error(function(){
                alert('error');
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
                alert('error')
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
                alert('error');
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
                alert('error')
            });
    }

    $scope.saveMarket = function(){
        marketsFactory.postMarket($scope.market)
            .success(function(){
                $scope.market = {};
                $location.path("/"+$rootScope.typeBudget);
            })
            .error(function(){
                alert('error post market')
            });
        console.log($scope.market);
    }

    $scope.cancelMarket = function () {
        if(confirm("Voulez vous vraiment annuler.")){
            window.history.back();
        }
    }
});