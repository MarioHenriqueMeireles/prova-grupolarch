<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Address;
use DB;

class CreateCustomerService extends Model {

    public function create($data) {
        try {
            DB::beginTransaction();
            $data['customer']['born_in'] = join("-", array_reverse(explode('/', $data['customer']['born_in'])));
            $customer = Customer::create($data['customer']);
            $address = new Address($data['address']);
            $customer->addresses()->save($address);
            DB::commit();
            return $customer;
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }

}
