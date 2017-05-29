var myapp = angular.module("historial", []);
myapp.controller("principal", function($scope, $http){
	var paramstr = window.location.search.substr(1);
    var paramarr = paramstr.split ("&");
    var params = {};
    for ( var i = 0; i < paramarr.length; i++) {
        var tmparr = paramarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    var matricula = tmparr[1];
	$http.get("../php/get_alumno.php?matricula="+matricula).then(function(response){$scope.alumno = response.data.records[0];});
	$http.get("../php/get_calificaciones.php?matricula="+matricula).then(function(response){$scope.calificaciones = response.data.records;});
});