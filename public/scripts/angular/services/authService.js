app.service("authService",function($http,$rootScope,$location){
	return {
		login : function(user){
			return $http.post("/login",user);
		},
		logout : function(){
			if(delete $rootScope.user){
				$location.path("/login");
			}
		}
	}
});