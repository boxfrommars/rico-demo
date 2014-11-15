var humanApp = angular.module('humanApp', ['ngRoute', 'ngResource', 'humanServices']);

var humanServices = angular.module('humanServices', ['ngResource']);

humanServices.factory('Human', ['$resource', function($resource){
    return $resource('api/humans/:id', { id: '@id' }, {
        query: {method: 'GET', isArray: true},
        update: {method: 'PUT'}
    });
}]);

humanApp.service('MessageHandler', function(){
    return {message: {}}
});

humanApp
    .controller('HumanIndexController', function ($scope, $http, Human, MessageHandler) {
        $scope.humans = Human.query();

        $scope.remove = function (human) {
            human.$delete(function(){
                $scope.humans.splice($scope.humans.indexOf($scope.human), 1);
                MessageHandler.message = {text: 'Удалено', type: 'success'};
            }, function () {
                MessageHandler.message = {text: 'Проверьте правильность заполнения полей формы', type: 'danger'};
            });
        }
    })
    .controller('HumanViewController', function ($scope, $http, $routeParams, $location, Human, MessageHandler) {
        $scope.human = Human.get({id: $routeParams.id});
        $scope.errors = {};

        $scope.save = function() {
            $scope.human.$update(function () {
                //$location.url('/humans');
                $scope.errors = {};
                MessageHandler.message = {text: 'Сохранено', type: 'success'};
            }, function (response) {
                $scope.errors = response.data.errors;
                MessageHandler.message = {text: 'Проверьте правильность заполнения полей формы', type: 'danger'};
            });
        }
    })
    .controller('HumanCreateController', function ($scope, $http, $routeParams, $location, Human, MessageHandler) {
        $scope.human = new Human();
        $scope.errors = {};

        $scope.save = function() {
            $scope.human.$save(function () {
                //$location.url('/humans');
                $scope.errors = {};
                MessageHandler.message = {text: 'Сохранено', type: 'success'};
            }, function (response) {
                $scope.errors = response.data.errors;
                MessageHandler.message = {text: 'Проверьте правильность заполнения полей формы', type: 'danger'};
            });
        }
    })
    .controller('ErrorHandlerController', function ($scope, MessageHandler) {
        $scope.messanger = MessageHandler;

        $scope.$on('$locationChangeEnd', function() {
            MessageHandler.message = {};
        });
    });


humanApp.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.
        when('/humans', {
            controller: 'HumanIndexController',
            templateUrl: 'assets/example-app/templates/human.index.html'
        }).
        when('/humans/create', {
            controller: 'HumanCreateController',
            templateUrl: 'assets/example-app/templates/human.view.html'
        }).
        when('/humans/:id', {
            controller: 'HumanViewController',
            templateUrl: 'assets/example-app/templates/human.view.html'
        }).
        otherwise({
            redirectTo: '/humans'
        });
}
]).run();
