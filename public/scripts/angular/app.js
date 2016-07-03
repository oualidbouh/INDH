
var app = angular.module("indh",["ngRoute","flow"]);
app.config(function($routeProvider, $locationProvider) {
    $routeProvider

        .when("/home",{
           	controller:"homeCtrl",
            templateUrl:"scripts/angular/templates/home.html"
        })
        .when("/login",{
            controller:"loginCtrl",
            templateUrl:"scripts/angular/templates/login.html"
        })
        .when("/markets",{
        	controller:"marketsCtrl",
        	templateUrl:"scripts/angular/templates/markets.html"
        })
        .when("/addMarket",{
            controller:"addMarketCtrl",
            templateUrl:"scripts/angular/templates/addMarket.html"
        })
        .when("/market/:id/detail",{
            controller:"marketDetailsCtrl",
            templateUrl:"scripts/angular/templates/marketDetails.html"
        })
        .when("/images",{
            controller:"imagesCtrl",
            templateUrl:"scripts/angular/templates/marketImages.html"
        })
        .when("/config",{
            controller:"configCtrl",
            templateUrl:"scripts/angular/templates/config.html"
        })
        .otherwise({redirectTo : "/login"});

        
});
