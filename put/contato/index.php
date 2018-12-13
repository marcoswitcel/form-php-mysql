<?php
    /**
     * Endpoint da tabela contato
     * Primeiro checa se todos os parametros estão presentes
     */
    if  (!isset($_POST['nome'], $_POST['email'], $_POST['numero'], $_POST['endereco'])) {
        # @TODO ver se consigo implementar code 422 com o ajax
        http_response_code(200);
        echo htmlentities('Parâmetro não setado');
        exit;
    }

    require '../../_backend/DBConnection.Class.php';
    require '../../_backend/dao/ContatoDAO.Class.php';
    require '../../_backend/model/Contato.Class.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $endereco = $_POST['endereco'];


    try {
        $contato = new Contato($nome, $email, $numero, $endereco);
        $contatoDAO = new ContatoDAO();
    
        $contatoDAO->save($contato);
        echo 'Dados Inseridos';
        // @TODO apagar esse visualizador
        foreach($_POST as $incoming) {
            echo htmlentities($incoming), '</br>';
        }
    } catch (Exception $ex) {
        error_log($e->getMessage());
        http_response_code(500);
        echo 'Internal Server Error';
    }
?>