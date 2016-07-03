app.controller("imagesCtrl",function($rootScope,$scope,$filter,$location,imageFactory,authService){
     if(!$rootScope.market ){
        $location.path("/");
     }
    $scope.images = [];
    $scope.selectedImageIndex = 0;
    $scope.p = $scope.n = 0;
    $scope.files = [];
    $scope.noImages = 0;
    imageFactory.getImages($rootScope.market)
        .success(function (res) {
            if(res.length == 0){
                $scope.noImages = 1;
            }
            for(v in res){
                $scope.images.push({src : res[v].src,date:$filter('date')(new Date(parseInt(res[v].date)),"dd/MM/yyyy hh:mm:ss a"),d:res[v].date,ext:res[v].ext});
            }   
            
        })
        .error(function () {
            alert('error')
        });

    $scope.selectImage = function (index) {
        $scope.flow_selected = 0;
    	$scope.selectedImageIndex = index;

    }
    $scope.selectFlowImage = function (index) {
        $scope.flow_selected = 1;
        $scope.selectedFlowImageIndex = index;
    }

    $scope.getTime = function () {
        return new Date().getTime();
    }

    $scope.deleteImage = function () {

        if($scope.flow_selected){
            //delete $scope.files[$scope.selectedFlowImageIndex].name
            //$scope.files[$scope.selectedFlowImageIndex].cancel();

            iid = $scope.files[$scope.selectedFlowImageIndex].name;
                    imageFactory.deleteImage(iid)
                        .success(function(res){
                            $('#mod').modal('toggle');
                            $('#confirmModal').modal("toggle");
                            $scope.files[$scope.selectedFlowImageIndex].cancel();
                        })
                        .error(function(){alert('error lors de la suppresion de l\'image , veuillez ressayer')});
            
        }else{

            //delete $rootScope.market.id+"_"+$scope.images[$scope.selectedImageIndex].date+"_"+$scope.images[$scope.selectedImageIndex].ext
                iid = $rootScope.market.id+"_"+$scope.images[$scope.selectedImageIndex].d;
                imageFactory.deleteImage(iid)
                    .success(function () {
                        $('#mod').modal('toggle');
                        $('#confirmModal').modal("toggle");
                        $scope.images.splice($scope.selectedImageIndex,1);
                    })
                    .error(function(){alert('error lors de la suppresion de l\'image , veuillez ressayer')});


        }

        if($scope.files.length == 0 && $scope.images.length == 0){
                        $scope.noImages = 1;
                        alert('fnekfn')
                    }
    }
/*
    $scope.next = function () {
    	$scope.selectedImageIndex++;
    	$scope.p = 0;
    	
        if($scope.files.length == 0){
            if($scope.selectedImageIndex == $scope.images.length-1){
                $scope.n = 0;
            }
        }else{
            if($scope.flow_selected){
                if($scope.selectedFlowImageIndex == $scope.files.length-1){
                    $scope.n = 0;
                }
            }else{

            }
        }
    }

    $scope.prev = function () {
    	$scope.selectedImageIndex--;
    	$scope.n = 0;
    	if($scope.selectedImageIndex == 0){
    		$scope.p = 1;
    	}
    }
*/
    $scope.adjustNames = function (o) {

        for(i = 0;i<o.length;i++){
            ext = o[i].name.split('.')[1];
            o[i].name = $rootScope.market.id+"_"+(parseInt(new Date().getTime())+i)+"."+ext
        }
    }
			$scope.logout = function() {
				if($rootScope.user){
					authService.logout();
				}
			}
    $scope.$on('flow::complete', function (event, $flow, flowFile) {
        $('#uploadModal').modal("toggle");
        $scope.files = $flow.files;
        $scope.noImages = 0;
    });
});