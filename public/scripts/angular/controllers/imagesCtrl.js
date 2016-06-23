app.controller("imagesCtrl",function($rootScope,$scope){
    $scope.images = [];
    $scope.selectedImageIndex = 0;
    $scope.p = $scope.n = 0;
    for(i = 0;i<13;i++){
        $scope.images.push({order:i,src:"../../../styles/indh.jpg"});
    }

    $scope.selectImage = function (index) {
    	$scope.selectedImageIndex = index;
    	$scope.p = $scope.n = 0;
    	console.log(index)
    }
    $scope.next = function () {
    	$scope.selectedImageIndex++;
    	$scope.p = 0;
    	if($scope.selectedImageIndex == $scope.images.length-1){
    		$scope.n = 1;
    	}
    	console.log($scope.selectedImageIndex)
    }

    $scope.prev = function () {
    	$scope.selectedImageIndex--;
    	$scope.n = 0;
    	if($scope.selectedImageIndex == 0){
    		$scope.p = 1;
    	}
    	console.log($scope.selectedImageIndex)
    }
});