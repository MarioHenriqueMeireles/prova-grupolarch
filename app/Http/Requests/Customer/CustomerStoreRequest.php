<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Estados;
use App\Models\CustomerStatus as Status;

class CustomerStoreRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $status = Status::all()->implode('id', ',');
        $estados = Estados::all()->implode('id', ',');

        return [
            'customer.name' => 'required|min:5|max:255',
            'customer.code' => 'required|min:1|max:15',
            'customer.status_id' => "in:{$status}",
            'customer.born_in' => "required|date_format:d/m/Y",
            'address.public_place' => 'required|min:1|max:255',
            'address.number' => 'required|min:1|max:15',
            'address.post_code' => 'required|size:9|regex:/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/',
            'address.neighborhood' => 'required|min:1|max:255',
            'address.city' => 'required|min:1|max:255',
            'address.state_id' => "in:{$estados}",
        ];
    }

    public function messages() {
        return [
            'customer.name.required' => 'O campo "Nome" deve ser prenchido!',
            'customer.name.min' => 'O campo "Nome" deve ter entre 5 e 255 caracteres!',
            'customer.name.max' => 'O campo "Nome" deve ter entre 5 e 255 caracteres!',
            'customer.code.required' => 'O campo "Código" deve ser prenchido!',
            'customer.code.min' => 'O campo "Código" deve ter entre 1 e 15 caracteres!',
            'customer.code.max' => 'O campo "Código" deve ter entre 1 e 15 caracteres!',
            'customer.status_id.in' => "Status inválido!",
            'customer.born_in.required' => 'O campo "Data de nascimento" deve ser prenchido!',
            'customer.born_in.date_format' => 'O campo "Data de nascimento" deve ter o formato: DD/MM/AAAA!',
            'address.city.required' => 'O campo "Cidade" deve ser prenchido!',
            'address.city.min' => 'O campo "Cidade" deve ter entre 1 e 255 caracteres!',
            'address.city .max' => 'O campo "Cidade" deve ter entre 1 e 255 caracteres!',
            'address.public_place.required' => 'O campo "Logradouro" deve ser prenchido!',
            'address.public_place.min' => 'O campo "Logradouro" deve ter entre 1 e 255 caracteres!',
            'address.public_place.max' => 'O campo "Logradouro" deve ter entre 1 e 255 caracteres!',
            'address.number.required' => 'O campo "Número" deve ser prenchido!',
            'address.number.min' => 'O campo "Número" deve ter entre 1 e 15 caracteres!',
            'address.number.max' => 'O campo "Número" deve ter entre 1 e 15 caracteres!',
            'address.post_code.required' => 'O campo "CEP" deve ser prenchido!',
            'address.post_code.size' => 'Verifique o CEP digitado',
            'address.post_code.regex' => 'Verifique o CEP digitado!',
            'address.neighborhood.required' => 'O campo "Bairro" deve ser prenchido!',
            'address.neighborhood.size' => 'O campo "Bairro" deve ter entre 1 e 15 caracteres!',
            'address.neighborhood.regex' => 'O campo "Bairro" deve ter entre 1 e 15 caracteres!',
            'address.state_id.in' => "Estado inválido!"
        ];
    }

}
