'use strict';

/* Controllers */

var usersApp = angular.module('usersApp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});


usersApp.filter('offset', function() {
    return function(input, start) {
        start = parseInt(start, 10);
        return input.slice(start);
    };
});

usersApp.controller('UsersListCtrl', ['$scope', function($scope) {

    $scope.users = {};

    $scope.order = function(predicate, reverse) {
        $scope.users = orderBy($scope.users, predicate, reverse);
    };
}]);

