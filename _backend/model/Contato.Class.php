<?php
/* Model da tabela Contato */
class Contato
{
    /* Informação da Entidade contato, o id fica nulo */
    private $id = null;
    private $nome;
    private $email;
    private $numero;
    private $endereco;

    /* Construtor seta valores */
    public function Contato($nome, $email, $numero, $endereco) {
        $this->nome = $nome;
        $this->email = $email;
        $this->numero = $numero;
        $this->endereco = $endereco;
    }

    /* Getters */
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getEndereco() {
        return $this->endereco;
    }
}
?>