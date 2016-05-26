/*Factory des collaborateurs*/
app.factory('collaborators',function($http){
    return {
        getLabs : function(){
            return $http.get("/labos");
        },
        getArchs : function(){
        	return $http.get("/archs");
        },
        getBETS : function(){
        	return $http.get("/bets");
        },
        getSocietes : function(){
        	return $http.get("/societes");
        },
        getMaitre : function(){
        	return $http.get("/maitres");
        },
        /******************/
        postLab : function(obj){
            return $http.post("/labos",obj);
        },
        postArch : function(obj){
            return $http.post("/archs",obj);
        },
        postBET : function(obj){
            return $http.post("/bets",obj);
        },
        postSociete : function(obj){
            return $http.post("/societes",obj);
        },
        postMaitre : function(obj){
           return $http.post("/maitres",obj);
        }
    };
});