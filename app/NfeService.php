<?php

namespace App;
use NFePHP\NFe\Make;
use Illuminate\Database\Eloquent\Model;

class NfeService extends Model
{
    private $config;
    public function __construct($config){
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
            "CSCid" => "000002"
        ];

        $json = json_encode($config);
    }
    function gerarNfe(){
        //cria uma nota vazia
        $nfe = new Make();
        /**inf nfe**/
        $stdInNfe = new stdClass();
        $stdInNfe->versao = '4.00'; //versão do layout
        $stdInNfe->Id = 'NFe35150271780456000160550010000000021800700082';//se o Id de 44 digitos não for passado será gerado automaticamente
        $stdInNfe->pk_nItem = null; //deixe essa variavel sempre como NULL

        $infNfe = $nfe->taginfNFe($stdInNfe);
        
        /**IDE**/
        $stdIde = new stdClass();
        $stdIde->cUF = 43;
        $stdIde->cNF = rannd(11111111,99999999);
        $stdIde->natOp = 'VENDA DE MERCADORIAS SIMPLES NACIONAL';
        //$std->indPag = 0; //NÃO EXISTE MAIS NA VERSÃO 4.00        
        $stdIde->mod = 55;
        $stdIde->serie = 1;
        $stdIde->nNF = 2;
        $stdIde->dhEmi = date("Y-m-d\TH:i:sP");//data de saída
        $stdIde->dhSaiEnt = date("Y-m-d\TH:i:sP");//data de entrada
        $stdIde->tpNF = 1;//tipo da nota [saída/entrada]
        $stdIde->idDest = 1;//dentro ou fora do estado
        $stdIde->cMunFG = 3518800;
        $stdIde->tpImp = 1;//tipo de impressão 1 - retrato ou 2 - paisagem
        $stdIde->tpEmis = 1;//tipo de emissão normal contigência...
        $stdIde->cDV = 2;//Digito verificador
        $stdIde->tpAmb = 2;//tipo de ambiente 1 - produção ou 2 - homologação
        $stdIde->finNFe = 1;//finalidade da emissão da nfe 1-nfe-normal 2-nfe-complementar 3-nfe de ajuste
        $stdIde->indFinal = 0;//se é consumidor final 0-não
        $stdIde->indPres = 0;//se a nota foi emitida presencial o-não
        $stdIde->procEmi = 0;//processo de emissão
        $stdIde->verProc = '2.4.0';//versão do sistema
        $stdIde->dhCont = null;//data e hora da entrada em contigência
        $stdIde->xJust = null;//sefaz local não responde

        $tagide = $nfe->tagide($stdIde);
        
        /**EMITENTE**/
        $stdEmit = new stdClass();
        $std->xNome = "E-SALES SOLUCOOES Obj";
        $std->xFant = "Obj";
        $std->IE = "0963233556";
        //$std->IEST;
        //$std->IM;
        //$std->CNAE;
        $std->CRT = "1";
        $std->CNPJ ="07385111000102"; //indicar apenas um CNPJ ou CPF

        $emit = $nfe->tagemit($stdEmit);
        
        /*ENDEREÇO DO EMITENTE*/
        $stdEnderEmit = new stdClass();
        $stdEnderEmit->xLgr = "LIBANO JOSE GOMES";
        $stdEnderEmit->nro = "2800";
        $stdEnderEmit->xCpl;
        $stdEnderEmit->xBairro = "CIC";
        $stdEnderEmit->cMun= "4314902";
        $stdEnderEmit->xMun = "Porto Alegre";
        $stdEnderEmit->UF = "RS";
        $stdEnderEmit->CEP = "81310020";
        $stdEnderEmit->cPais = "1058";
        $stdEnderEmit->xPais = "BRASIL";
        $stdEnderEmit->fone = "4121098000";

        $enderEmit = $nfe->tagenderEmit($std);
        
        /*DESTINATÁRIO*/
        $stdDest = new stdClass();
        $stdDest->xNome ="";
        $stdDest->indIEDest ="";
        $stdDest->IE ="";
        $stdDest->ISUF ="";
        $stdDest->IM ="";
        $stdDest->email ="";
        $stdDest->CNPJ =""; //indicar apenas um CNPJ ou CPF ou idEstrangeiro
        //$stdDest->CPF;
        //$stdDest->idEstrangeiro;

        $dest = $nfe->tagdest($stdDest);
        
        /**ENDEREÇO DO DESTINATÁRIO**/
        $stdEnderDest = new stdClass();
        $stdEnderDest->xLgr ="PROF. ALGACYR MUNHOZ MADER";
        $stdEnderDest->nro =""; 
        $stdEnderDest->xCpl ="";
        $stdEnderDest->xBairro ="";
        $stdEnderDest->cMun ="";
        $stdEnderDest->xMun ="";
        $stdEnderDest->UF ="";
        $stdEnderDest->CEP ="";
        $stdEnderDest->cPais ="";
        $stdEnderDest->xPais ="";
        $stdEnderDest->fone ="";

        $nfe->tagenderDest($stdEnderDest);
    }
}
