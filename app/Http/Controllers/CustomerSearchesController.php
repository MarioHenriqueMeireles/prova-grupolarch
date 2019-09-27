<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class CustomerSearchesController extends Controller {

    /**
     *
     * @var CustomerRepository 
     */
    private $repository;

    function __construct(CustomerRepository $repository) {

        $this->repository = $repository;
    }

    public function index(Request $request) {
        try {

            $data = $this->repository->customerList($request);
            return view('customers.html.list', $data);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, $ex->getMessage());
            }
        }
    }

    public function show($id) {
        try {
            $customer = $this->repository->findById($id);
            
            if (is_null($customer))
                return redirect()->route('list-customer');
            
            $status = \App\Models\CustomerStatus::getByID($customer->status_id);
            return view('customers.html.show', ['customer' => $customer, "status" => $status]);
        } catch (Exception $ex) {
            if (!env('APP_DEBUG')) {
                return abort(500, $ex->getMessage());
            }
        }
    }

}
