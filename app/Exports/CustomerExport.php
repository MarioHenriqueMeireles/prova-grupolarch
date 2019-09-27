<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Customer;

class CustomerExport implements FromCollection {

    private $customer;
    private $colection;

    public function __construct(Customer $customer) {
        $this->customer = $customer;
    }

    public function collection() {
        return $this->colection;
    }

    function setColection($colection) {
        $this->colection = $colection;
        return $this;
    }

}
