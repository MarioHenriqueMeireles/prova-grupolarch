<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Address;

class CreateCustomerService extends Model
{
    public function create($data) {
        $data['customer']['born_in'] = join("-",array_reverse(explode('/', $data['customer']['born_in'])));
        $customer = Customer::create($data['customer']);
        $address = new Address($data['address']);
        $customer->addresses()->save($address);
        return $customer;
    }
}
