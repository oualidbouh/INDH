app.factory('marketsFactory',function($http){
	return {
		getMarkets:function (year,type) {
			return $http.get("/markets/"+year+"/"+type);
		},
		postMarket:function(market){
			return $http.post("/marche",market);
		},
		updateMarket:function(market) {
			return $http.put("/market/"+market.id,market);
		},
        deleteDecompte:function(id){
            return $http.delete("/decompte/delete/"+id);
        },
        deleteAvenant:function(id){
            return $http.delete("/avenant/delete/"+id);
        },
        deleteMarket:function(id){
            return $http.delete("market/delete/"+id);
        }
	}
})