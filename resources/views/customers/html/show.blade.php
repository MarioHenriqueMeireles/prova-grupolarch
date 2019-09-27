@extends('layouts.app')
@section('content')

@csrf
<!-- .is-invalid and .is-valid  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    Cliente: {{$customer->name}}

                    <a href="{{route('edit-customer', [$customer->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                </h4>
                <div class="card-body">
                    <ul class="list-group list-unstyled list-group-flush h5">
                        <li class="list-group-item">Telefone: {{$customer->phone}}</li>
                        <li class="list-group-item">Data de nascimento: {{$customer->born_in->format('d/m/Y')}}</li>
                        <li class="list-group-item">Código: {{$customer->code}}</li>
                        <li class="list-group-item">Status: {{$customer->status_id}}</li>
                        <li class="list-group-item">CEP: {{$customer->address->post_code}}</li>
                        <li class="list-group-item">Endereço: {{$customer->address->string}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection