<?php
/* DAO da tabela Contato */
class ContatoDAO
{
    /* Objeto de conexão */
    private static $CON = null;

    public function ContatoDAO() {
        if (ContatoDAO::$CON === null) {
            /* DBConnection joga exceção caso a conexão falhe */
            ContatoDAO::$CON = DBConnection::getCon();
        }
    }

    /**
     * Insert método
     * recebe um objeto do tipo Contato
     */
    public function save($objContato) {
        $SQL = 'INSERT INTO contato (nome, email, numero, endereco) VALUES (?, ?, ?, ?)';
        $stmt = ContatoDAO::$CON->prepare($SQL);

        $stmt->bindValue(1, $objContato->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(2, $objContato->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(3, $objContato->getNumero(), PDO::PARAM_INT);
        $stmt->bindValue(4, $objContato->getEndereco(), PDO::PARAM_STR);
        
        $stmt->execute();
    }
}
?>