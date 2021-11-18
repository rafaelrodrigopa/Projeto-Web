<?php

    $dsn = "mysql:host=br140:3306;dbname=login;charset=utf8";
    $usuario = "palmte54";
    $senha = "";

    try {
        
        $PDO = new PDO($dsn, $usuario, $senha);

    } catch (PDOException $erro) {
        
        echo "conexao_erro";
        exit;

    }

?>