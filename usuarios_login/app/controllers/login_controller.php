<?php
    
    //Apenas para ambientes de teste
    //Remover quando for apresentar
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require __DIR__."/../repositories/user_repository.php";

    $base_path = "http://localhost";

    $user = $_POST['field_usuario'];
    $pass = $_POST['field_senha'];
    
    if (empty($user) OR empty($pass) ) {
        # se usuario ou senha estiverem vazios
        header("location: {$base_path}/index.php?msg=usuario ou senha vazios");
        exit;
    }

    $repository = new UserRepository();
    $usuario = $repository->findUserByLogin($user, $pass);

    print_r($usuario);
