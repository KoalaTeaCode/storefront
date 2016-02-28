angular.module('formApp', ['ngAnimate', 'ui.router'])
  .config(function($stateProvider, $urlRouterProvider) {
    $stateProvider
      .state('form', {
          url: '/form',
          templateUrl: '/partials/form.html',
          controller: 'formController'
      })
      .state('form.location', {
          url: '/location',
          templateUrl: '/partials/form-location.html'
      })
      .state('form.event-length', {
          url: '/event-length',
          templateUrl: '/partials/form-event-length.html'
      })
      .state('form.event-type', {
          url: '/event-type',
          templateUrl: '/partials/form-event-type.html'
      })
      .state('form.space-type', {
          url: '/space-type',
          templateUrl: '/partials/form-space-type.html'
      })
      .state('form.features', {
          url: '/features',
          templateUrl: '/partials/form-features.html'
      })
      .state('form.budget', {
          url: '/budget',
          templateUrl: '/partials/form-budget.html'
      });
    $urlRouterProvider.otherwise('/form/location');
  })

  .controller('formController', ['$scope', 'Listings',
    function($scope, Listings) {

      $scope.loading = false;
      $scope.view = 'questionairre';

      $scope.formData = {
        eventType: {}
      };

      $scope.listings = [];
      $scope.savedListings = [];
      $scope.removedListings = [];
      $scope.index = 0;

      $scope.currentRecommendation = {
        title: "HAVEN LAKE HIGHLANDS",
      }

      $scope.processForm = function() {
        $scope.loading = true;
        Listings.get($scope.formData)
          .success(function(data) {
            $scope.view = 'listingSelect';
            $scope.listings = data;
            $scope.loading = false;
          });
      };

      $scope.removeListing = function() {
        $scope.removedListings.push($scope.listings[$scope.index]);
        delete $scope.listings[$scope.index];
        $scope.index += 1;
      }

      $scope.saveAnKeepLooking = function() {
        $scope.savedListings.push($scope.listings[$scope.index]);
        $scope.index += 1;
      }

      $scope.prev = function() {
        if ($scope.index == 0) return;
        $scope.index -= 1;
      }

      $scope.next = function() {
        if ($scope.index == $scope.listings.length - 1) return;
        $scope.index += 1;
      }
  }])
  .factory('Listings', function($http) {

    var factory = {};

    factory.get = function(data) {
      return $http({
        method: 'GET',
        url: '/api/listings?' + $.param(data),
      });
    }
    return factory;
  });
