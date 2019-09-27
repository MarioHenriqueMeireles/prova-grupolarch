<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerXlsRepository;

class CustomerListXlsController extends Controller {

    /**
     *
     * @var CustomerRepository 
     */
    private $repository;

    function __construct(CustomerRepository $repository) {
        $this->repository = $repository;
    }

    public function exportList(Request $request) {

        try {
            $xls = new CustomerXlsRepository();
            $xls->setCustomers($this->repository->customerList($request)['customers']);
            return Excel::download($xls, 'customers.xls');
        } catch (Exception $ex) {
            return response()->json([
                        "error" => [
                            'message' => 'não foi possível exportar o arquivo!'
                        ]
            ]);
        }
    }

}
