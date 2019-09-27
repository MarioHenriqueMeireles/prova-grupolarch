<?php

namespace App\Models;

class CustomerStatus {

    public static function all() {
        return collect([
            (object) ['id' => 1, 'name' => 'ativo'],
            (object) ['id' => 2, 'name' => 'excluído'],
            (object) ['id' => 3, 'name' => 'inativo']
        ]);
    }

    public static function getByID($id) {
        return self::all()->where('id', '=', $id)->first();
    }

}
