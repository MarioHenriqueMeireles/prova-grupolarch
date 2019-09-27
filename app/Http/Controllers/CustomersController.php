<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Services\CreateCustomerService;
use App\Services\UpdateCustomerService;
use App\Services\DeleteCustomerService;
use App\Repositories\CustomerRepository;

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

    /**
     *
     * @var DeleteCustomerService 
     */
    private $seviceDelete;

    /**
     *
     * @var CustomerRepository 
     */
    private $repository;

    function __construct(CreateCustomerService $seviceCreate, UpdateCustomerService $seviceUpdate, DeleteCustomerService $seviceDelete, CustomerRepository $repository) {
        $this->seviceCreate = $seviceCreate;
        $this->seviceUpdate = $seviceUpdate;
        $this->seviceDelete = $seviceDelete;
        $this->repository = $repository;
    }

    public function create(Request $request) {
        try {

            $status = \App\Models\CustomerStatus::all();
            $estados = \App\Models\Estados::all();
            return view('customers.html.form', ['status' => $status, 'estados' => $estados]);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, $ex->getMessage());
            }
        }
    }

    public function store(CustomerStoreRequest $request) {
        try {
            $data = $request->all();
            $customer = $this->seviceCreate->create($data);
            return redirect()->route('show-customer', [$customer->id]);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, "Nao foi possível criar o cliente: {$data['customer']['name']}!");
            }
        }
    }

    public function edit($id) {
        try {
            $status = \App\Models\CustomerStatus::all();
            $estados = \App\Models\Estados::all();
            $customer = \App\Models\Customer::with([
                        'addresses' => function($query) {
                            return $query->orderBy('updated_at', 'desc')->first();
                        }
                    ])->find($id);
            $address = $customer->addresses->first();
            return view('customers.html.edit-form', [
                'status' => $status,
                'estados' => $estados,
                'customer' => $customer,
                'address' => $address
            ]);
        } catch (\Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, $ex->getMessage());
            }
        }
    }

    public function update(CustomerStoreRequest $request, $id) {
        try {
            $customer = $this->seviceUpdate->update($request->all(), $id);
            return redirect()->route('show-customer', [$customer->id]);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, 'Não foi possível atualizar o cliente!');
            }
        }
    }

    public function delete($id) {
        try {
            $customer = $this->repository->findById($id);
            if (is_null($customer))
                return redirect()->route('list-customer');
            
            $status = \App\Models\CustomerStatus::getByID($customer->status_id);
            return view('customers.html.delete', ['customer' => $customer, "status" => $status]);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, $ex->getMessage());
            }
        }
    }

    public function destroy(Request $request) {
        try {
            $id = $request->get('customer')['id'];
            $customer = $this->seviceDelete->delete($id);
            return redirect()->route('list-customer');
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, 'não foi possível excluir o cliente!');
            }
        }
    }

}
