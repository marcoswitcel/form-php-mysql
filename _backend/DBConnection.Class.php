<?php /* @TODO ativar bind por banco na conexão */

/**
 * Classe responsável por segurar a conexão
 */
class DBConnection
{
    /* Objeto de conexão */
    private static $CON = null;
    /* Credenciais */
    private static $user = 'root';
    private static $password = '';
    /* Configurações */
    private static $dbname = 'testedb';
    private static $host = 'localhost';
    private static $port = 3306;

    /**
     * Abre conexão
     * Se houver erro grava no log
     */
    private static function openCon() {
        $host = DBConnection::$host;
        $port = DBConnection::$port;
        $dbname = DBConnection::$dbname;
        $user = DBConnection::$user;
        $password = DBConnection::$password;

        $conString = "mysql:host=$host;dbname=$dbname;port=$port";

        try {
            /* Pega a conexão e seta o modo de notificação de */
            DBConnection::$CON = new PDO($conString, $user, $password);
            DBConnection::$CON->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            /* Grava erro no log do apache */
            error_log($e->getMessage());
            throw new Exception('Conexão não estabelecida, verifique o log');
        }
        
        return DBConnection::$CON;
    }

    /**
     * Entrega uma conexão
     */
    public static function getCon() {
        if (DBConnection::$CON === null) {
            DBConnection::$CON = DBConnection::openCon();
        }
        return DBConnection::$CON;
    }
}
?>