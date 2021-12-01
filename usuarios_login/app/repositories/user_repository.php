<?php 

require __DIR__."/../database/connection.php";

class UserRepository {

    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    public function findUserByLogin(string $user, string $pass){
        $sql = "SELECT * FROM `usuarios` WHERE `usuario` = ? AND `senha` = ?";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $user);
        $statement->bindValue(2, sha1($pass));
        $statement->execute();
    
        if($statement->rowCount() == 0){
            header("location: index.php?msg=usuario ou senha nao estao corretos");
            exit;
        } else {
    
            $usuario_do_banco = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $usuario_do_banco;
    }
}