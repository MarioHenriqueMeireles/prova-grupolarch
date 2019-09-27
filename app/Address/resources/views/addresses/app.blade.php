@extends("layouts.app-angular")
@section('content')
<ng-view></ng-view>
@endsection
@section('scripts')
<script src="{{ asset('build/js/vendor/jquery.min.js')}}"></script>
<script src="{{ asset('build/js/vendor/bootstrap.min.js')}}"></script> 
<script src="{{ asset('build/js/vendor/angular.min.js')}}" type="text/javascript"></script>  
<script src="{{ asset('build/js/vendor/angular-messages.min.js')}}" type="text/javascript"></script> 
<script src="{{ asset('build/js/vendor/angular-route.min.js')}}" type="text/javascript"></script> 
<script src="{{ asset('build/js/vendor/angular-resource.min.js')}}" type="text/javascript"></script> 
<script src="{{ asset('build/js/vendor/angular-locale_pt-br.js')}}" type="text/javascript"></script> 
<script src="{{ asset('build/js/vendor/angular-input-masks-standalone.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('build/js/vendor/ui-bootstrap.min.js')}}"></script> 
<script src="{{asset('build/js/vendor/ui-bootstrap-tpls.min.js')}}"></script>
<script src="{{asset('build/js/vendor/dirPagination.js')}}"></script> 
<script src="{{asset('build/js/autoNumeric-min.js')}}"></script> 
<!--App-->
<script src="{{asset('build/js/address.js')}}"></script> 
<!-- Services-->
<script src="{{asset('build/js/services/address.js')}}"></script> 

<!-- Controllers -->
<script src="{{asset('build/js/controllers/address/create.js')}}"></script> 
<script src="{{asset('build/js/controllers/address/list.js')}}"></script> 


@endsection