@extends('layouts.app')

@section('content')

  <style>
  body                            { padding-top:20px; }

  /* form styling */
  #form-container                { background:#2f2f2f; margin-bottom:20px;
      border-radius:5px; }
  #form-container .page-header   { background:#151515; margin:0; padding:30px;
      border-top-left-radius:5px; border-top-right-radius:5px; }

  /* numbered buttons */
  #status-buttons                 {  }
  #status-buttons a               { color:#FFF; display:inline-block; font-size:12px; margin-right:10px; text-align:center; text-transform:uppercase; }
  #status-buttons a:hover         { text-decoration:none; }

  /* we will style the span as the circled number */
  #status-buttons span            { background:#080808; display:block; height:30px; margin:0 auto 10px; padding-top:5px; width:30px;
      border-radius:50%; }

  /* active buttons turn light green-blue*/
  #status-buttons a.active span   { background:#00BC8C; }

  #signup-form            { position:relative; min-height:300px; overflow:hidden; padding:30px; }
#form-views             { width:auto; }

/* basic styling for entering and leaving */
/* left and right added to ensure full width */
#form-views.ng-enter,
#form-views.ng-leave      { position:absolute; left:30px; right:30px;
    transition:0.5s all ease; -moz-transition:0.5s all ease; -webkit-transition:0.5s all ease;
}

/* enter animation */
#form-views.ng-enter            {
    -webkit-animation:slideInRight 0.5s both ease;
    -moz-animation:slideInRight 0.5s both ease;
    animation:slideInRight 0.5s both ease;
}

/* leave animation */
#form-views.ng-leave            {
    -webkit-animation:slideOutLeft 0.5s both ease;
    -moz-animation:slideOutLeft 0.5s both ease;
    animation:slideOutLeft 0.5s both ease;
}

/* ANIMATIONS
============================================================================= */
/* slide out to the left */
@keyframes slideOutLeft {
    to      { transform: translateX(-200%); }
}
@-moz-keyframes slideOutLeft {
    to      { -moz-transform: translateX(-200%); }
}
@-webkit-keyframes slideOutLeft {
    to      { -webkit-transform: translateX(-200%); }
}

/* slide in from the right */
@keyframes slideInRight {
    from    { transform:translateX(200%); }
    to      { transform: translateX(0); }
}
@-moz-keyframes slideInRight {
    from    { -moz-transform:translateX(200%); }
    to      { -moz-transform: translateX(0); }
}
@-webkit-keyframes slideInRight {
    from    { -webkit-transform:translateX(200%); }
    to      { -webkit-transform: translateX(0); }
}

  </style>

  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js"></script>
  <script src="app.js"></script>

  <div ng-app="formApp">
    <div class="container">
      <div ui-view></div>
    </div>
  </div>

  <script>

  angular.module('formApp', ['ngAnimate', 'ui.router'])
    .config(function($stateProvider, $urlRouterProvider) {
      $stateProvider
        .state('form', {
            url: '/form',
            templateUrl: '/partials/form.html',
            controller: 'formController'
        })
        .state('form.profile', {
            url: '/profile',
            templateUrl: '/partials/form-profile.html'
        })
        .state('form.interests', {
            url: '/interests',
            templateUrl: '/partials/form-interests.html'
        })
        .state('form.payment', {
            url: '/payment',
            templateUrl: '/partials/form-payment.html'
        });
      $urlRouterProvider.otherwise('/form/profile');
    })

    .controller('formController', function($scope) {
        $scope.formData = {};

        $scope.processForm = function() {
            alert('awesome!');
        };
    });
  </script>

@stop
