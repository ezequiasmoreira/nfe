<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NfeService extends Model
{
    public function __construct(){
        $config = [
            "atualizacao" => "2015-10-02 06:01:21",
            "tpAmb" => 2,
            "razaosocial" => "Fake Materiais de construção Ltda",
            "siglaUF" => "SP",
            "cnpj" => "00716345000119",
            "schemes" => "PL_008i2",
            "versao" => "3.10",
            "tokenIBPT" => "AAAAAAA",
            "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid" => "000002",
            "aProxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ];

        $json = json_encode($config);
    }
    function gerarNfe(){
        
    }
}
