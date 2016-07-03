app.controller('addMaitreOuvrageCtrl',function($scope,$http){
	/* l'evenements du click sur le boutton ajouté dans le modal Ajouter Maitre d'ouvage*/
	$scope.maitre = {};
	$scope.addMaitreOuvrage=function(){
		
		$http.post('/addMaitreOuvrage',$scope.maitre)
		.success(function(res){
			$scope.maitre={};
			$('#maitreModal').modal('toggle');
		});
	}
	/*Fin de la fonciton d'ajout d'un maitre d'ouvrage*/

});
