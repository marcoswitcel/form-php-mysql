<?php
/**
 * @TODO animações ( X )
 * @TODO criar tabela ( V )
 * @TODO criar form ( X )
 * @TODO mandar dados, AJAX ( X )
 * @TODO conexão segura, reportando erros, try catche e bind ativo ( X )
 * @TODO Layout com bootstrap grid ( X )
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
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--[if lt IE 9]
        <script src="/assets/js/html5shiv.js" type="text/javascript"></script>
    [endif] -->
</head>
<body>
    <section class="section bgGray">
        <div class="container"><?php require './assets/html/lista.html'; ?></div>
    </section>
    <section class="section">
        <div class="container">
            <h1>Se liga nessa novidade</h1>
            <h2>O que é?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor lorem id congue luctus. Praesent vel purus finibus, rhoncus mauris et, aliquam dolor.</p>           
            <p>Praesent nisi mi, condimentum ut viverra at, consectetur non ipsum. Nulla facilisi. In tempor eleifend imperdiet. Proin mollis condimentum enim, a dictum felis pulvinar quis.</p>
            <section>
                <h2>Lorem Ipsum?</h2>
                <figure>
                    <img src="/assets/img/1.png" alt="1.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure>
                    <img src="/assets/img/2.png" alt="2.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure>
                    <img src="/assets/img/3.png" alt="3.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure>
                    <img src="/assets/img/4.png" alt="4.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure>
                    <img src="/assets/img/5.png" alt="5.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
                <figure>
                    <img src="/assets/img/6.png" alt="6.png">
                    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit</figcaption>
                </figure>
            </section>
            <h2>Contrate agora</h2>
            <form class="caForm" action="">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="submit">
            </form>
        </div>
    </section>
</body>
</html>