<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerRepository {

    public function customerList(Request $request) {
        $order = 'asc';
        if ($request->has('order')) {
            $order = $request->get("order");
        }
        if ($request->has('page')) {
            $page = $request->get("page");
        }

        $customers = Customer::orderBy('name', $order)
                ->paginate('10')
                ->appends(['order' => $order ?? 'asc']);

        return [
            "customers" => $customers,
            "order" => $order === 'asc' ? 'desc' : 'asc',
            "page" => $page ?? 1,
        ];
    }

    public function findById(int $id) {
        return Customer::find($id);
    }

}
