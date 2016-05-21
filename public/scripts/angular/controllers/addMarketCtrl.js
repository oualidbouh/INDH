/*Factory des collaborateurs*/
app.factory('collaborators',function($http){
    return {
        getLabs : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            });
        },
        getArchs : function(url,callback){
        	$http.get(url).success(function(res){
        		callback(res);
        	});
        },
        getBET : function(url,callback){
        	$http.get(url).success(function(res){
        		callback(res);
        	})
        },
        getSocietes : function(url,callback){
        	$http.get(url).success(function(res){
        		callback(res);
        	});
        },
        getMaitre : function(url,callback){
        	$http.get(url).success(function(res){
        		callback(res);
        	})
        }
    };
});
/*Controller function*/
app.controller("addMarketCtrl",function($scope,$rootScope,collaborators,$routeParams){

	
	$scope.laboratoires=[];
	$scope.architectes=[];
	$scope.bets= [];
	$scope.societes = [];
	$scope.maitres = [];

	/*get collaborators*/

	collaborators.getLabs('labos',function(data){
		$scope.laboratoires = data;
	});

	collaborators.getArchs('archs',function(data){
		$scope.architectes=data;
	});

	collaborators.getBET('bets',function(data){
		$scope.bets = data;
	});

	collaborators.getSocietes('societes',function(data){
		$scope.societes = data;
	});

	collaborators.getMaitre('maitres',function(data){
		$scope.maitres = data;
	});

	/* end */

	/* submit event*/







	/*end*/
	$rootScope.title = "Ajouter nouveau marché";
});

