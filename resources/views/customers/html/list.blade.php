@extends('layouts.app')
@section('content')

@csrf
<!-- .is-invalid and .is-valid  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 py-4">
            <a href="{{route('customer-create')}}" class="btn btn-primary">Novo Usuário</a>
        </div>
        <div class="col-sm-12">
           
            <table class="table">
                <thead>
                    <tr class="h5">
                        <th>Código</th>
                        <th>Nome <a href="{{route('list-customer',[ "order"=>$order, "page"=>$page])}}"><i class="btn btn-sm far {{ $order === 'desc' ? 'fa-arrow-alt-circle-down' : 'fa-arrow-alt-circle-up'}}"></i></th>
                        <th>Status</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th style="width: 188px; text-align: right;"><a class="btn btn-info" href="{{route('export-customers-list',['page'=>$page, 'order'=>$order === 'asc' ? 'desc' : $order])}}">Export Xls</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->code}}</td>
                        <td>{{$customer->name}}</td>

                        <td>{{$customer->status->name }}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address->string}}</td>
                        <td >
                            <a href="{{route('show-customer', [$customer->id])}}" class="btn btn-sm btn-info">Abrir</a>
                            <a href="{{route('edit-customer', [$customer->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                            <a href="{{route('delete-customer', [$customer->id])}}" class="btn btn-sm btn-danger" >excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{$customers->render()}}
            </div>
        </div>
    </div>
</div>

@endsection