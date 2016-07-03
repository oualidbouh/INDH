app.factory("imageFactory",function ($http) {
	return {
		getImages:function (market) {
			return $http.get("/market/images/"+market.id);
		},
		deleteImage:function (iid) {
			return $http.delete("/market/images/"+iid);
		}
	};
});