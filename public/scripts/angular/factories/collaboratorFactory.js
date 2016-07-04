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
        getAll:function() {
            return $http.get("/collaborators/all");
        },
        /**********************************************************************/
        postLab : function(obj){
            return $http.post("/labos",obj);
        },
        postArch : function(obj){
            return $http.post("/architectes",obj);
        },
        postBET : function(obj){
            return $http.post("/bets",obj);
        },
        postSociete : function(obj){
            return $http.post("/societes",obj);
        },
        postMaitre : function(obj){
           return $http.post("/maitreOuvrages",obj);
        },
        post:function(coll,obj){
            //coll can only be [bet,societe,maitreOuvrage,architecte,labo]
            return $http.post("/"+coll+"s",obj);
        },
        postCollabrator:function(obj){
            return $http.post('/collaborateur',obj);
        },
        putCollaborator:function(obj){
                return $http.put("/collaborators/update",obj);
        }

    };
});