@extends('layouts.app')

@section('content')
  <link rel="stylesheet" type="text/css" href="/css/matcher.css">

  <div ng-app="formApp">
    <div class="">
      <div ui-view></div>
    </div>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js"></script>
  {{-- <script src="app.js"></script> --}}
  <script>

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

      .controller('formController', function($scope) {
          $scope.formData = {
            eventType: {}
          };

          $scope.processForm = function() {
              alert('awesome!');
          };
      });
  </script>

@stop
