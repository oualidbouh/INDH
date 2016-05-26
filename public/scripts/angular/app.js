
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
        	templateUrl:"scripts/angular/templates/markets.html"
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
