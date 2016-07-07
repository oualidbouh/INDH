app.controller("marketsCtrl",function ($scope,$rootScope,$location,marketsFactory,authService) {

	$scope.markets = [];
	$scope.error = {};
	$scope.confirm = {};
	if($rootScope.year && $rootScope.budgetType){

			$rootScope.position = "Liste des Marchés du type : "+$rootScope.budgetType+" de l'an "+$rootScope.year;

			marketsFactory.getMarkets($rootScope.year,$rootScope.budgetType)
				.success(function (res){
					$scope.markets = res;
					
				}).error(function () {
					alert('error loading markets')
				});

				$scope.clickTR = function(i) {
					$rootScope.market = $scope.markets[i];
                    
					$location.path("/market/"+i+"/detail");

				}
					$scope.logout = function() {
						if($rootScope.user){
							authService.logout();
						}
					}
                $scope.deleteMarket = function(i){
                    if(confirm("Voulez vous vraiment supprimer ce marché")){
                        marketsFactory.deleteMarket($scope.markets[i].id)
                        .success(function(res){
                            $scope.markets.splice(i,1);
                        })
                        .error(function(){
                            $scope.error.message = 'erreur lors de la suppression du marché';
							$('#errorModal').modal('toggle');
                        });
                    }
                }
	}else{
		$location.path("/");
	}
});
