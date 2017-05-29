var myapp = angular.module("anuncios_profe",[]);

myapp.controller("principal", function($http,$scope){
	var paramstr = window.location.search.substr(1);
    var paramarr = paramstr.split ("&");
    var params = {};
    for ( var i = 0; i < paramarr.length; i++) {
        var tmparr = paramarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    var curso = tmparr[1]; 
    $scope.anuncio = {
    	id_curso : curso
    };
    $http.get("../php/get_anuncios.php?id_curso="+curso).then(function(response){
    	$scope.anuncios = response.data.records;
    });

    $scope.subir = function(){
    	$http.post("../php/insert_anuncio.php", $scope.anuncio).success(function(data){
    		if(data==true){
    			alert("exito al actualizar datos");
    			$http.get("../php/get_anuncios.php?id_curso="+curso).then(function(response){
    				$scope.anuncios = response.data.records;
   				 });
    		}
    		else{
    			alert("error al tratar de actualizar el profesor");
    		}
    		console.log(data);
    	}).error(function(data){
    		alert("error al tratar de actualizar el profesor");
    		console.log(data);
    	});
    }
});