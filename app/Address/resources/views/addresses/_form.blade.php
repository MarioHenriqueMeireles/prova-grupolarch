
<div class="panel panel-default" ng-controller="AddressCreateController">
    <div class="panel-heading"  role="tab" id="headingAddressData" 
         data-toggle="collapse" data-parent="#accordion" 
         href="#collapseAddressData" aria-expanded="false" aria-controls="collapseAddressData">
        <h4 class="panel-title"><b> Endereço</b></h4>
    </div>
    <div id="collapseAddressData" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAddressData">

        <div class="panel-body">
            <div class="form-group">
                <span style="width: 200px;display: inline-block;"> 
                    {!!Form::label('post_code','CEP:')!!}
                    {!!Form::text('post_code','',['class'=>'form-control', 'required'=>"required"])!!}
                </span>
                <span style="width: 200px;display: inline-block;"> 
                    {!!Form::button('Busca',['class'=>'btn btn-info',])!!}
                </span>

            </div>
            <div class="form-group" >
                <div class="row">
                    <div class="col-lg-4">
                        {!!Form::label('public_place','Logradouro:')!!}
                        {!!Form::text('public_place',null,['class'=>'form-control', 'required'=>"required"])!!}

                    </div>
                    <div class="col-lg-2">
                        {!!Form::label('number','Número:')!!}
                        {!!Form::text('number',null,['class'=>'form-control', 'required'=>"required"])!!}
                    </div>
                    <div class="col-lg-2">
                        {!!Form::label('complement','Complemento:')!!}
                        {!!Form::text('complement',null,['class'=>'form-control'])!!}
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            {!!Form::label('neighborhood','Bairro:')!!}
                            {!!Form::text('neighborhood',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
               </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!!Form::label('city','Cidade:')!!}
                        {!!Form::text('city',null,['class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        {!!Form::label('state','Estado:')!!}
                        {!!Form::select('state', $states,null,['class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <!--div class="form-group">
                {!!Form::label('country','País:')!!}
                {!!Form::text('country',null,['class'=>'form-control','ng-model'=>"address.country"])!!}
            </div-->
        </div>
    </div>
</div>