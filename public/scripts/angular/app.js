
var app = angular.module("indh",["ngRoute"]);
app.config(function($routeProvider, $locationProvider) {
    $routeProvider

        .when("/",{
           	controller:"homeCtrl",
            templateUrl:"scripts/angular/templates/home.html"
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
        .otherwise({redirectTo : "/"});

        
});
