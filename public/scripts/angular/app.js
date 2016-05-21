var app = angular.module("indh",["ngRoute"]);
app.config(function($routeProvider, $locationProvider) {
    $routeProvider

        .when("/",{
           	controller:"homeCtrl",
            templateUrl:"scripts/angular/templates/home.html"
        })
        .when("/bp",{
        	controller:"bpCtrl",
        	templateUrl:"scripts/angular/templates/markets.html"
        })
        .when("/bg",{
        	controller:"bgCtrl",
        	templateUrl:"scripts/angular/templates/addMarket.html"
        })
        .when("/indh",{
        	controller:"indhCtrl",
        	templateUrl:"scripts/angular/templates/markets.html"
        })
        .when("/:year/addMarket",{
            controller:"addMarketCtrl",
            templateUrl:"scripts/angular/templates/addMarket.html"
        })
        .otherwise({redirectTo : "/"});

        
});
/*Factory des laboratoires*/
/*
app.factory('allLabs',funciton($http){
    return {
        get : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            }).error(function(){
                alert('erreur lors de la récupération des laboratoires');
            });
        }
    };
});

app.factory('allArchis',funciton($http){
    return {
        get : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            }).error(function(){
                alert('erreur lors de la récupération des Architectes');
            });
        }
    };
});


app.factory('allBets',funciton($http){
    return {
        get : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            }).error(function(){
                alert('erreur lors de la récupération des Bureaux d étude');
            });
        }
    };
});


app.factory('allSocs',funciton($http){
    return {
        get : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            }).error(function(){
                alert('erreur lors de la récupération des Sociétés');
            });
        }
    };
});




app.factory('allMaitres',funciton($http){
    return {
        get : function(url,callback){
            $http.get(url).success(function(res){
                callback(res);
            }).error(function(){
                alert('erreur lors de la récupération des maitres d ouvrages');
            });
        }
    };
});


*/