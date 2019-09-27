<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Address;
use App\Models\CustomerAddresses;
use DB;
class DeleteCustomerService {

    public function delete(int $id) {
        try {
            DB::beginTransaction();
            $customer = Customer::find($id);
            if (is_null($customer)) {
                return null;
            }
            $addresses = $customer->addresses()->get();
            $this->deleteAddresses($addresses, $customer);
            $customer->status_id = 2;
            $customer->save();
            $reponse = $customer->delete();
            DB::commit();
            return $reponse;
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex; 
        }
    }

    public function deleteAddresses(\Illuminate\Database\Eloquent\Collection $addresses, Customer $customer) {
        foreach ($addresses as $address) {
            $isUniqueCustomerAddresses = CustomerAddresses::where([
                        ['address_id', '=', $address->id]
                    ])->count() > 1 ? false : true;
            if (!$isUniqueCustomerAddresses) {
                $customer->addresses()->detach($address->id);
            } else {
                $customer->addresses()->detach($address->id);
                $address->delete();
            }
        }
    }

}
