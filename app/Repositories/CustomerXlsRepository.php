<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerXlsRepository implements FromCollection {

    private $customers = null;

    public function map() {
        $customers = $this->customers;
        $collectionArray = collect([
            [
                "codigo" => "Código",
                "nome" => "Nome",
                "telefone" => "Telefone",
                "status" => "Status",
                "address" => "Endereço",
            ]
        ]);
        $customers->each(function($customer) use (&$collectionArray) {
            $address = $customer->address;
            $collectionArray->push([
                "codigo" => $customer->code,
                "nome" => $customer->name,
                "telefone" => $customer->phone,
                "status" => $customer->status_id,
                "address" => "{$address->string} - CEP: {$address->post_code}",
            ]);
        });
        return $collectionArray;
    }

    public function collection(): \Illuminate\Support\Collection {
        return $this->map();
    }

    function setCustomers($customers) {
        $this->customers = $customers;
    }

}
