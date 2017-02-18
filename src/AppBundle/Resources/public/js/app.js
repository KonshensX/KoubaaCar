var angular = angular.module('myApp', []);

//From stackoverflow

angular.config(function($interpolateProvider){
    //$interpolateProvider.startSymbol('[[').endSymbol(']]');
});

//Controllers section
angular.controller ('myCtrl', function ($scope) {

   $scope.name = "Baza";

});