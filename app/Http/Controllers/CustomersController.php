<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Services\CreateCustomerService;
use App\Services\UpdateCustomerService;

class CustomersController extends Controller {

    /**
     *
     * @var CreateCustomerService 
     */
    private $seviceCreate;

    /**
     *
     * @var UpdateCustomerService 
     */
    private $seviceUpdate;

    function __construct(CreateCustomerService $seviceCreate, UpdateCustomerService $seviceUpdate) {
        $this->seviceCreate = $seviceCreate;
        $this->seviceUpdate = $seviceUpdate;
    }

    public function create(Request $request) {
        $status = \App\Models\CustomerStatus::all();
        $estados = \App\Models\Estados::all();
        return view('customers.html.form', ['status' => $status, 'estados' => $estados]);
    }

    public function store(CustomerStoreRequest $request) {
        $data = $request->all();
        $customer = $this->seviceCreate->create($data);
        return redirect()->route('show-customer', [$customer->id]);
    }

    public function edit(Request $request, $id) {
        $status = \App\Models\CustomerStatus::all();
        $estados = \App\Models\Estados::all();
        $customer = \App\Models\Customer::with([
                    'addresses' => function($query) {
                        return $query->orderBy('updated_at', 'desc')->first();
                    }
                ])->find($id);
        $address = $customer->addresses->first();
        //   dd($address);
        return view('customers.html.edit-form', [
            'status' => $status,
            'estados' => $estados,
            'customer' => $customer,
            'address' => $address
        ]);
    }

    public function update(CustomerStoreRequest $request, $id) {
        $customer = $this->seviceUpdate->update($request->all(), $id);
        return redirect()->route('show-customer', [$customer->id]);
    }

}
