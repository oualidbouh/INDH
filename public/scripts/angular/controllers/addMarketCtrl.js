
/*Controller function*/
app.controller("addMarketCtrl",function($scope,$rootScope,collaborators,$routeParams){

	
	$scope.laboratoires=[];
	$scope.architectes=[];
	$scope.bets= [];
	$scope.societes = [];
	$scope.maitres = [];

	collaborators.getLabs()
        .success(function(res){
            $scope.laboratoires = res;
        })
        .error(function(){
            alert('error loading Laboratoires');
        });

	collaborators.getArchs()
        .success(function(res){
            $scope.architectes = res;
        })
        .error(function(){
            alert('error loading Archs');
        });
	
	collaborators.getBETS()
        .success(function(res){
            $scope.bets = res;
        })
        .error(function(){
            alert('error loading bets');
        });

	collaborators.getSocietes()
        .success(function(res){
            $scope.societes = res;
        })
        .error(function(){
            alert('error loading societes');
        });

	collaborators.getMaitre()
        .success(function(res){
            $scope.maitres = res;
        })
        .error(function(){
            alert('error loading maitres');
        });

	$scope.labo = {};
	$scope.soc = {};
	$scope.maitre = {};
	$scope.archi = {};
	$scope.bet = {};
    
    $scope.saveSociete = function(){
        collaborators.postSociete($scope.soc)
            .success(function(res){
               $scope.societes.push(res);
            })
            .error(function(){
                alert('error')
            });
    }
	$scope.saveLabo = function(){
		collaborators.postLab($scope.labo)
            .success(function(res){
                console.log("data"+res.nom);
                $scope.laboratoires.push(res);
                $('#labModal').modal("toggle");
            })
            .error(function(){
                alert('error');
            });
	}
    
    $scope.saveArchitect = function(){
        collaborators.postArch($scope.archi)
            .success(function(res){
                $scope.architectes.push(res);
                $('#archModal').modal("toggle");
            })
            .error(function(){
                alert('error')
            });
    }
	
    $scope.saveBet = function(){
		collaborators.postBet($scope.bet)
            .success(function(res){
                $scope.bets.push(res);
                $('#betModal').modal("toggle");
            })
            .error(function(){
                alert('error');
            });
	}
    
    $scope.saveMaitre = function(){
        collaborators.postMaitre($scope.maitre)
            .success(function(res){
                $scope.maitres.push(res);
                $('#maitreModal').modal("toggle");
            })
            .error(function(){
                alert('error')
            });
    }

	
});