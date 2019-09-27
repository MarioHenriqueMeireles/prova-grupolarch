<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = "customers";
    protected $dates = [
        'created_at',
        'updated_at',
        'born_in'
    ];
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'phone' => 'string',
        'code' => 'string',
        'name' => 'string',
    ];
    protected $fillable = [
        'id',
        'code',
        'phone',
        'name',
        'status_id',
        'born_in'
    ];

    public function addresses() {
        return $this->belongsToMany(Address::class, 'customer_addresses');
    }

    public function getAddressAttribute() {
        $address = $this->addresses()->orderBy('updated_at', 'desc')->first();
        $complement = $address->complement ? "{$address->complement}, " : null;
        $estado = Estados::getStateByAbbr($address->state) ?? Estados::getStateByID($address->state);
        $sigla = $estado ? $estado->abbr : '';
        return (object) [
                    "string" => "{$address->public_place}, n° {$address->number}, {$complement}{$address->neighborhood} - {$address->city} / {$sigla}",
                    "post_code" => $address->post_code
        ];
    }

    public function getStatusAttribute() {

        return CustomerStatus::getByID($this->status_id);
    }

}
