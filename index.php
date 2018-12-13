<?php
/**
 * @TODO animações ( X )
 * @TODO criar tabela ( V )
 *   - Adicionar data na tabela, no model e dao, e inserir no endpoint?
 * @TODO criar form ( V )
 * @TODO mandar dados, AJAX ( V )
 * @TODO conexão segura, reportando erros, try catche e bind ativo ( X )
 * @TODO Layout com bootstrap grid ( X )
 * @TODO validar dados no back e no front
 */
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de Contratação</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="32x32">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <!--[if lt IE 9]
        <script src="/assets/js/html5shiv.js" type="text/javascript"></script>
    [endif] -->
</head>
<body>
    <section class="section bgLightGray">
        <div class="container listas"><?php require './assets/html/lista.html'; ?></div>
    </section>
    <section class="section text-center">
        <div class="container">
            <h1 class="title tx-azul">Se liga nessa novidade</h1>
            <h2>O que é?</h2>
            <div class="texto-princial">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor lorem id congue luctus. Praesent vel purus finibus, rhoncus mauris et, aliquam dolor.</p>           
                <p>Praesent nisi mi, condimentum ut viverra at, consectetur non ipsum. Nulla facilisi. In tempor eleifend imperdiet. Proin mollis condimentum enim, a dictum felis pulvinar quis.</p>
            </div>
            <section class="row">
                <h2 class="col-lg-12">Lorem Ipsum?</h2>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/1.png" alt="1.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/2.png" alt="2.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/3.png" alt="3.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/4.png" alt="4.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/5.png" alt="5.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure class="col-xs-12 col-sm-4">
                    <img src="/assets/img/6.png" alt="6.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
            </section>
            <h2>Contrate agora</h2>
            <form id="caForm" class="caForm" method="post" action="/put/contato/">
                <legend>Faça um lorem ipsum</legend>
                <input class="form-control"type="text" name="nome" placeholder="Nome" required>
                <input class="form-control"type="text" name="email" placeholder="E-mail" required>
                <input class="form-control"type="text" name="numero" placeholder="Número" required>
                <input class="form-control"type="text" name="endereco" placeholder="Endereço" required>
                <input class="btnSubmit"type="submit" name="submit" value="Lorem ipsum agora">
            </form>
        </div>
    </section>
    <script>
        function submitCA(event) {
            event.preventDefault();
            var endpoint = caForm.getAttribute("action");
            var data = {
                nome : caForm.nome.value,
                email : caForm.email.value,
                numero : caForm.numero.value,
                endereco : caForm.endereco.value
            };
            $.post(endpoint, data, function (resp) {
                // @TODO usar a resposta para parar a animação
                // de rotação
                document.write(resp);
            });
        }
        
        caForm.submit.addEventListener("click", submitCA);
        window.addEventListener("load", function () {
            var options = {
                placeholder: "Número (DD) 00000-0000"
            };            
            $(caForm.numero).mask("(99) 99999-9999", options);
        });
    </script>
    <script src="/assets/js/jquery/jquery-2.1.1.min.js"></script>
    <script src="/assets/js/jquery/jquery.mask.min.js"></script>
    <script src="/assets/js/jquery/jquery.validate.min.js"></script>
</body>
</html>