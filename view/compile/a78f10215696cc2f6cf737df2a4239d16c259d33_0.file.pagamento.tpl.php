<?php
/* Smarty version 3.1.39, created on 2023-01-15 12:14:43
  from 'C:\xampp\htdocs\lojaphp\view\pagamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63c418630991d2_54325211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a78f10215696cc2f6cf737df2a4239d16c259d33' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lojaphp\\view\\pagamento.tpl',
      1 => 1673784384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c418630991d2_54325211 (Smarty_Internal_Template $_smarty_tpl) {
?><!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<?php echo '<script'; ?>
>


    window.onload = function () {
        document.getElementById('spinner').style.display = 'block';
        var Dados = $(this).serialize(); //aqui vamos pegar o cep e serializa-lo para ser enviado. Os valores serializados podem ser usados ​​na string de consulta de URL ao fazer uma solicitação AJAX
        var cep = $('#cep').val();
        $.ajax({
            url: 'https://viacep.com.br/ws/' + cep + '/json/',
            method: 'get',
            dataType: 'json',
            data: Dados,
            success: function (Dados) {
                document.getElementById('spinner').style.display = 'none';
                $('#logradouro').val(Dados.logradouro);
                $('#bairro').val(Dados.bairro);
                $('#cidade').val(Dados.localidade);
                $('#estado').val(Dados.uf);
            }
        });

    }



    function novoCep() {

        window.location.replace("<?php echo $_smarty_tpl->tpl_vars['VOLTARCARRINHO']->value;?>
");
    }





// função para copiar o codigo qrcode

           function codigoPix(){
                var texto = $("#codPix1").val();
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(texto).select();
                document.execCommand("copy");
                $temp.remove();
                alert ("Código copiado!");
                };




    //os dois comandos abaixo é para a coluna central ocupar 12 col pois aqui não vai ter a coluna lateral da categoria
    $('#colunaCentral').removeClass('col-md-9 order-md-2');
    $('#colunaCentral').addClass(' col-md-12');

<?php echo '</script'; ?>
>


<style>


@media screen and (max-width: 576px) {


#colunaDireita{
padding: 0%;
}

#colunaEsquerda{

    margin: 4%;
}

#bola{
margin-left: 4%;
width: 91%;

}

#selectParcelas{

    margin-left: -4%;
}

}



@media screen and (min-width: 576px) {

#colunaEsquerda{

margin-top: 18%;


}

#row{

margin-left: 18px;

}

#selectParcelas{

margin-left: -2%;
}


}




    /*vamos ocultar a coluna lateral da categoria*/
    #menuLateral {

        display: none;

    }

    footer {
        background-color: rgb(52, 58, 64);
        color: white;
    }

    #topo {

        min-height: 100px;
        background-color: #204d74;
        color: #fff;

    }

    #rodape {

        min-height: 150px;
        background-color: #204d74;
        color: #fff;
        padding-top: 30px;
    }

    .thumbnail {

        border-radius: 10px;
        box-shadow: 1px 1px 5px #adadad;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-top: 5px;
    }


    .thumbnail1 {

        border-radius: 10px;
        box-shadow: 1px 1px 5px #adadad;

    }

    .meio-pag {
        color: white;
    }



    #bola {
        display: none;
    }




    #bola4 {
        padding-left: 15px;
        padding-right: 15px;
    }

    #spinner {
        display: none;
        position: fixed;
        border: 8px solid rgba(0, 0, 0, .1);
        border-radius: 50%;
        border-left-color: #22a6b3;
        left: 40%;
        top: 50%;
        height: 60px;
        width: 60px;
        animation: spin 1s linear infinite;
        /* vai inserir a animação */
    }

    @keyframes spin {

        to {
            transform: rotate(360deg);
        }

        /* vai fazer a animação do loading */
    }



    /* css abaixo para a mensagem que aparece e desaparece ao copiar codigo pix */
    @keyframes hide {
        from {
            opacity: 1
        }

        to {
            opacity: 0
        }
    }

    .alert-box {
        animation: hide 2s 2s forwards;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6
    }
</style>



<!-- começa  o container geral -->



    <div class="row" style="background-color:rgb(248, 249, 250);" id="row">




        <!-- coluna direita CONYEUDO CENTRAL -->
        <div class="col-md-10 order-md-2" id="colunaDireita">

            <div class="">
                <div class="bg-light" id="divQseraoculta" style="padding-left: 30px; padding-right: 30px;">




                    <div class="py-5 text-center" >
                        <img class="d-block mx-auto mb-8"
                            src="<?php echo $_smarty_tpl->tpl_vars['MEDIA']->value;?>
/images/Logo_PagSeguro.png" alt="" width="300"
                            height="100">
                        <h2>Finalize sua compra com segurança</h2>

                    </div>



                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Produtos</span>
                                <span class="badge badge-secondary badge-pill">3</span>
                            </h4>
                            <ul class="list-group mb-3">

                             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CARRINHO']->value, 'P');
$_smarty_tpl->tpl_vars['P']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['P']->value) {
$_smarty_tpl->tpl_vars['P']->do_else = false;
?> <!-- aqui vai pegar a lista de categorias ($CATEGORIAS) e cada categoria vai ser jogada em C uma por vez no loop-->
                                
                                    
                             <li class='list-group-item d-flex justify-content-between lh-condensed'><div><h6 class='my-0'><?php echo $_smarty_tpl->tpl_vars['P']->value['pro_nome'];?>
</h6><small class='text-muted'>Quantidade: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_qtd'];?>
</small></div><span class='text-muted'>Unidade: <?php echo $_smarty_tpl->tpl_vars['P']->value['pro_valor'];?>
</span></li>
                               
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </ul>

                            <input type="hidden" name="listarParaPix" id="listarParaPix" value="<?php echo $_smarty_tpl->tpl_vars['LISTAPARAPIX']->value;?>
"> <!-- esse input vai ser usado exclusivamente para o pix para listar todos os itens -->
                            

                            
                            <div class="jumbotron thumbnail1">
                                <label>Total produtos R$</label>
                                <input type="text" name="precoTotal" id="precoItem" readonly
                                    class="form-control form-control-lg pl-3  bg-success text-white"
                                    value="<?php echo $_smarty_tpl->tpl_vars['TOTAL_CARRINHO']->value;?>
">
                                <label>Frete R$</label>
                                <input type="text" name="freteProtutos" id="freteProtutos" readonly
                                    class="form-control form-control-lg pl-3 bg-secondary text-white"
                                    value="<?php echo $_smarty_tpl->tpl_vars['CLI_FRETE']->value;?>
">
                                <label>Valor Total R$</label>
                                <input type="text" name="valorTotal" id="valorTotal" readonly
                                    class="form-control form-control-lg pl-3 bg-primary text-white"
                                    value="<?php echo $_smarty_tpl->tpl_vars['CLI_TOTAL_FRETE']->value;?>
">
                            </div>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <form action="" id="formPagamento" name="formPagamento" class="needs-validation" novalidate>



                                <input type="hidden" name="emailLoja" id="emailLoja"
                                    value="<?php echo $_smarty_tpl->tpl_vars['EMAILVENDEDOR']->value;?>
">
                                <input type="hidden" name="moedaPagamento" id="moedaPagamento"
                                    value="<?php echo $_smarty_tpl->tpl_vars['MOEDA_PAGAMENTO']->value;?>
">
                                <input type="hidden" name="descontoTaxa" id="descontoTaxa" value="0.00">
                                <!-- <input type="hidden" name="tipoFrete" id="tipoFrete" value="<?php echo '<?php ';?>
echo $tipoFrete; <?php echo '?>';?>
"> -->
                                <input type="hidden" name="urlNotificacao" id="urlNotificacao"
                                    value="<?php echo $_smarty_tpl->tpl_vars['URL_NOTIFICACAO']->value;?>
">


                                <input type="hidden" name="referenceItem" id="referenceItem"
                                    value="<?php echo $_smarty_tpl->tpl_vars['CLI_REF']->value;?>
">
                                <!-- pode ser o numero da compra ou carrinho-->
                                <!-- aqui foi o total da venda vinda do banco de dados que vai ser utilizada para calcular as parcelas e juros nas funções do API nem processa_pag.php -->
                                <table>
                                    <tr>
                                        <td>
                                            <h4 class="mb-3">Comprador</h4>
                                        </td>
                                        <td> </td>
                                        <td style="padding-bottom: 11px;">
                                            <btn id="limparCampos" class="btn badge badge-primary">Limpar campos</btn>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nomeCompleto" id="nomeCompleto"
                                            placeholder="Nome completo" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_NOME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['CLI_SOBRENOME']->value;?>
">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>CPF</label>
                                        <input type="text" name="cpf" id="cpf" placeholder="CPF sem traço"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_CPF']->value;?>
" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="Email">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="email" name="iemail" id="iemail"
                                                placeholder="E-mail do comprador"
                                                value="<?php echo $_smarty_tpl->tpl_vars['CLI_EMAIL']->value;?>
"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-2 col-3 mb-3">
                                        <label>DDD</label>
                                        <input type="text" name="ddd" id="ddd" placeholder="DDD"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_DDD']->value;?>
" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-4 col-9 mb-3">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone" placeholder="somente números"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_FONE']->value;?>
" class="form-control"
                                            required>
                                    </div>
                                </div>


                                <table>
                                    <tr>
                                        <td>
                                            <h4 class="mb-3">Endereço de entrega</h4>
                                        </td>
                                        <td> </td>
                                        <td style="padding-bottom: 11px;">
                                            <btn class=" btn badge badge-primary" onclick="novoCep()">novo cep</btn>
                                        </td>
                                    </tr>
                                </table>

                                <div class="row">
                                    <div class="col-md-5 col-5 mb-3">
                                        <label>CEP</label>
                                        <input type="text" name="cep" id="cep" placeholder="sem hifen"
                                            class="form-control" required readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['CEP']->value;?>
">
                                    </div>
                                </div>

                                <input type="hidden" name="entrega" id="entrega" value="true">
                                <!-- true se vai ter entrega e false se nao tiver intrega -->

                                <div class="row">
                                    <div class="col-md-10 col-9 mb-3">
                                        <label>Logradouro</label>
                                        <input type="text" name="logradouro" id="logradouro" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-2 col-3 mb-3">
                                        <label>Numero</label>
                                        <input type="text" name="numero" id="numero" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 col-4 mb-3">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento" id="complemento" class="form-control">
                                    </div>
                                    <div class="col-md-7 col-8 mb-3">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" id="bairro" class="form-control" required>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-9 col-9 mb-3">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" id="cidade" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 col-3 mb-3">
                                        <label>Estado</label>
                                        <input type="text" name="estado" id="estado" class="form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="pais" id="pais" value="BRL">

                                <hr class="mb-4">




                                <div class="thumbnail">

                                    <h4 class="mb-3">Pagamento</h4>

                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="cartao" name="MetodoPagamento" type="radio"
                                                class="custom-control-input" value="creditCard" required
                                                onclick="tipoPagamento('creditCard')">
                                            <label class="custom-control-label" for="cartao">Cartão de crédito</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="debito" name="MetodoPagamento" type="radio"
                                                class="custom-control-input" value="eft" required
                                                onclick="tipoPagamento('eft')">
                                            <label class="custom-control-label" for="debito">Débito em conta</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="boleto" name="MetodoPagamento" type="radio"
                                                class="custom-control-input" value="boleto" required
                                                onclick="tipoPagamento('boleto')">
                                            <label class="custom-control-label" for="boleto">Boleto</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="pix" name="MetodoPagamento" type="radio"
                                                class="custom-control-input" value="pix" required
                                                onclick="tipoPagamento('pix')">
                                            <label class="custom-control-label" for="pix">Pix</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3 banco">
                                    <br>
                                    <label for="selecionaBanco" class="banco">Banco</label>
                                    <div class="input-group banco">

                                        <select name="selecionaBanco" id="selecionaBanco"
                                            class="custom-select d-block banco">
                                            <option value="" class="banco">selecione</option>
                                        </select>

                                        <div class="input-group-prepend banco">
                                            <span id="bandeiraBanco" class="input-group-text banco"></span>
                                        </div>
                                    </div>
                                </div>

                                <br class="cartao">
                                <h4 class="mb-3 cartao">Dados do Cartão</h4>

                                <div class="mb-3 cartao">
                                    <label for="numCartao" class="cartao">Número do cartão</label>
                                    <div class="input-group cartao ">

                                        <input type="text" name="numCartao" id="numCartao" class="form-control cartao"
                                            required>

                                        <div class="input-group-prepend cartao">
                                            <span id="bandeira-cartao"
                                                class="input-group-text cartao"></span>&nbsp;&nbsp;
                                            <span id="msg" class="cartao"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-4 mb-3">
                                        <label class="cartao">CVV do cartão</label>
                                        <input type="text" name="cvvCartao" id="cvvCartao" maxlength="3"
                                            placeholder="tres digitos xxx" value="123" class="form-control cartao"
                                            required>
                                    </div>
                                    <div class="col-md-4 col-4 mb-3">
                                        <label class="cartao">Mês de Validade</label>
                                        <input type="text" name="mesValidade" id="mesValida"
                                            placeholder="dois digitos xx" maxlength="2" value="12"
                                            class="form-control cartao" required>
                                    </div>
                                    <div class="col-md-4 col-4 mb-3">
                                        <label class="cartao">Ano de Validade</label>
                                        <input type="text" name="anoValidade" id="anoValidade"
                                            placeholder="quatro digitos xxxx" maxlength="4" value="2030"
                                            class="form-control cartao" required>
                                    </div>
                                </div>

                                <!-- <label> Bandeira do cartao</label> -->
                                <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">

                                <div class="col-md-4 mb-3 cartao" id="selectParcelas">
                                    <label for="state" class="cartao">Parcelas</label>
                                    <select name="qntParcelas" id="qntParcelas"
                                        class="custom-select d-block w-100 select-qnt-parcelas cartao" required>
                                        <option value="" class="cartao">Parcelas</option>
                                    </select>
                                </div>

                                <input type="hidden" name="parcelasSemJuros" id="parcelasSemJuros" value="3"
                                    class="cartao"> <!-- Parcelas sem juros que o vendedor vai assumir -->
                                <input type="hidden" name="valorParcelas" id="valorParcelas" class="cartao">
                                <!-- valor selecionado da parcela a ser enviado -->
                                <input type="hidden" name="tokenCartao" id="tokenCartao"><!-- Token do cartao -->

                                <table>
                                    <tr>
                                        <td>
                                            <h4 class="mb-3 cartao">Titular do cartão</h4>
                                        </td>
                                        <td> </td>
                                        <td style="padding-bottom: 11px;">
                                            <btn id="limparCamposCartao" class="btn badge badge-primary cartao">Limpar
                                                campos</btn>
                                        </td>
                                    </tr>
                                </table>



                                <div class="row cartao">
                                    <div class="col-md-5 mb-3 cartao">
                                        <label class="cartao">Nome no Cartão</label>
                                        <input type="text" name="nomeCartao" id="nomeCartao"
                                            placeholder="Nome igual ao escrito no cartão"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_NOME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['CLI_SOBRENOME']->value;?>
"
                                            class="form-control cartao" required>
                                    </div>
                                    <div class="col-md-3 col-6 mb-3 cartao">
                                        <label class="cartao">CPF do dono Cartão</label>
                                        <input type="text" name="cpfDonoCartao" id="cpfDonoCartao"
                                            placeholder="CPF apenas números"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CLI_CPF']->value;?>
"
                                            class="form-control cartao" required>
                                    </div>
                                    <div class="col-md-4 col-6 mb-3 cartao">
                                        <label class="cartao">Data de Nascimento</label>
                                        <input type="text" name="dataNascimentoDonoCartao" id="dataNascimentoDonoCartao"
                                            placeholder="Ex xx/xx/xxxx"
                                            value="<?php echo $_smarty_tpl->tpl_vars['DATANASCIMENTOCARTAO']->value;?>
"
                                            class="form-control cartao" required>
                                    </div>
                                </div>


                                <h4 class="mb-3 cartao">Endereço do titular do Cartão</h4>

                                <div class="custom-control custom-checkbox cartao">
                                    <input type="checkbox" class="custom-control-input cartao" id="same-address">
                                    <label class="custom-control-label cartao" for="same-address">Copiar endereço do
                                        comprador</label>
                                </div><br class="cartao">

                                <div class="row cartao">
                                    <div class="col-md-5 col-5 mb-3 cartao">
                                        <label class="cartao">CEP</label>
                                        <input type="text" name="cepDonoCartao" id="cepDonoCartao"
                                            placeholder="sem ífen" class="form-control cartao" required>
                                    </div>
                                </div>

                                <div class="row cartao">
                                    <div class="col-md-10 col-9 mb-3" cartao>
                                        <label class="cartao">Logradouro</label>
                                        <input type="text" name="logradouroDonoCartao" id="logradouroDonoCartao"
                                            class="form-control cartao" required>
                                    </div>
                                    <div class="col-md-2 mb-3 col-3 cartao">
                                        <label class="cartao">Numero</label>
                                        <input type="text" name="numeroDonoCartao" id="numeroDonoCartao"
                                            class="form-control cartao" required>
                                    </div>
                                </div>

                                <div class="row cartao">
                                    <div class="col-md-5 col-4 mb-3 cartao">
                                        <label class="cartao">Complemento</label>
                                        <input type="text" name="complementoDonoCartao" id="complementoDonoCartao"
                                            class="form-control cartao">
                                    </div>

                                    <div class="col-md-7 col-8 mb-3 cartao">
                                        <label class="cartao">Bairro</label>
                                        <input type="text" name="bairroDonoCartao" id="bairroDonoCartao"
                                            class="form-control cartao" required>
                                    </div>

                                </div>

                                <div class="row cartao">
                                    <div class="col-md-9 col-9 mb-3 cartao">
                                        <label class="cartao">Cidade</label>
                                        <input type="text" name="cidadeDonoCartao" id="cidadeDonoCartao"
                                            class="form-control cartao" required>
                                    </div>
                                    <div class="col-md-3 col-3 mb-3 cartao">
                                        <label class="cartao">Estado</label>
                                        <input type="text" name="estadoDonoCartao" id="estadoDonoCartao"
                                            class="form-control cartao" required>
                                    </div>
                                </div>


                                <input type="hidden" name="paisDoCartao" id="paisDoCartao" value="BRL">


                                <!-- <label> identificador com os dados do comprador</label> -->
                                <input type="hidden" name="identificador" id="identificador">
                                <!-- senderHash vai ser guardo aqui nesse input-->

                            </form>

                            <div class="col-md-12 pixClass">
                                <center>
                                    <button name="btnPix" id="btnPix" class="btn btn-primary btn-lg"
                                        onclick="finalizarComprar()">Gerar Qrcode</button>
                                    <div id="qrcode" style="margin-top: 30px;"> </div>
                                </center>
                            </div>

                            <hr>
                            <button name="btnComprar" id="btnComprar" class="btn btn-primary btn-lg btn-block"
                                onclick="finalizarComprar()">Finalizar</button><br>

                            <div id="btnComprarPix">
                            
                            <!-- esse input é para copiar o codigo qrcode  -->    
                            <input type="hidden" id="codPix1">
                            <button class="btn btn-primary btn-lg btn-block" onclick=" pixFinalizar()">Concluir após pagamento do pix</button><br>
                        </div>    
                        </div>


                    </div>
                </div>


                <!-- janela modal confirmando os dados -->
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confira os dados</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="container-fluid">

                                    <div class="col-md-6">
                                        <strong>Comprador</strong><br>
                                        Nome: <span id="mostraValorInput" class="text-muted"></span><br>
                                        CPF: <span id="mostraValorInput1" class="text-muted"></span><br>
                                        email: <span id="mostraValorInput2" class="text-muted"></span><br>
                                        Telefone: <span id="mostraValorInput3" class="text-muted"></span>-<span
                                            id="mostraValorInput4" class="text-muted"></span>
                                    </div>

                                    <div class="col-md-6 ml-auto">
                                        <strong>Endereço de entrega</strong><br>
                                        CEP: <span id="mostraValorInput5" class="text-muted"></span><br>
                                        Logradouro: <span id="mostraValorInput6" class="text-muted"></span><br>
                                        Número: <span id="mostraValorInput7" class="text-muted"></span><br>
                                        Complemento: <span id="mostraValorInput8" class="text-muted"></span><br>
                                        Bairro: <span id="mostraValorInput9" class="text-muted"></span><br>
                                        Cidade: <span id="mostraValorInput10" class="text-muted"></span><br>
                                        Estado: <span id="mostraValorInput11" class="text-muted"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Valores</strong><br>
                                        Total produtos: <span id="mostraValorInput12" class="text-muted"></span><br>
                                        Frete: <span id="mostraValorInput13" class="text-muted"></span><br>
                                        Valor Total: <span id="mostraValorInput14"
                                            class="text-muted text-primary"></span><br>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Editar
                                            dados</button>
                                        <button type="button" name="btnFinalizar" id="btnFinalizar" data-dismiss="modal"
                                            class="btn btn-primary" onclick="comprar()">Comprar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- modal alerta-->
                <!-- overflow-y:scroll é para rolagem-->
                <div class="modal fade" id="modalAlerta" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <!-- agora que a div do modal começa, as anteriores eram para configurações-->
                            <!-- modal-header é o cabeçaçho-->
                            <div class="modal-header" style="padding: 35px 50px;">

                                <h4 style="color: #448ed3;">Alerta</h4>

                            </div>

                            <!-- modal-body é o corpo-->

                            <div class="modal-body" style="padding: 40px 50px;">

                                <label id="alertaMensagem">Erro ao tentar abrir</label>

                            </div>

                            <!-- rodape-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>

                            </div>

                        </div>

                    </div>

                </div>





                    <!-- modal pix-->
                    <!-- overflow-y:scroll é para rolagem-->
                    <div class="modal fade" id="modalpix" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                        aria-hidden="true">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <!-- agora que a div do modal começa, as anteriores eram para configurações-->
                                <!-- modal-header é o cabeçaçho-->
                                <div class="modal-header" style="padding: 35px 50px;">

                                    <h4 style="color: #448ed3;">Código Qrcode</h4>

                                </div>

                                <!-- modal-body é o corpo-->

                                <div class="modal-body" style="padding: 40px 50px;">

                                    <span id="alertaPix">

                                        <?php echo '<?php  
       ';?>
if (!isset($_SESSION['PED']['pix'])) { 

        $pixx= "erro";
       }else{
        $pixx= $_SESSION['PED']['pix'];
       }
       <?php echo '?>';?>

                                        <center>
                                            <div id="qrcode"></div>

                                        </center>
                                    </span>

                                </div>

                                <!-- rodape-->

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>

                                </div>

                            </div>

                        </div>

                    </div>



                    <a href="#" id="foo"></a> <!-- vai fazer a div abaixo ir para o topo -->
                    <br>
                    <div class="container" id="bola">

                        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                            <div class="col-md-12 px-0">
                                <h1 class="display-5 font-italic">Compra efetuada com sucesso, obrigado pela preferência
                                </h1>
                                <p class="lead my-3">Segue abaixo o código da compra gerado pelo Pagseguro. A companhe o
                                    status de sua compra em meus pedidos.</p>
                            </div>
                        </div>

                        <div class="alert alert-primary" role="alert" id="bola2">
                            <!-- aqui vai receber o codigo do pagseguro da compra -->
                        </div>

                        <div class="row" id="bola4">
                            <div class="col-md-8 md-1 bg-light" id="bola1">
                            </div>
                            <div class="col-md-4 order-mb-3" id="bola3">
                            </div>
                        </div>

                        <hr class="mb-4">


                        <div class="row">
                            <div class="col-md-4 "></div>
                            <div class="col-md-4 "></div>
                            <div class="col-md-4 ">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['CLIENTEPEDIDO']->value;?>
" id="formPagamento1"
                                    name="formPagamento1" class="needs-validation" novalidate>
                                    <button name="btnComprar" id="btnComprar"
                                        class="btn btn-primary btn-lg btn-block">Ir Para Meus Pedidos</button><br>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="spinner"></div>


            </div>





        </div>



        <!-- coluna da esquerda -->
      <div class="col-md-2 bg-light" id="colunaEsquerda" >

        
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <a class="navbar-brand text-white" href="#">Categorias</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categorias1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
  
        </nav>
  
        <div  id="categorias1">
  
          <div class="navbar-nav mr-auto">


  
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
$_smarty_tpl->tpl_vars['C']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
$_smarty_tpl->tpl_vars['C']->do_else = false;
?> <!-- aqui vai pegar a lista de categorias ($CATEGORIAS) e cada categoria vai ser jogada em C uma por vez no loop-->
                
             <a nav-link href="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_link'];?>
" class="list-group-item nav-item" ><i class="fas fa-angle-right"></i> <?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</a> 
               
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  
  
          </div>
        </div>
  
          <!--fim da list group-->
  
        </div> <!-- finm coluna esquerda -->




        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/tema/js/qrcode.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMA']->value;?>
/tema/js/boleto3.js"><?php echo '</script'; ?>
>
        <!--<?php echo '<script'; ?>
 src="personalizado.js"><?php echo '</script'; ?>
>-->



    </div>



<br><br><?php }
}
