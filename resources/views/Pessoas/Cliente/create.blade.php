@extends("Template.app")
@section("content")
<link  type="text/css" rel="stylesheet" href= {{url('css/Pessoas/cliente.css')}}>
<div class="conteudo">
     <div class="container">
  <h2>Cadastro de clientes</h2> 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Principal</a></li>
    <li id='endereco' ><a data-toggle="tab" class="endereco" href="#menu1">Comercial</a></li>
    <!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
  </ul>

  <div class="tab-content tabela-cliente">
    <table class="tabela-cliente">
        <tbody class="tabela-cliente">
        <div id="home" class="tab-pane fade in active tabela-cliente">
             <form action= {{url('cliente/salvar')}} method="Post" class="tabela-cliente">
            {{ csrf_field()}}
            <tr class="linha-cliente">
                <td class="col-dir-title"><label for="nome">Nome:</label></td>
                <td class="col-dir-value "><input type="text" class="form-control input-sm"  id="nome" placeholder="nome" name="nome" required></td>
                <td class="col-esq-title"><label for="cpf">Cpf:</label></td>
                <td class="col-esq-value"><input type="text" class="form-control input-sm" id="cpf" placeholder="cpf" name="cpf" required=""></td>                
            </tr>            
        </form>

        </div>
        </tbody>
    </table>
    <div id="menu1" class="tab-pane fade">
        <h3 >Comercial</h3>
      
    </div>     
  </div>
  <div class="alert alert-success" style="display:none"></div>
</div>
</div>

@endsection

