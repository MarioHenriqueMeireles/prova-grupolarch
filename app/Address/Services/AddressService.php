<?php

namespace App\Packages\Address\Services;

use App\Packages\Address\Repositories\AddressRepository;
use Correios;

class AddressService
{

    /**
     * @var AddressRepository
     */
    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCEPFromCorreios($cep)
    {
        return $this->formatAddress(Correios::cep($cep));
    }

    public function track($trackingCode)
    {
        Correios::rastrear($trackingCode);
    }

    public function freightCost(array $data)
    {
        $dados = [
            'tipo' => 'sedex', // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato' => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            'cep_destino' => '89062086', // Obrigatório
            'cep_origem' => '89062080', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso' => '1', // Peso em kilos
            'comprimento' => '16', // Em centímetros
            'altura' => '11', // Em centímetros
            'largura' => '11', // Em centímetros
            'diametro' => '0', // Em centímetros, no caso de rolo
                // 'mao_propria'       => '1', // Não obrigatórios
                // 'valor_declarado'   => '1', // Não obrigatórios
                // 'aviso_recebimento' => '1', // Não obrigatórios
        ];

        return Correios::frete($dados);
    }

    private function formatAddress(array $address = [])
    {
        $data = ['uf','cidade','cep','logradouro','uf','bairro'];
        $r = [];
        foreach ($data as $value) {
            if(array_key_exists($value, $address)){
                $r[$value] = $address[$value];
            }else{
                $r[$value] = '';
            }
        }
        return [
            'state' => $r['uf'],
            'city' => $r['cidade'],
            'post_code' => $r['cep'],
            'public_place' => $r['logradouro'],
            'neighborhood' => $r['bairro'],
        ];
 
    }

}
