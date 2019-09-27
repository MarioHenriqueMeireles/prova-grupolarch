<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Estados
 *
 * @author Mario Henrique Meireles de Aquino <mario.aquino.dev@gmail.com>
 */
class Estados {

    public static function all() {
        return collect(
                [
                    (object) ['id' => 1, 'abbr' => 'AC', 'name' => 'Acre'],
                    (object) ['id' => 2, 'abbr' => 'AL', 'name' => 'Alagoas'],
                    (object) ['id' => 3, 'abbr' => 'AP', 'name' => 'Amapá'],
                    (object) ['id' => 4, 'abbr' => 'AM', 'name' => 'Amazonas'],
                    (object) ['id' => 5, 'abbr' => 'BA', 'name' => 'Bahia'],
                    (object) ['id' => 6, 'abbr' => 'CE', 'name' => 'Ceará'],
                    (object) ['id' => 7, 'abbr' => 'DF', 'name' => 'Distrito Federal'],
                    (object) ['id' => 8, 'abbr' => 'ES', 'name' => 'Espírito Santo'],
                    (object) ['id' => 9, 'abbr' => 'GO', 'name' => 'Goiás'],
                    (object) ['id' => 10, 'abbr' => 'MA', 'name' => 'Maranhão'],
                    (object) ['id' => 11, 'abbr' => 'MT', 'name' => 'Mato Grosso'],
                    (object) ['id' => 12, 'abbr' => 'MS', 'name' => 'Mato Grosso do Sul'],
                    (object) ['id' => 13, 'abbr' => 'MG', 'name' => 'Minas Gerais'],
                    (object) ['id' => 14, 'abbr' => 'PA', 'name' => 'Pará'],
                    (object) ['id' => 15, 'abbr' => 'PB', 'name' => 'Paraíba'],
                    (object) ['id' => 16, 'abbr' => 'PR', 'name' => 'Paraná'],
                    (object) ['id' => 17, 'abbr' => 'PE', 'name' => 'Pernambuco'],
                    (object) ['id' => 18, 'abbr' => 'PI', 'name' => 'Piauí'],
                    (object) ['id' => 19, 'abbr' => 'RJ', 'name' => 'Rio de Janeiro'],
                    (object) ['id' => 21, 'abbr' => 'RN', 'name' => 'Rio Grande do Norte'],
                    (object) ['id' => 22, 'abbr' => 'RS', 'name' => 'Rio Grande do Sul'],
                    (object) ['id' => 23, 'abbr' => 'RO', 'name' => 'Rondônia'],
                    (object) ['id' => 24, 'abbr' => 'RR', 'name' => 'Roraima'],
                    (object) ['id' => 25, 'abbr' => 'SC', 'name' => 'Santa Catarina'],
                    (object) ['id' => 26, 'abbr' => 'SP', 'name' => 'São Paulo'],
                    (object) ['id' => 27, 'abbr' => 'SE', 'name' => 'Sergipe'],
                    (object) ['id' => 28, 'abbr' => 'TO', 'name' => 'Tocantins'],
        ]);
    }

    public static function getStateByID($id) {
        $all = self::all();
        return $all->where('id', '=', $id)->first();
    }

    public static function getStateByAbbr($abbr) {
        $all = self::all();
        return $all->where('abbr', '=', $abbr)->first();
    }

}
