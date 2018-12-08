<?php

namespace App;
use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use \stdClass;
use \number_format;
use Illuminate\Database\Eloquent\Model;
use app\rand;

class NfeService extends Model
{
    private $config;
    private $tools;
    
    public function __construct($config){
        $this->config = $config;
        //$certificadoDigital = file_get_contents('certificado.pfx');
        //$this->tools = new Tools(json_encode($config), NFePHP\Common\Certificate::readPfx($certificadoDigital, '12345'));
        
    }
    function gerarNfe(){
        //cria uma nota vazia
        $nfe = new Make();
        /**inf nfe**/
        $stdInNfe = new stdClass();
        $stdInNfe->versao = '4.00'; //versão do layout
        //$stdInNfe->Id = 'NFe35150271780456000160550010000000021800700082';//se o Id de 44 digitos não for passado será gerado automaticamente
        $stdInNfe->pk_nItem = null; //deixe essa variavel sempre como NULL

        $infNfe = $nfe->taginfNFe($stdInNfe);
        
        /**IDE**/
        $stdIde = new stdClass();
        $stdIde->cUF = 43;
        $stdIde->cNF = rand(11111111,99999999);
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
        $stdEmit->xNome = "E-SALES SOLUCOOES Obj";
        $stdEmit->xFant = "Obj";
        $stdEmit->IE = "0963233556";
        //$std->IEST;
        //$std->IM;
        //$std->CNAE;
        $stdEmit->CRT = "1";
        $stdEmit->CNPJ ="07385111000102"; //indicar apenas um CNPJ ou CPF

        $emit = $nfe->tagemit($stdEmit);
        
        /*ENDEREÇO DO EMITENTE*/
        $stdEnderEmit = new stdClass();
        $stdEnderEmit->xLgr = "LIBANO JOSE GOMES";
        $stdEnderEmit->nro = "2800";
        $stdEnderEmit->xCpl ="";
        $stdEnderEmit->xBairro = "CIC";
        $stdEnderEmit->cMun= "4314902";
        $stdEnderEmit->xMun = "Porto Alegre";
        $stdEnderEmit->UF = "RS";
        $stdEnderEmit->CEP = "81310020";
        $stdEnderEmit->cPais = "1058";
        $stdEnderEmit->xPais = "BRASIL";
        $stdEnderEmit->fone = "4121098000";

        $enderEmit = $nfe->tagenderEmit($stdEnderEmit);
        
        /*DESTINATÁRIO*/
        $stdDest = new stdClass();
        $stdDest->xNome ="E-sales Solucoes Oobj";
        $stdDest->indIEDest ="1";//se existir inscrição estadual é 1 senão existir é 2
        $stdDest->IE ="09633233556";
        $stdDest->ISUF ="";
        $stdDest->IM ="";
        $stdDest->email ="ezequiasmoreira@hotmail.com";
        $stdDest->CNPJ ="01358376000135"; //indicar apenas um CNPJ ou CPF ou idEstrangeiro
        //$stdDest->CPF;
        //$stdDest->idEstrangeiro;

        $dest = $nfe->tagdest($stdDest);
        
        /**ENDEREÇO DO DESTINATÁRIO**/
        $stdEnderDest = new stdClass();
        $stdEnderDest->xLgr ="PROF. ALGACYR MUNHOZ MADER";
        $stdEnderDest->nro ="2800"; 
        $stdEnderDest->xCpl ="";
        $stdEnderDest->xBairro ="CIC";
        $stdEnderDest->cMun ="4314902";
        $stdEnderDest->xMun ="Porto Alegre";
        $stdEnderDest->UF ="RS";
        $stdEnderDest->CEP ="81310020";
        $stdEnderDest->cPais ="1058";
        $stdEnderDest->xPais ="BRASIL";
        $stdEnderDest->fone ="4121098000";

        $nfe->tagenderDest($stdEnderDest);
        
        /**PRODUTOS**/
        $stdProd = new stdClass();
        $stdProd->item = 1; //item da NFe
        $stdProd->cProd = "4450";//CÓDIGO DO PRODUTO 
        $stdProd->cEAN = "7897534826649";//código de barra da caixa
        $stdProd->xProd = "lIMPA TELAS 120 ML";//NOME DO PRODUTO
        $stdProd->NCM = "44170010";

        //$stdProd->cBenef; //incluido no layout 4.00

        //$std->EXTIPI;
        $stdProd->CFOP ="5102";
        $stdProd->uCom ="UN";
        $stdProd->qCom ="10";//QTD DO PRODUTO
        $stdProd->vUnCom = $this->format(6.99);      
        $stdProd->cEANTrib ="7897534826649";//codigo de barra da unidade
        $stdProd->uTrib ="UN";
        $stdProd->qTrib ="10";
        $stdProd->vUnTrib = $this->format(6.99);
        $stdProd->vProd =  $this->format($stdProd->qTrib * $stdProd->vUnTrib);
        $stdProd->vFrete = "";
        $stdProd->vSeg = "";
        //$stdProd->vDesc = "";
        $stdProd->vOutro = "";
        $stdProd->indTot ="1";//se estiver 1 o produto vai compor o valor total da nota
        //$stdProd->xPed =""; //numero do pedido no sistema
        //$stdProd->nItemPed ="";
        //$stdProd->nFCI ="";

        $prod = $nfe->tagprod($stdProd);
        
        /**INFORMAÇÃO ADICIONAL DO PRODUTO**/
        
        $stdAdicional = new stdClass();
        $stdAdicional->item = 1; //item da NFe

        $stdAdicional->infAdProd = 'informacao adicional do item';

        $indAdProd = $nfe->taginfAdProd($stdAdicional);
        
        /**IMPOSTO**/
        $stdImposto = new stdClass();
        $stdImposto->item = 1; //item da NFe
        $stdImposto->vTotTrib = 4.00;

        $imposto = $nfe->tagimposto($stdImposto);
        
        /**ICMS**/
        $stdICMS = new stdClass();
        $stdICMS->item = 1; //item da NFe
        $stdICMS->orig = 0;
        $stdICMS->CST = "00";
        $stdICMS->modBC = "0";
        $stdICMS->vBC = $this->format($stdProd->vProd);
        $stdICMS->pICMS = 18.00;
        $stdICMS->vICMS = $this->format($stdICMS->vBC * ($stdICMS->pICMS / 100));
        /*$stdICMS->pFCP;
        $stdICMS->vFCP;
        $stdICMS->vBCFCP;
        $stdICMS->modBCST;
        $stdICMS->pMVAST;
        $stdICMS->pRedBCST;
        $stdICMS->vBCST;
        $stdICMS->pICMSST;
        $stdICMS->vICMSST;
        $stdICMS->vBCFCPST;
        $stdICMS->pFCPST;
        $stdICMS->vFCPST;
        $stdICMS->vICMSDeson;
        $stdICMS->motDesICMS;
        $stdICMS->pRedBC;
        $stdICMS->vICMSOp;
        $stdICMS->pDif;
        $stdICMS->vICMSDif;
        $stdICMS->vBCSTRet;
        $stdICMS->pST;
        $stdICMS->vICMSSTRet;
        $stdICMS->vBCFCPSTRet;
        $stdICMS->pFCPSTRet;
        $stdICMS->vFCPSTRet;
        $stdICMS->pRedBCEfet;
        $stdICMS->vBCEfet;
        $stdICMS->pICMSEfet;
        $stdICMS->vICMSEfet;*/

        $ICMS = $nfe->tagICMS($stdICMS);
        
        /**PIS**/
        $stdPIS = new stdClass();
        $stdPIS->item = 1; //item da NFe
        $stdPIS->CST = '50';
        $stdPIS->vBC = $this->format($stdProd->vProd);
        $stdPIS->pPIS = 1.65;
        $stdPIS->vPIS = $this->format($stdPIS->vBC * ($stdPIS->pPIS / 100));
        //$stdPIS->qBCProd = null;
        //$stdPIS->vAliqProd = null;

        $PIS = $nfe->tagPIS($stdPIS);
        
        /**COFINS**/
        
        $stdCOFINS = new stdClass();
        $stdCOFINS->item = 1; //item da NFe
        $stdCOFINS->CST = '50';
        $stdCOFINS->vBC = $this->format($stdProd->vProd);
        $stdCOFINS->pCOFINS = 0.65;
        $stdCOFINS->vCOFINS = $this->format($stdCOFINS->vBC * ($stdCOFINS->pCOFINS / 100));
        //$std->qBCProd = null;
        //$std->vAliqProd = null;

        $COFINS = $nfe->tagCOFINS($stdCOFINS);
        
        /**TOTAIS**/
        
        $stdICMSTot = new stdClass();
        $stdICMSTot->vBC ="";
        $stdICMSTot->vICMS="";
        $stdICMSTot->vICMSDeson ="";
        $stdICMSTot->vFCP =""; //incluso no layout 4.00
        $stdICMSTot->vBCST ="";
        $stdICMSTot->vST ="";
        $stdICMSTot->vFCPST =""; //incluso no layout 4.00
        $stdICMSTot->vFCPSTRet =""; //incluso no layout 4.00
        $stdICMSTot->vProd ="";
        $stdICMSTot->vFrete ="";
        $stdICMSTot->vSeg ="";
        $stdICMSTot->vDesc ="";
        $stdICMSTot->vII ="";
        $stdICMSTot->vIPI ="";
        $stdICMSTot->vIPIDevol =""; //incluso no layout 4.00
        $stdICMSTot->vPIS ="";
        $stdICMSTot->vCOFINS ="";
        $stdICMSTot->vOutro ="";
        $stdICMSTot->vNF ="";
        $stdICMSTot->vTotTrib ="";

        $ICMSTot =  $nfe->tagICMSTot($stdICMSTot);
        
        /**TRANSPORTADORA**/
        
        $stdTransp = new stdClass();
        $stdTransp->modFrete = 1;

        $transp = $nfe->tagtransp($stdTransp);
        
        /**VOLUMES**/
        
        $stdVol = new stdClass();
        $stdVol->item = 1; //indicativo do numero do volume
        $stdVol->qVol = 1;
        $stdVol->esp = 'CAIXAS';
        //$stdVol->marca = 'OLX';
        //$stdVol->nVol = '11111';
        //$stdVol->pesoL = 10.50;
        //$stdVol->pesoB = 11.00;

        $vol = $nfe->tagvol($stdVol);
        
        /**PAGAMENTO**/
        
        $stdPag = new stdClass();
        $stdPag->vTroco = 0.00; //incluso no layout 4.00, obrigatório informar para NFCe (65)

        $pag = $nfe->tagpag($stdPag);
        
        /**DETALHE DO PAGAMENTO **/
        
        $stdDetPag = new stdClass();
        $stdDetPag->tPag = '14';
        $stdDetPag->vPag = $this->format($stdProd->vProd); //Obs: deve ser informado o valor pago pelo cliente
        //$stdDetPag->CNPJ = '12345678901234';
        //$stdDetPag->tBand = '01';
        //$stdDetPag->cAut = '3333333';
        //$stdDetPag->tpIntegra = 1; //incluso na NT 2015/002
        //$stdDetPag->indPag = '0'; //0= Pagamento à Vista 1= Pagamento à Prazo

        $detPag = $nfe->tagdetPag($stdDetPag);
        
        /**INFORMAÇÃO ADICIONAL**/
        $stdInfAdic = new stdClass();
        $stdInfAdic->infAdFisco = 'informacoes para o fisco';
        $stdInfAdic->infCpl = 'informacoes complementares';

        $infAdic = $nfe->taginfAdic($stdInfAdic);
        
        /**MONTA A NOTA**/
        if($nfe->montaNFe()){
           return $nfe->getXML(); 
        }else{
          throw new Exception("Erro ao gerra a nfe");  
        } 
    }
    public function format($nunber, $dec=2){
        return number_format((float)$nunber,$dec,".","");
    }
}
