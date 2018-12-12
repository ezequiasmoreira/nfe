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
                {{ csrf_field()}}
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="id" title="Código do cliente">CÓDIGO:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="id" placeholder="Código" name="id" readonly="readonly" required></td>
                    <td class="col-esq-title"><label for="contribuinte_icms">INDICADOR:</label></td>
                    <td class="col-esq-value">
                        <select class="form-control" id="contribuinte_icms" name="contribuinte_icms" required="">
                            <option value="0">SELECIONE</option>
                            <option value="1">CONTRIBUINTE ICMS</option>
                            <option value="2">CONTRIBUINTE ISENTO</option>
                            <option value="9">NÃO CONTRIBUINTE </option>
                        </select>
                    </td>                
                </tr>            
                <tr class="linha-cliente">
                    <td class="col-dir-title"><label for="nome" title="Nome do cliente">NOME:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm"  id="nome" placeholder="Nome" name="nome" required></td>
                    <td class="col-esq-title"><label for="inscricao_estadual">INSCR. ESTATUAL:</label></td>
                    <td class="col-esq-value"><input type="text" class="form-control input-sm" id="inscricao_estadual" name="inscricao_estadual"></td>                
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

