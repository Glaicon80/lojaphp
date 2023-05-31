
var total = ($('#valorTotal').val()).replace(".", "");
var amount = total.replace(",", "."); 
var gerarPix = false;


$('.cartao').hide();//vai ocultar os campos com os dados do cartao
$('.banco').hide();// vai ocultar os campos de debito em conta
$('.pixClass').hide(); // vai ocultar os dados do qrcode
$('#btnComprarPix').hide(); // vai ocultar o botão de pagamento do pix

pagamento();

var x = 0; // variavel vai ser utilizada no metodo que calcula o numero de parcelas

function pagamento(){

// função para gerar o id da sessão,(sem ele nao da pra fazer nada)
    $.ajax({
        url:"../controller/idSession.php",
        type: 'post',
        dataType:'json',
        success: function(retorno){
        //console.log(retorno.id)
        PagSeguroDirectPayment.setSessionId(retorno.id); //Com o ID de sessão obtido, você deve definí-lo no lado cliente com este codigo.
       
       listarMeiosPag(); //vai chamar a funcão logo abaixo
        },
        complete: function(retorno) {
        //console.log(retorno)
        }
        });
}


//função usada para mostrar e ocultar campos

function tipoPagamento(MetodoPagamento){

    senderHash();
    if(MetodoPagamento=='creditCard'){
        $('.banco').hide();
        $('.pixClass').hide();
        $('.cartao').show();
        $('#btnComprar').show();
        $('#btnComprarPix').hide();
    }else if(MetodoPagamento=='eft'){
        $('.cartao').hide();
        $('.pixClass').hide();
        $('.banco').show();
        $('#btnComprar').show();
        $('#btnComprarPix').hide();
    }else if (MetodoPagamento=='boleto'){
        $('.banco').hide();
        $('.pixClass').hide();
        $('.cartao').hide();
        $('#btnComprar').show();
        $('#btnComprarPix').hide();
    }else if (MetodoPagamento=='pix'){
        $('.banco').hide();
        $('.cartao').hide();
        $('.pixClass').show();
        $('#btnComprar').hide();

        if(gerarPix){
            $('#btnComprarPix').show();
        }

    }
}



//funcção para listar todos os meios de pagamento e as bandeiras (esta no rodapé do html)
function listarMeiosPag(){
    
    PagSeguroDirectPayment.getPaymentMethods({
        
        amount: amount,
       
        success: function(retorno) {

           //console.log(retorno);
         //  $('.meio-pag').append("<div>Cartão de Credito</div>"); // append vai criar um elemento filho em .meio-pag
          // $.each(retorno.paymentMethods.CREDIT_CARD.options,function(i, value){ // $.each funciona como um for, vai fazer loop e percorrer um array --> a extrutura do $.each(array, function(posição do elemento no array, valor do elemento no array){})
          // $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + value.images.SMALL.path +"'></span>")
      //  })
       // $('.meio-pag').append("<div>Boleto</div>");
       // $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/booklet.png'></span>");
        
       // $('.meio-pag').append("<div>Debito online   </div>");
        //   $.each(retorno.paymentMethods.ONLINE_DEBIT.options,function(i, value){
         //  $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + value.images.SMALL.path +"'></span>")
           
       // })
        // aqui vai aproveitar esta função e preencher o select com os nomes dos bancos para debito online
        $.each(retorno.paymentMethods.ONLINE_DEBIT.options,function(i,value){
           
            $('#selecionaBanco').append("<option value='"+value.name+"'>"+value.displayName+"</option>");
        });
        //$('.banco').hide(); //vai ocultar os campos depois que carregar os bancos no select
    },
        error: function(retorno) {
            
            console.log('Erro na consulta PagSeguroDirectPayment.getPaymentMethods ')
            
        },
        complete: function(retorno) {
            
        }
    });
}


// imagem da bandeira do banco no select
$('#selecionaBanco').on('change', function(){ //change é um evento que é acionado qdo o valor do select muda.
   var bandBanco=$('#selecionaBanco').val();
//console.log(bandBanco);
$('#imgBandeira').remove();
PagSeguroDirectPayment.getPaymentMethods({
    amount: amount,
    success: function(retorno) {
    $.each(retorno.paymentMethods.ONLINE_DEBIT.options,function(i,value){
        if(value.name==bandBanco){
     $('#bandeiraBanco').append("<img id='imgBandeira' src='https://stc.pagseguro.uol.com.br" + value.images.SMALL.path +"'>");
    }}); 
    },
    error: function(retorno) {
        // Callback para chamadas que falharam.
    },
    complete: function(retorno) {
        // Callback para todas chamadas.
    }
});
});


// identificador com os dados do comprador (senderHash )
function senderHash() { // escolhi a chamada dessa função para gerar o senderHash qdo digitar o nome do comprador, pois assim que foi recomendado pelo pagseguro
    PagSeguroDirectPayment.onSenderHashReady(function(retorno){
        if(retorno.status == 'error') {
            console.log(retorno.message);
            return false;
        }else{
        var hash = retorno.senderHash; //Hash estará disponível nesta variável.

        $('#identificador').val(hash);
        }
    });

    };





    // aqui, a medida que for digitando o numero do cartao vai pegando os dados
    $('#numCartao').on('keyup', function(){
        var numCartao= $(this).val();
        var qntNumero=numCartao.length; // lenggth vai pegar o numero de caracteres
        //console.log(numCartao);
        
        if(qntNumero==16){//apartir de seis digitos ja é possivel verificar a bandeira do cartao
        PagSeguroDirectPayment.getBrand({
            cardBin: numCartao,
            success: function(retorno) {
                $('#msg').empty(); //vai limpar o span
             // console.log(retorno);
             var imgBandeira = retorno.brand.name;
            $('#bandeira-cartao').html("<img src = 'https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+ imgBandeira +".png'>");
            recupParcelas(imgBandeira);//aqui vai ser chamada a função que lida com as parcelas e enviando junto o nome da empresa do cartão
            $('#bandeiraCartao').val(imgBandeira);  
        },
            error: function(retorno) {
                $('#bandeira-cartao').empty();// vai limpar pois vai ser vazio
                $('#msg').html("<strong>Cartão invalido</strong>")
            },
            complete: function(retorno) {
              //tratamento comum para todas chamadas
            }
        });}
        
        });

        
         //recuperar o numero de parcelas e o valor das parcelas
                
         function recupParcelas(bandeira){

            if(x===0){
            
                x+=1; // foi utilizado essa variavel para que se entre nesse metodo apenas uma vez, pois senão o select vai repetir as parcelas

            //$('#qntParcelas').html('<option value ="" class="cartao">Selecione</option>'); //vai limpar a seleção anterior se ouver
            PagSeguroDirectPayment.getInstallments({
                amount: amount,//valor total da compra
                maxInstallmentNoInterest: $('#parcelasSemJuros').val(), //numero de parcelas sem juros que o vendedor vai assumir
                brand: bandeira,//nome da empresa do cartao
                success: function(retorno){
                  // console.log(retorno);
                  $.each(retorno.installments,function(ia,obja){
                   $.each(obja, function(ib,objb){
                    var valorParcela=objb.installmentAmount.toFixed(2).replace(".",",");
                    $('#qntParcelas').show().append("<option value='"+objb.quantity+ "' data-parcelas='"+objb.installmentAmount+"'  class='cartao'>"+objb.quantity+" parcelas de R$ "+valorParcela+"</option>");
        
                   });
                  });
               },
                error: function(retorno) {
                    // callback para chamadas que falharam.
               },
                complete: function(retorno){
                    // Callback para todas chamadas.
               }
        });
        }
        }


        
        //enviar valor da parcela para formulario
        $('#qntParcelas').change(function(){ //qdo ele selecionar a parcela no select vai acionar essa função
        
          $('#valorParcelas').val($('#qntParcelas').find(':selected').attr('data-parcelas')) ;// vai estar enviando para o campo valorParcela  o valor que estiver no campo
        })       
        
        //qntParcelas, que estiver selecionado (find(':selected')) e pegar o que estiver no atributo data-parcelas attr('data-parcelas')

    
    
    
    
    
    
        //recuperar o token do cartao de credito

    function comprar(){ 

        document.getElementById('spinner').style.display = 'block';

    event.preventDefault();     // event.preventDefault() vai impedir o reload da pagina e impedir que vc perda todos os dados do formulario , parecido com o ajax
    var paymentMethod=document.querySelector('input[name="MetodoPagamento"]:checked').value;        
    //console.log(paymentMethod);
      
        if (paymentMethod=='creditCard') {
                
            PagSeguroDirectPayment.createCardToken({
                cardNumber: $('#numCartao').val(), // Número do cartão de crédito
                brand: $('#bandeiraCartao').val(), // Bandeira do cartão
                cvv: $('#cvvCartao').val(), // CVV do cartão 
                expirationMonth: $('#mesValida').val(), // Mês da expiração do cartão 
                expirationYear: $('#anoValidade').val(), // Ano da expiração do cartão, é necessário os 4 dígitos. 
                success: function(retorno) {
                     //console.log(retorno);
                $('#tokenCartao').val(retorno.card.token);
                
                pegaDadosFormulario()
                 
            },
                error: function(retorno) {
                         // Callback para chamadas que falharam.
                },
                complete: function(retorno) {
                     // Callback para todas chamadas.
                }
             })
            
        } else if (paymentMethod=='boleto') {

            pegaDadosFormulario()   
            
        }else if (paymentMethod=='eft'){

            pegaDadosFormulario()
           // window.location.href=retorna.dados.paymentLink;
        }else if (paymentMethod=='pix'){

            pixCobranca()
          
        }
        }







        function pegaDadosFormulario(){ //essa função vai ser chamada no if no final desse codigo para pegar todos os dados fornecidos para serem tratados em processa_pag.phh
        
            var dados=$('#formPagamento').serialize(); //o serialize vai pegar todos os valores dos elementos do formulario, neste caso os inputs, e colocar num string
           // console.log(dados);  
            $.ajax ({
                method:"post",
                url:"../controller/processa_pag.php",
                //url:"../lojaphp2/controller/teste.php",
                data: dados,
                dataType: 'json',
                success: function(retorna){
                    document.getElementById('spinner').style.display = 'none'; // display: none é comumente usado com JavaScript para ocultar e mostrar elementos sem excluí-los e recriá-los. 
                   // console.log("sucesso: "+JSON.stringify(retorna));//JSON.stringify() converte valores em javascript para uma String  JSON
                   
                  
                   $('#divQseraoculta').hide(); // vai ocultar todo formulario
                   
                   $('#bola2').append("<h4 class='mb-3'>Codigo: "+retorna.dados.code+"</h4>")
    
                    switch (retorna.dados.status) {
                            case '1':
                            $('#bola1').append("<h5 class='mb-3 text-primary'>Status: Aguardando pagamento</h5>")
                            break;
                            case '2':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Em análise</h5>")
                            break;
                            case '3':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Paga</h5>")
                            break;
                            case '4':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Disponível</h5>")
                            break;
                            case '5':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Em disputa</h5>")
                            break;
                            case '6':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Devolvida</h5>")
                            break;
                            case '7':
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Cancelada</h5>")
                            break;
                        default:
                            $('#bola1').append("<h5 class='mb-3 text-primary'> Status: Erro: status não expecificado</h5>")
                            break;
                    }
                  
                    switch (retorna.dados.paymentMethod.type) {
                            case '1':
                            $('#bola1').append("Método de pagamento: <span>Cartão de Crédito</span><br>")
                            break;
                            case '2':
                            $('#bola1').append("Método de pagamento: <span>Boleto</span><br>")
                            break;
                            case '3':
                            $('#bola1').append("Método de pagamento: <span>Débito Online</span><br>")
                            break;
                            default:
                            $('#bola1').append("Método de pagamento: <span>Erro: método de pagamento não identificado</span><br>")
                            break;
                        }
    
                   $('#bola3').append("<h5 class='mb-3'>Valor: "+retorna.dados.grossAmount+"</h5>")
                   $('#bola1').append("Desconto: <span>"+retorna.dados.discountAmount+"</span><br>")
                   $('#bola1').append("Número de parcelas: <span>"+retorna.dados.installmentCount+"</span><br>")
                   if (retorna.dados.paymentMethod.type==='3') {
                    $('#bola3').append("<h5 class='mb-3'>Extrato banco: <a href="+retorna.dados.paymentLink+">Link</a></h5")
                   }
                   if (retorna.dados.paymentMethod.type==='2') {
                    $('#bola3').append("<h5 class='mb-3'>Boleto: <a href="+retorna.dados.paymentLink+">Link</a></h5")
                   }
                   $('#bola1').append("Carrinho: <span>"+retorna.dados.reference+"</span><br><br>")
    
                   

                   document.getElementById('bola').style.display = 'block';
                   document.getElementById('colunaEsquerda').style.marginTop ='2%';
                   window.location.href='#foo'; // vai fazer o scroll parar no link do html, no topo da div.
                },
                error: function(retorna){
                    document.getElementById('spinner').style.display = 'none';
                    console.log(retorna);
                    $('#msg1').val("Transação não efetuada");
                }    
            });
    
        }
        


        function pixCobranca(){ 

            document.getElementById('spinner').style.display = 'block';
            let cliente = $('#nomeCompleto').val();
            let cpf = $('#cpf').val();
            let valorTotalComPto = amount; // tem que usar pto no decimal para atender a api pix
            let valorTotal = $('#valorTotal').val()
            let totalProtudos = $('#precoItem').val()
            let frete = $('#freteProtutos').val()
            let itens = $('#listarParaPix').val()

            $.ajax ({
               method:"post",
               url:"../controller/gerar-qrcode-dinamico.php",
               //url:"../lojaphp2/controller/teste2.php",
               data: {valorTotalComPto:valorTotalComPto,cliente:cliente,cpf:cpf,valorTotal:valorTotal,totalProtudos:totalProtudos,frete:frete,itens:itens},
                dataType: 'json',
                success: function(retorna){
                 document.getElementById('spinner').style.display = 'none';
                 console.log(JSON.stringify(retorna));
        
                 $("#qrcode").empty() // vai limpar a div caso chame novamente a função
                
                 if(retorna.payloadQrCode != null){
                
                 new QRCode(document.getElementById("qrcode"),{
                 text: retorna.payloadQrCode,
                 with: 200,
                 height: 200,
                 typeNumber: 10,
                 correctLevel: 0
                 });

                 gerarPix =true; 

                 $("#qrcode").append('<btn class="btn badge badge-primary copyTest" style="margin-top: 30px;">Copiar código pix</btn>') // esse botão vai aparecer caso o cliente queira copiar o codigo

                 $('#btnComprarPix').show(); // o botao de concluir vai aparecer só na hora que gerar o pix
                 var copyTest = document.querySelector('.copyTest');
                 copyTest.addEventListener('click', function(event) {
                 copyTextToClipboard(retorna.payloadQrCode);
                 }); 
                 
                }else{
            
                $('#qrcode').html("<h5 class='mb-3 text-primary'> "+retorna.error_messages[0].description+"</h5>")
                $('#btnComprarPix').hide(); 
            } 
                 
                },
                error: function(retorna){
                    document.getElementById('spinner').style.display = 'none';
                    console.log(retorna);
                    $('#msg1').val("Não foi possível gerar qrcode");
                    $('#btnComprarPix').hide();
                }    
            });
    
        }



        // função para copiar codigo pix para a area de transferência
        function copyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
          
            textArea.style.position = 'fixed';
            textArea.style.top = 0;
            textArea.style.left = 0;
            textArea.style.width = '2em';
            textArea.style.height = '2em';
            textArea.style.padding = 0;
            textArea.style.border = 'none';
            textArea.style.outline = 'none';
            textArea.style.boxShadow = 'none';
            textArea.style.background = 'transparent';
            textArea.value = text;
          
            document.body.appendChild(textArea);
            textArea.select();

            $("#qrcode").empty();
          
            try {
              var successful = document.execCommand('copy');
              var msg = successful ? 'Código pix copiado com sucesso' : 'Falha ao copiar código';
              $("#qrcode").append('<div class="alert-box success">'+msg+'</div>') //essa div vai estar associada ao codigo css em pagamento para dar o efeito de aparecer e desaparecer
              
            } catch (err) {
              alert.log('Oops, não foi possível copiar código');
              window.prompt("Copie para área de transferência: Ctrl+C e tecle Enter", text);
            }
          
            document.body.removeChild(textArea);
          }









         // função que vai finalizar o pedido via pix ao apertar o botão Concluir após pagamento do pix 
          function pixFinalizar(){

            document.getElementById('spinner').style.display = 'block';

            var dados=$('#formPagamento').serialize(); //o serialize vai pegar todos os valores dos elementos do formulario, neste caso os inputs, e colocar num string
            // console.log(dados);  
             $.ajax ({
                 method:"post",
                 url:"../controller/processa_pag_pix.php",
                 //url:"../lojaphp2/controller/teste.php",
                 data: dados,
                 dataType: 'json',
                 success: function(retorna){
                     document.getElementById('spinner').style.display = 'none'; // display: none é comumente usado com JavaScript para ocultar e mostrar elementos sem excluí-los e recriá-los. 
                    // console.log("sucesso: "+JSON.stringify(retorna));//JSON.stringify() converte valores em javascript para uma String  JSON
                    
                   
                    $('#divQseraoculta').hide(); // vai ocultar todo formulario
                    
                    $('#bola2').append("<h6>Codigo: "+retorna.txid+"</h6>")
     
                   
                    $('#bola1').append("<h5 class='mb-3 text-primary'>Status: "+retorna.status+"</h5>")
                           
                   
                    $('#bola1').append("Método de pagamento: <span>Pix</span><br>")
                             
     
                    $('#bola3').append("<h5 class='mb-3'>Valor: "+retorna.valor+"</h5>")

                    $('#codPix1').val(retorna.codPix) // esse input vai receber o codigo de pagamento que vai ser usado na função codigoPix()
                    
                    $('#bola3').append("Copie o código pix abaixo para efetuar pagamento caso ainda não tenha pago.")
                    $('#bola3').append("<h5 class='mb-3 text-danger' onclick='codigoPix()' >CODIGO</h5>")
                  
                    $('#bola1').append("Carrinho: <span>"+retorna.ref+"</span><br><br>")
     
 
                    document.getElementById('bola').style.display = 'block';
                    document.getElementById('colunaEsquerda').style.marginTop ='2%';
                    window.location.href='#foo'; // vai fazer o scroll parar no link do html, no topo da div.
                 },
                 error: function(retorna){
                     document.getElementById('spinner').style.display = 'none';
                     console.log(retorna);
                     $('#msg1').val("Transação não efetuada");
                 }    
             });
     


          }








        
        
        


        //funçao que pega o cep do comprador e retorna os dados do endereço (pelo site ViaCEP)
        $('#cep').change(function(){    

            var Dados=$(this).serialize(); //aqui vamos pegar o cep e serializa-lo para ser enviado. Os valores serializados podem ser usados ​​na string de consulta de URL ao fazer uma solicitação AJAX
            var cep = $('#cep').val();
            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                method:'get',
                dataType:'json',
                data:Dados,
                success: function(Dados){
                    $('#logradouro').val(Dados.logradouro); 
                    $('#bairro').val(Dados.bairro);
                    $('#cidade').val(Dados.localidade);
                    $('#estado').val(Dados.uf);
                }
            });
        });


//FRETE valor e prazo API dos correios
$('[name="radio"]').on('click',function(){    
    var recebe=""
    var Dados = "";
    var frete ="";
        recebe=$('[name="radio"]:checked').val();
        if(recebe==1){
            frete="04510";
        }else if (recebe==2) {
            frete="04014";
        }
        Dados=$('#cep').val();
        $.post('frete.php',{Dados:Dados,frete:frete},function(Dados){
            var retorno = Dados.split("-");  // split vai dividir a string em um array, e divisão dos elementos sera no hiffen "-"
            var valorTotalCompra=$('#precoItem').val();
            var SomaTotal = (parseFloat(valorTotalCompra)+parseFloat(retorno[1].replace(",",".")));
           $('#tempoFrete').val(retorno[0]);
           $('#valorFrete').val(retorno[1].replace(",","."));
           $('#valorTotal').val(SomaTotal.toFixed(2)); 
           $('#freteProtutos').val(retorno[1]);
           
        });
        pagamento();
});


//copiar o endereço do comprador para o endereço do dono do cartão
$('#same-address').on('click',function(){    
$('#cepDonoCartao').val($('#cep').val());
$('#logradouroDonoCartao').val($('#logradouro').val());
$('#numeroDonoCartao').val($('#numero').val());
$('#complementoDonoCartao').val($('#complemento').val());
$('#bairroDonoCartao').val($('#bairro').val());
$('#cidadeDonoCartao').val($('#cidade').val());
$('#estadoDonoCartao').val($('#estado').val());
});



// vai limpar os campos dos dados pessoas do comprador
    $('#limparCampos').on('click',function(){    
    $('#nomeCompleto').val("");
    $('#cpf').val("");
    $('#email').val("");
    $('#ddd').val("");
    $('#telefone').val("");
    
    });


    // vai limpar os campos dos dados pessoas do dono do cartao
    $('#limparCamposCartao').on('click',function(){    
        $('#nomeCartao').val("");
        $('#cpfDonoCartao').val("");
        $('#dataNascimentoDonoCartao').val("");

        });





//funçao que pega o cep do dono do cartao e retorna os dados do endereço (pelo site ViaCEP)
$('#cepDonoCartao').change(function(){    

    var Dados=$(this).serialize();
    var cep = $('#cepDonoCartao').val();
    $.ajax({
        url: 'https://viacep.com.br/ws/'+cep+'/json/',
        method:'get',
        dataType:'json',
        data:Dados,
        success: function(Dados){
            $('#logradouroDonoCartao').val(Dados.logradouro);
            $('#bairroDonoCartao').val(Dados.bairro);
            $('#cidadeDonoCartao').val(Dados.localidade);
            $('#estadoDonoCartao').val(Dados.uf);
        }
    });
});




// pegando os dados do formulario e jogando na janela modal
function preencherModalFinalizacao(){  
    event.preventDefault();
    $("#mostraValorInput").text($("#nomeCompleto").val());
    $("#mostraValorInput1").text($("#cpf").val());
    $("#mostraValorInput2").text($("#iemail").val());
    $("#mostraValorInput3").text($("#ddd").val());
    $("#mostraValorInput4").text($("#telefone").val());
    $("#mostraValorInput5").text($("#cep").val());
    $("#mostraValorInput6").text($("#logradouro").val());
    $("#mostraValorInput7").text($("#numero").val());
    $("#mostraValorInput8").text($("#complemento").val());
    $("#mostraValorInput9").text($("#bairro").val());
    $("#mostraValorInput10").text($("#cidade").val());
    $("#mostraValorInput11").text($("#estado").val());
    $("#mostraValorInput12").text($("#precoItem").val());
    $("#mostraValorInput13").text($("#freteProtutos").val());
    $("#mostraValorInput14").text($("#valorTotal").val());

    modalFinalizar(); // chamar a janela modal finalizar pedido

    };



    // função para validar todos os campos do formulario

      function finalizarComprar(){   

        const nomeCompleto = document.getElementById("nomeCompleto").value
        const cpf = document.getElementById("cpf").value
        const email = document.getElementById("iemail").value
        const ddd = document.getElementById("ddd").value 
        const telefone = document.getElementById("telefone").value

        const cep = document.getElementById("cep").value
        const logradouro = document.getElementById("logradouro").value
        const numero = document.getElementById("numero").value
        const complemento = document.getElementById("complemento").value
        const bairro = document.getElementById("bairro").value
        const cidade = document.getElementById("cidade").value
        const estado = document.getElementById("estado").value
        


        const numCartao = document.getElementById("numCartao").value
        const cvvCartao = document.getElementById("cvvCartao").value
        const mesValida = document.getElementById("mesValida").value
        const anoValidade = document.getElementById("anoValidade").value
        const nomeCartao = document.getElementById("nomeCartao").value
        const cpfDonoCartao = document.getElementById("cpfDonoCartao").value
        const dataNascimentoDonoCartao = document.getElementById("dataNascimentoDonoCartao").value
        const cepDonoCartao = document.getElementById("cepDonoCartao").value
        const logradouroDonoCartao = document.getElementById("logradouroDonoCartao").value
        const numeroDonoCartao = document.getElementById("numeroDonoCartao").value
        const bairroDonoCartao = document.getElementById("bairroDonoCartao").value
        const cidadeDonoCartao = document.getElementById("cidadeDonoCartao").value
        const estadoDonoCartao = document.getElementById("estadoDonoCartao").value

        if(nomeCompleto.trim()=="" || cpf.trim()=="" || email.trim()=="" || ddd.trim()=="" ||
        telefone.trim()=="" || cep.trim()=="" || logradouro.trim()=="" || numero.trim()=="" ||
        bairro.trim()=="" || cidade.trim()=="" || estado.trim()==""){

            abrirModalAlerta('Preencha todos os campos referente ao comprador ou endereço de entrega')

        }else{

         if ($("#cartao").prop("checked") ) {
        
            if(numCartao.trim()=="" || cvvCartao.trim()=="" || mesValida.trim()=="" || anoValidade.trim()=="" ||
            nomeCartao.trim()=="" || cpfDonoCartao.trim()=="" || dataNascimentoDonoCartao.trim()=="" || cepDonoCartao.trim()=="" ||
            logradouroDonoCartao.trim()=="" || numeroDonoCartao.trim()=="" || bairroDonoCartao.trim()=="" || cidadeDonoCartao.trim()=="" || estadoDonoCartao.trim()==""){

                abrirModalAlerta('Preencha todos os campos referente ao cartão de crédito')

            }else if($('#qntParcelas').val().trim() === '') {

                abrirModalAlerta('Selecione o número de parcelas')
        
            }else{

                preencherModalFinalizacao();

            }

        }else if($("#debito").prop("checked")){

            if ($('#selecionaBanco').val().trim() === '') {

                abrirModalAlerta('Selecione seu banco para pagamento no débito')
        
            }else{

                preencherModalFinalizacao();

            }

        }else if($("#boleto").prop("checked")){

            preencherModalFinalizacao();

        }else if($("#pix").prop("checked")){

            preencherModalFinalizacao();

        }
        else{

            abrirModalAlerta('Selecione um tipo de pagamento')

        }

    }

        };     
        



        
        //modal para erros de validação do formulario
        function abrirModalAlerta(mensagem){
    

            $("#modalAlerta").modal()
            document.getElementById("alertaMensagem").innerText = mensagem
            
            
            }




         //modal para finalizar pedido
        function modalFinalizar(){
    

            $("#modalExemplo").modal()
                       
            
            }


