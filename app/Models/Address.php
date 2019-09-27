<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $table = "addresses";
    protected $fillable = [
        'id',
        'country',
        'state',
        'city',
        'post_code',
        'public_place', // logradouro
        'neighborhood',
        'number',
        'complement'
    ];
    protected $casts = [
        'id' => 'integer',
        'country' => 'string',
        'state' => 'string',
        'city' => 'string',
        'post_code' => 'string',
        'public_place' => 'string', // logradouro
        'neighborhood' => 'string',
        'number' => 'string',
        'complement' => 'string'
    ];

    
    public function clients() {
        return $this->belongsToMany(Customer::class,'customer_addresses');
    }

    
}
