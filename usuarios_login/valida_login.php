<?php 
    $usuario = $_POST['field_usuario'];
    $senha   = $_POST['field_senha'];
    
    if (empty($usuario) OR empty($senha) ) {
        # se usuario ou senha estiverem vazios
        header("location: index.php?msg=usuario ou senha vazios");
        exit;
    }

    //conectar ao banco
    $host       = "localhost";
    $db         = "usuario_acl";
    $charset    = "utf8";
    $db_usuario = "root";
    $db_senha   = "root"; #bancodedados

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $connection = new PDO($dsn, $db_usuario, $db_senha);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e){
        print $e->getMessage();
    }

    $sql = "SELECT * FROM `usuarios` WHERE `usuario` = ? AND `senha` = ?";

    $statement = $connection->prepare($sql);
    $statement->bindValue(1, $usuario);
    $statement->bindValue(2, sha1($senha));
    $statement->execute();

    if($statement->rowCount() == 0){
        header("location: index.php?msg=usuario ou senha nao estao corretos");
        exit;
    } else {

        $usuario_do_banco = $statement->fetch(PDO::FETCH_ASSOC);
    } 

    print_r($usuario_do_banco);




    
