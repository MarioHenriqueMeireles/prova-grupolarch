@extends('layouts.app')
@section('content')

@csrf
<!-- .is-invalid and .is-valid  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    deseja realmente excluir o cliente {{$customer->name}}?
                    <span style="float:right">
                        
                    <a href="{{route('edit-customer', [$customer->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                    </span>
                </h4>
                <div class="card-body">
                    <ul class="list-group list-unstyled list-group-flush h5">
                        <li class="list-group-item">Telefone: {{$customer->phone}}</li>
                        <li class="list-group-item">Data de nascimento: {{$customer->born_in->format('d/m/Y')}}</li>
                        <li class="list-group-item">Código: {{$customer->code}}</li>
                        <li class="list-group-item">Status: {{$status->name}}</li>
                        <li class="list-group-item">CEP: {{$customer->address->post_code}}</li>
                        <li class="list-group-item">Endereço: {{$customer->address->string}}</li>
                        <li class="list-group-item">
                            <form action="{{route('delete-customer', [$customer->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-group text-center">
                                    <input name="customer[id]" value="{{$customer->id}}" type="hidden"/>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                    <a href="{{route('show-customer', [$customer->id])}}" class="btn btn-primary">Voltar</a>
                                </div>
                            </form>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection