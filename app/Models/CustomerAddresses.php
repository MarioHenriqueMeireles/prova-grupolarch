<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddresses extends Model {

    protected $table = "customer_addresses";
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'address_id' => 'integer'
    ];

}
