<?php
    header('Content-Type: application/json');
    /**
     * Endpoint da tabela contato
     * retorna as respostas em JSOn
     * Primeiro checa se todos os parametros estão presentes
     */
    if  (!isset($_POST['nome'], $_POST['email'], $_POST['numero'], $_POST['endereco'])) {
        http_response_code(422);
        echo json_encode(['mensagem' => 'Parâmetro(s) não setado(s)']);
        exit;
    }

    /* Paramêtros */
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $endereco = $_POST['endereco'];
    /**
     * tratando e testando parâmetros 
     * os que falharem recebem null
     */
    $nome = trim($nome);
    $nome = strlen($nome) > 2 ? $nome : null;
    $email = trim($email);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email: null;
    $numero = str_replace(['(', ')', ' ', '-'], '', $numero);
    $numero = preg_match('/^[0-9]+$/', $numero) ? $numero : '';
    $numero = strlen($numero) >= 10 ? $numero : null;
    $endereco = strlen($endereco) > 3 ? $endereco : null;;

    /* Checa se todos os parâmetros passaram no teste */
    if  (!isset($nome, $email, $numero, $endereco)) {
        http_response_code(422);
        echo json_encode(['mensagem' => 'Parâmetro(s) não setado(s)']);
        exit;
    }

    require '../../_backend/DBConnection.Class.php';
    require '../../_backend/dao/ContatoDAO.Class.php';
    require '../../_backend/model/Contato.Class.php';

    try {
        $contato = new Contato($nome, $email, $numero, $endereco);
        $contatoDAO = new ContatoDAO();
    
        $contatoDAO->save($contato);
        echo json_encode([
            'mensagem' => 'Contato cadastrado!',
        ]);
    } catch (Exception $ex) {
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(['mensagem' => 'Internal Server Error']);
    }
?>