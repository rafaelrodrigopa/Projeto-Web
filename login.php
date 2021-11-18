<?php
    include "./controllers/db_connect.php";

    $email = $_POST['email_app'];
    $senha = $_POST['senha_app'];

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql_login = "SELECT * FROM usuario WHERE name_user = :EMAIL AND senha = :SENHA";
    $stmt = $PDO->prepare($sql_login);
    $stmt->bindParam(':EMAIL',$email);
    $stmt->bindParam(':SENHA',$senha);
    $stmt->execute();

    if ($stmt->rowCount()>0) {
        $retornoApp = array("LOGIN"=>"SUCESSO");
    }else{
        $retornoApp = array("LOGIN"=>"ERRO");
    }
    echo json_encode($retornoApp);
?>