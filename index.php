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
            <h2 class="title2">O que é?</h2>
            <div class="texto-princial">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor lorem id congue luctus. Praesent vel purus finibus, rhoncus mauris et, aliquam dolor.</p>           
                <p>Praesent nisi mi, condimentum ut viverra at, consectetur non ipsum. Nulla facilisi. In tempor eleifend imperdiet. Proin mollis condimentum enim, a dictum felis pulvinar quis.</p>
            </div>
            <section class="row lista-img">
                <h2 class=" title2 col-lg-12">Lorem Ipsum?</h2>
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
            <h2 class="title2CA">Contrate agora</h2>
            <form id="caForm" class="caForm" method="post" action="/post/contato/">
                <div id="containerResp" class="containerLoader">
                    <div class="caLoader"></div>
                </div>
                <legend>Faça um lorem ipsum</legend>
                <input class="form-control"type="text" minlength="3" name="nome" placeholder="Nome" required>
                <input class="form-control"type="email" name="email" placeholder="E-mail" required>
                <input class="form-control"type="text" name="numero" placeholder="Número de Telefone" required>
                <input class="form-control"type="text" minlength="3" name="endereco" placeholder="Endereço" required>
                <input class="btnSubmit"type="submit" name="submit" value="Lorem ipsum agora">

            </form>
        </div>
    </section>
    <script>
        function submitCA(event) {
            event.preventDefault();
            if ($(caForm).valid()) {
                var endpoint = caForm.getAttribute("action");
                var data = {
                    nome : caForm.nome.value,
                    email : caForm.email.value,
                    numero : caForm.numero.value,
                    endereco : caForm.endereco.value
                };
                caForm.setAttribute("class", "caForm sending");
                $.post(endpoint, data, function (resp) {
                    var strong = document.createElement("strong");
                    strong.innerText = resp.mensagem;
                    strong.setAttribute("style", "color: White;font-size: 1.6rem;")
                    containerResp.innerHTML = "";
                    containerResp.appendChild(strong);;
                }).fail(function (error) {
                    var status = error.status;
                    caForm.setAttribute("class", "caForm");
                    if (status >= 400 && status < 500) {
                        caForm.querySelector("legend").innerText = "Algum erro ocorreu ao enviar por favor tente novamente";
                        caForm.submit.value = "Tentar novamente";
                    } else {
                        caForm.querySelector("legend").innerText = "Desculpe o incômodo, por favor tente novamente mais tarde";
                        caForm.submit.setAttribute("disabled", "true");
                    }
                });;
            }
        }
        
        caForm.addEventListener("submit", submitCA);
        window.addEventListener("load", function () {
            var options = {
                placeholder: "Número de Telefone"
            };            
            $(caForm.numero).mask("(99) 99999-9999", options);
            $(caForm).validate({
                rules : {
                    numero : {
                        phoneNumber : true
                    }
                },
                messages : {
                    nome: {
                        required : "* Por favor insira seu nome",
                        minlength : "O nome deve ter no mínimo 3 caracteres"
                    },
                    email : {
                        required : "* Por favor insira seu email"
                    },
                    numero : {
                        required : "* Por favor insira seu número de telefone"
                    },
                    endereco : {
                        required : "* Por favor insira o seu endereço",
                        minlength : "O endereço deve ter no mínimo 3 caracteres"
                    }
                }
            });

            jQuery.validator.addMethod(
                "email",
                function (value, element) {
                    var regex = /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                    return regex.test(value);
                }, 
                "Por favor insira um e-mail válido: email@email.com"
            );
            jQuery.validator.addMethod(
                "phoneNumber",
                function (value, element) {
                    value = value.replace(/[(|)|\ |-]/g, "");
                    return /^[0-9]+$/.test(value) && value.length >= 10;
                },
                "Número no seguinte formato (DD) 99999-9999"
            );
        });
    </script>
    <script src="/assets/js/jquery/jquery-2.1.1.min.js"></script>
    <script src="/assets/js/jquery/jquery.mask.min.js"></script>
    <script src="/assets/js/jquery/jquery.validate.min.js"></script>
</body>
</html>