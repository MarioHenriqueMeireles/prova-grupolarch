@extends('layouts.app')
@section('content')
<form action="{{route('update-customer', [$customer->id])}}" method="POST">
    @csrf
    @method('PUT')
    <!-- .is-invalid and .is-valid  -->
    <div class="container">
        <div class="row justify-content-center">


            @if($errors->any())
            <div class="col-sm-12 col-md-3">
                @foreach ($errors->all() as $input_error)

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$input_error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endforeach
            </div>
            @endif
            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <h4 class="card-header">
                        Novo Cliente
                        <span style="float: right">
                            <a href="{{route('show-customer', [$customer->id])}}" class="btn btn-sm btn-info">Abrir</a>
                            <a href="{{route('delete-customer', [$customer->id])}}" class="btn btn-sm btn-danger" >excluir</a>
                        </span>
                    </h4>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input name="customer[name]" value="{{old('customer.name') ?? $customer->name}}" id="name" class="form-control @error('customer.name') is-invalid @enderror" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone
                                <input name="customer[phone]" value="{{old('customer.phone') ?? $customer->phone }} "id="phone" class="form-control @error('customer.phone') is-invalid @enderror" />
                            </label>
                            <label for="code">Código
                                <input name="customer[code]" value="{{old('customer.code') ?? $customer->code}} "id="code" class="form-control @error('customer.code') is-invalid @enderror" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="status">Status
                                <select name="customer[status_id]" class="form-control @error('customer.status_id') is-invalid @enderror" >
                                    <option value="0">Informe o status cliente</option>
                                    @foreach($status as $sts)
                                    <option value="{{$sts->id}}" @if(old('customer.status_id') === $sts->id || $customer->status_id == $sts->id ) selected @endif>{{$sts->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="born_in" class="px-4">Data de nascimento
                                <input name="customer[born_in]" value="{{old('customer.born_in') ?? $customer->born_in->format('d/m/Y') }}" id='born_in' class="datepicker form-control @error('customer.born_in') is-invalid @enderror" />
                            </label>
                        </div>

                    </div>
                    <div class="card-body">
                        <h4>Endereço</h4>
                        <div class="form-group">
                            <label for="public_place">Logradouro</label>
                            <input name="address[public_place]" value="{{old('address.public_place') ?? $address->public_place}}" id="public_place" class="form-control @error('address.public_place') is-invalid @enderror" />
                        </div>
                        <div class="form-group mb-1 mr-sm-1">
                            <label for="number" >Número
                                <input name="address[number]" value="{{old('address.number') ?? $address->number}}" id="number"  class="form-control @error('address.number') is-invalid @enderror"  />
                            </label>
                            <label for="complement" class="px-1">Complemento
                                <input name="address[complement]"  value="{{old('address.complement') ?? $address->complement}}" id="complement" class="form-control @error('address.complement') is-invalid @enderror" />
                            </label>
                            <label for="neighborhood" class="px-1">Bairro
                                <input name="address[neighborhood]" value="{{old('address.neighborhood') ?? $address->neighborhood}}" id="neighborhood" class="form-control @error('address.neighborhood') is-invalid @enderror" />
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="city" >Cidade
                                <input name="address[city]" id="city" value="{{old('address.city') ?? $address->city}}" class="form-control @error('address.city') is-invalid @enderror" />
                            </label>
                            <label for="state" class="px-1">Estado
                                <select name="address[state]" id='state' class="form-control @error('address.state') is-invalid @enderror" >
                                    <option value="0">Selecione um estado</option>
                                    @foreach($estados as $state)
                                    <option value="{{ $state->abbr }}"  @if(old('address.state')  == $state->abbr  || $address->state == $state->abbr) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label for="cep" class="px-1">CEP
                                <input name="address[post_code]" value="{{old('address.post_code') ??  $address->post_code}}" id="cep" class="form-control @error('address.post_code') is-invalid @enderror" />
                            </label>
                        </div>
                        <div class="form-group py-3">
                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
@endsection