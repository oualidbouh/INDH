app.factory('Markets',function($http){
	return {
		getAllBp : function (){
			return $http.get('bpMarkets');
		},
		getAllBg : function(){
			return $http.get('bgMarkets');
		},
		getAllIndh : function(){
			return $http.get('indhMarket');
		}
	}
})