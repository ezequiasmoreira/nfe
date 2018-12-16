@extends("Template.app")
@section("content")
<link  type="text/css" rel="stylesheet" href= {{url('css/Pessoas/cliente.css')}}>
<div class="conteudo">
<div class="container">
    <h2>CADASTRO DE CLIENTES</h2> 
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">PRINCIPAL</a></li>
        <li id='endereco' ><a data-toggle="tab" class="endereco" href="#menu1">ENDEREÇO</a></li>
        <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
    </ul>
    <div class="tab-content tabela">    
        <div id="home" class="tab-pane fade in active tabela">
            <table class="tabela">
            <tbody class="tabela">
                {{ csrf_field()}}
                <tr class="linha">
                    <td class="botao" colspan="4">
                        <a href="" id="salvar" class="btn btn-secondary btn-success btn-sm">SALVAR</a>
                        <a href="" id="excluir" class="btn btn-secondary btn-danger btn-sm">EXCLUIR</a>
                        <a href="" id="pesquisar "class="btn btn-secondary btn-info btn-sm">PESQUISAR</a>
                    </td>
                </tr>
                <tr class="linha">
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
                <tr class="linha">
                    <td class="col-dir-title"><label for="nome" title="Nome do cliente">NOME:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm "  id="nome" name="nome"  required></td>
                    <td class="col-esq-title"><label for="inscricao_estadual">INSCR. ESTADUAL:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="inscricao_estadual"name="inscricao_estadual"></td>
                </tr>            
                <tr class="linha">
                    <td class="col-dir-title"><label for="cpf" title="Cpf do cliente se for pessoa física">CPF:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="cpf" name="cpf"></td>
                    <td class="col-esq-title"><label for="inscricao_municipal">INSCR. MUNICIPAL:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="inscricao_municipal"name="inscricao_municipal"  required></td>
                </tr>            
                <tr class="linha">
                    <td class="col-dir-title"><label for="cnpj" title="cnpj do cliente se for pessoa juridica">CNPJ:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="cnpj" name="cnpj"></td>
                    <td class="col-esq-title"><label for="suframa">SUFRAMA:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="suframa"name="suframa"></td>
                </tr>            
                <tr class="linha">
                    <td class="col-dir-title"><label for="idEstrangeiro" title="Em caso de exportação deve ser informado algum documento legal para identificar o cliente estrangeiro">PASSAPORTE:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="idEstrangeiro" name="idEstrangeiro"></td>                    
                </tr>
            </div>
            </tbody>
            </table>
        </div>
    <!--ENDEREÇO-->
    <div id="menu1" class="tab-pane fade">
        <table class="tabela">
        <tbody class="tabela">
            <tr class="linha">
               <td class="botao" colspan="4">
                   <button type="button" class="btn btn-secondary btn-success btn-sm">SALVAR</button>
                   <a href="" class="btn btn-secondary btn-danger btn-sm">EXCLUIR</a>
                   <a href="" class="btn btn-secondary btn-info btn-sm">PESQUISAR</a>
               </td>
            </tr>
            <tr class="linha">
                <td class="col-dir-title"><label for="logradouro" >LOGRADOURO:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm "  id="logradouro" name="logradouro"  required></td>
                <td class="col-esq-title"><label for="numero">NÚMERO:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="numero"name="numero" required></td>
            </tr>    
            <tr class="linha">
                <td class="col-dir-title"><label for="complemento" >COMPLEMENTO:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm "  id="complemento" name="complemento"  required></td>
                <td class="col-esq-title"><label for="telefone">TELEFONE:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="telefone"name="telefone" required></td>
            </tr>  
            <tr>
                <td class="col-esq-title"><label for="pais">PAIS:</label></td>
                <td class="col-esq-value">
                    <select class="form-control input-sm cli-numero" id="pais" name="pais" required>
                        <option value="1058">BRASIL</option>
                    </select>
                </td> 
                <td class="col-esq-title"><label for="estado">ESTADO:</label></td>
                <td class="col-esq-value">
                    <select class="form-control input-sm cli-numero" id="estado" name="estado" required>
                        <option value="1">SANTA CATARINA</option>
                    </select>
                </td> 
            </tr>
            <tr>
                <td class="col-esq-title"><label for="municipio">CIDADE:</label></td>
                <td class="col-esq-value">
                    <select class="form-control input-sm cli-numero" id="municipio" name="municipio" required>
                        <option value="1">CRICIÚMA</option>
                    </select>
                </td> 
                <td class="col-esq-title"><label for="cep">CEP:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero "  id="cep"name="cep"></td>
            </tr>
        </tbody>
        </table>
      
    </div>     
  
        <div class="alert alert-success" style="display:none"></div>
    </div>
</div>
</div>

@endsection

