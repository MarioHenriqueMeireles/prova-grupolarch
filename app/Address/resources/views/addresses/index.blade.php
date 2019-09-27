<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>CEP</th>
                <th>Tipo de Logradouro</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>                
                <th>Estado</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addresses as $address)
            <tr>
                <td>{{$address->post_code}}</td>
                <td>{{$address->public_place_type}}</td>
                <td>{{$address->public_place}}</td>
                <td>{{$address->number}}</td>
                <td>{{$address->complement}}</td>
                <td>{{$address->neighborhood}}</td>                
                <td>{{$address->city}}</td> 
                <td>{{$address->state}}</td>
                <td>{{$address->country}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
