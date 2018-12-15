@extends("Template.app")
@section("content")
<link  type="text/css" rel="stylesheet" href= {{url('css/Pessoas/cliente.css')}}>
<div class="conteudo">
<div class="container">
    <h2>CADASTRO DE CLIENTES</h2> 
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">PRINCIPAL</a></li>
        <li id='endereco' ><a data-toggle="tab" class="endereco" href="#menu1">COMERCIAL</a></li>
        <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
    </ul>
    <div class="tab-content tabela-cliente">
    
        <div id="home" class="tab-pane fade in active tabela-cliente">
            <table class="tabela-cliente">
            <tbody class="tabela-cliente">
                <form action= {{url('cliente/salvar')}} method="Post" class="tabela-cliente">
                
                <tr class="linha-cliente">
                    {{ csrf_field()}}
                    <td class="col-dir-title"><label for="id" title="Código do cliente">CÓDIGO:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="id"  name="id" readonly="readonly" required></td>
                    <td class="col-esq-title"><label for="contribuinte_icms">INDICADOR:</label></td>
                    <td class="col-esq-value">
                        <select class="form-control input-sm cli-numero" id="contribuinte_icms" name="contribuinte_icms" required="">
                            <option value="0">SELECIONE</option>
                            <option value="1">CONTRIBUINTE ICMS</option>
                            <option value="2">CONTRIBUINTE ISENTO</option>
                            <option value="9">NÃO CONTRIBUINTE </option>
                        </select>
                    </td>                
                </tr>            
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="nome" title="Nome do cliente">NOME:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm "  id="nome" name="nome"  required></td>
                    <td class="col-esq-title"><label for="inscricao_estadual">INSCR. ESTADUAL:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="inscricao_estadual"name="inscricao_estadual"></td>
                </tr>            
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="cpf" title="Cpf do cliente se for pessoa física">CPF:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="cpf" name="cpf"></td>
                    <td class="col-esq-title"><label for="inscricao_municipal">INSCR. MUNICIPAL:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="inscricao_municipal"name="inscricao_municipal"  required></td>
                </tr>            
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="cnpj" title="cnpj do cliente se for pessoa juridica">CNPJ:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="cnpj" name="cnpj"></td>
                    <td class="col-esq-title"><label for="suframa">SUFRAMA:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="suframa"name="suframa"></td>
                </tr>            
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="idEstrangeiro" title="Em caso de exportação deve ser informado algum documento legal para identificar o cliente estrangeiro">PASSAPORTE:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="idEstrangeiro" name="idEstrangeiro"></td>
                    
                </tr>            
                         
                </form>

            </div>
            </tbody>
            </table>
        </div>
    <div id="menu1" class="tab-pane fade">
        <h3 >Comercial</h3>
      
    </div>     
  
        <div class="alert alert-success" style="display:none"></div>
    </div>
</div>
</div>

@endsection

