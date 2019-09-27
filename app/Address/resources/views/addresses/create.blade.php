<div class="row-fluid" ng-controller="AddressCreateController">
    <div class="col-lg-10 col-offset-1">
        {!!Form::model(['name'=>'addressForm','url' => 'address/create', 'method' => 'post'])!!}

        <div class="form-group" ng-class="{'has-error': !addressForm.postal_code.$valid && addressForm.postal_code.$touched}">
            <span style="width: 200px;display: inline-block;"> 
                {!!Form::label('postal_code','CEP:')!!}
                {!!Form::text('postal_code','',['class'=>'form-control','ng-model'=>"address.postal_code", 'required'=>"required"])!!}
            </span>
            <span style="width: 200px;display: inline-block;"> 
                {!!Form::button('Busca',['class'=>'btn btn-info','ng-click'=>'getFromCEP()'])!!}
            </span>
            <div ng-messages="addressForm.postal_code.$error" class="help-block" ng-show="addressForm.postal_code.$touched">
                <div ng-message="required">Campo Obrigatório!</div>
            </div>
        </div>
        <div class="form-group" ng-class="{'has-error': !addressForm.public_place.$valid && addressForm.public_place.$touched}">
            {!!Form::label('public_place','Logradouro:')!!}
            {!!Form::text('public_place',null,['class'=>'form-control','ng-model'=>"address.public_place", 'required'=>"required"])!!}
            <div ng-messages="addressForm.public_place.$error" class="help-block" ng-show="addressForm.public_place.$touched">
                <div ng-message="required">Campo Obrigatório!</div>
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('neighborhood','Bairro:')!!}
            {!!Form::text('neighborhood',null,['class'=>'form-control','ng-model'=>"address.neighborhood"])!!}
        </div>
        <div class="form-group">
            {!!Form::label('city','Cidade:')!!}
            {!!Form::text('city',null,['class'=>'form-control','ng-model'=>"address.city"])!!}
        </div>
        <div class="form-group">
            {!!Form::label('state','Estado:')!!}
            {!!Form::text('state',null,['class'=>'form-control','ng-model'=>"address.state"])!!}
        </div>
        <div class="form-group">
            {!!Form::label('country','País:')!!}
            {!!Form::text('country',null,['class'=>'form-control','ng-model'=>"address.country"])!!}
        </div>

        {!!Form::close()!!}
    </div>
</div>
@section('scripts')
<script src="{{ asset('build/js/vendor/jquery.min.js')}}"></script>
<script src="{{ asset('build/js/vendor/angular.min.js')}}" type="text/javascript"></script>  
<script src="{{ asset('build/js/vendor/angular-resource.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('build/js/vendor/angular-route.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('build/js/vendor/angular-messages.min.js')}}" type="text/javascript"></script> 
<script src="{{ asset('build/js/vendor/angular-input-masks-standalone.min.js')}}" type="text/javascript"></script> 
<!-- App -->
<script src="{{asset('build/js/address.js')}}"></script> 
<!-- Services -->
<script src="{{asset('build/js/services/address.js')}}"></script> 

<!-- Controllers -->
<script src="{{asset('build/js/controllers/address/create.js')}}"></script> 

@endsection