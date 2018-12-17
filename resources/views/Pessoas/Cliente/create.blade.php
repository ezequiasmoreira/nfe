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
                        <button id="salvar" class="btn btn-secondary btn-success btn-sm">SALVAR</button>
                        <a href="" id="excluir" class="btn btn-secondary btn-danger btn-sm">EXCLUIR</a>
                        <a href="" id="pesquisar "class="btn btn-secondary btn-info btn-sm">PESQUISAR</a>
                    </td>
                </tr>
                <tr class="linha">
                    <td class="col-dir-title"><label for="id" title="Código do cliente">CÓDIGO:</label></td>
                    <td class="col-dir-value "><input type="text" class="form-control input-sm cli-numero"  id="id"  name="id" readonly="readonly"></td>
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
                <tr>
                    <td class="col-esq-title"><label for="tipo">TIPO:</label></td>
                    <td class="col-esq-value">
                        <select class="form-control input-sm cli-numero" id="tipo" name="tipo" required>
                            <option value="1">FÍSICA</option>
                            <option value="2">JURÍDICA</option>
                        </select>
                    </td> 
                    <td class="col-esq-title"><label for="origem">ORIGEM:</label></td>
                    <td class="col-esq-value">
                        <select class="form-control input-sm cli-numero" id="origem" name="origem" required>
                            <option value="1">NACIONAL</option>
                            <option value="1">ESTRANGEIRO</option>
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
                        <?php if(@$paises){
                            foreach ($paises as $pais){?>
                            <option value="<?php echo $pais->id ?>"><?php echo $pais->sigla." - ".$pais->nome ?></option>
                        <?php }}?>
                    </select>
                </td> 
                <td class="col-esq-title"><label for="estado">ESTADO:</label></td>
                <td class="col-esq-value">
                    <select class="form-control input-sm cli-numero" id="estado" name="estado" required>
                        <option value="0">SELECIONE</option>
                        <?php if(@$estados){
                            foreach ($estados as $estado){?>
                            <option class="removeEstados" value="<?php echo $estado->id ?>"><?php echo $estado->sigla." - ".$estado->nome ?></option>
                        <?php }}?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td class="col-esq-title"><label for="cidade">CIDADE:</label></td>
                <td class="col-esq-value">
                    <select class="form-control input-sm cli-numero" id="cidade" name="municipio" required>
                        
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
<script>
window.onload=function (){
    retornaCidades();
    retornaEstados();
    $('#salvar').click(function(){
        salvar();
    });
}
function retornaCidades(){
   
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $("#estado").on('change', function(){
            
            var estado  = $('#estado').val();
            var token   = $("input[type=hidden][name=_token]").val();
            
            $.ajax({
                type:"post",
                url:"{!! URL::to('cliente/retorna-cidade') !!}",
                dataType: 'JSON',
                data: {
                    "estado_id": estado, 
                    '_token': token
                },
                success:function(data){  
                    $(".removeCidades").each(function() {
                        $(this).remove();
                    });
                    for (var i = 0; i < data.length; i++) { 
                        var id      = data[i].id;
                        var nome    = data[i].nome;                                          
                        $('#cidade').append("<option class='removeCidades' value="+id+">"+nome+"</option>");                   
                    }
                },
                error:function(){                    
                        alert("Ocorreu algum problema entre em contato como suporte");                    
                },
            });
       });
    });  
}
function retornaEstados(){
   
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $("#pais").on('change', function(){
            
            var pais  = $('#pais').val();
            var token   = $("input[type=hidden][name=_token]").val();
            
            $.ajax({
                type:"post",
                url:"{!! URL::to('cliente/retorna-estado') !!}",
                dataType: 'JSON',
                data: {
                    "pais_id": pais, 
                    '_token': token
                },
                success:function(data){  
                    $(".removeEstados").each(function() {
                        $(this).remove();
                    });
                    $(".removeCidades").each(function() {
                        $(this).remove();
                    });
                    for (var i = 0; i < data.length; i++) { 
                        var id      = data[i].id;
                        var sigla    = data[i].sigla; 
                        var nome    = data[i].nome;                                          
                        $('#estado').append("<option class='removeEstados' value="+id+">"+sigla+ ' - ' +nome+"</option>");                   
                    }
                },
                error:function(){                    
                        alert("Ocorreu algum problema entre em contato como suporte");                    
                },
            });
       });
    });
}
function validarIndicador(indicador){
    switch (indicador) { 
        //se for contribuinte para do icms deve informar a IE
        case '0':
                alert("Deve ser informado se o cliente é contribuite do icms");
                $('#contribuinte_icms').focus();
                return false;
        break;
        case '1': 
            if ($("#inscricao_estadual").val() === ""){
                alert("Para contribuinte do icms deve ser informado a inscrição estadual");
                $("#inscricao_estadual").focus();
                return false;
            }
        break;
        case '2': 
            if ($("#inscricao_estadual").val() !== ""){
                alert("Para contribuinte isento do icms não deve ser informado a inscrição estadual");                
                $("#inscricao_estadual").focus();
                return false;
            }
        break;
        case '9': 
            if ($("#inscricao_estadual").val() !== ""){
                alert("Para não contribuinte do icms não deve ser informado a inscrição estadual");                
                $("#inscricao_estadual").focus();
                return false;
            }
        break;
    }
}
function salvar(){    
    var indicador = $('#contribuinte_icms').val();
    validarIndicador(indicador);
    
}

</script>

