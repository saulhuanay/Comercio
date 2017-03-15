angular.module('CrudApp', []).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: './views/listado.php', controller: ListCtrl}).
      otherwise({redirectTo: '/'});
}]);

function ListCtrl($scope, $http) {
  $http.get('public/users').success(function(data) {
    $scope.users = data;
    empleados.push(data);
  });
}
