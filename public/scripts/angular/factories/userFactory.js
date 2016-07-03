app.factory('userFactory',function($http){
	return {
		getUsers : function () {
			return $http.get("/users");
		},
		postUser : function(newUser){
			return $http.post("/users",newUser);
		},
		updateUser : function(obj) {
			return $http.put("/users",obj);
		},
        deleteUser : function(id){
            return $http.delete("/user/"+id);
        }
       }
	
});