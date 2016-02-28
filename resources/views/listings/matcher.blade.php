@extends('layouts.app')

@section('content')
  <link rel="stylesheet" type="text/css" href="/css/matcher.css">

  <div ng-app="formApp">
    <div ui-view></div>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js"></script>
  <script src="/js/app.js"></script>
@stop
