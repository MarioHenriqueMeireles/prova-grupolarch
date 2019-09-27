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
        $data = $this->repository->customerList($request);
       // dd($data);
        return view('customers.html.list', $data);
    }

    public function show($id) {
        $customer = $this->repository->findById($id);
        return view('customers.html.show', ['customer' => $customer]);
    }

}
