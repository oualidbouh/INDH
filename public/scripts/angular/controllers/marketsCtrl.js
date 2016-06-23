app.controller("marketsCtrl",function ($scope,$rootScope,$location,marketsFactory) {

	$scope.markets = [];
	if($rootScope.year && $rootScope.budgetType){
			marketsFactory.getMarkets($rootScope.year,$rootScope.budgetType)
				.success(function (res){
					$scope.markets = res;
				}).error(function () {
					alert('error loading markets')
				});

				$scope.clickTR = function(i) {
					$rootScope.market = $scope.markets[i];
                    console.log($scope.markets[i]);
					$location.path("/market/"+i+"/detail");

				}
                $scope.deleteMarket = function(i){
                    if(confirm("Voulez vous vraiment supprimer ce marché")){
                        marketsFactory.deleteMarket($scope.markets[i].id)
                        .success(function(res){
                            $scope.markets.splice(i,1);
                            alert('marché supprimé')
                        })
                        .error(function(){
                            alert('erreur lors de la suppression du marché')
                        });
                    }
                }
	}else{
		$location.path("/");
	}
});
