<?php
    header("content-type: text/html;charset=utf-8");
    //Conex���o com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "ocorrencias";

    $connect = mysqli_connect($servername,$username,$password,$db_name,3306);

    if(mysqli_connect_error()):
        echo "Falha na conexão".mysqli_connect_error();
    endif;
    
    //Depois da tua conexão a base de dados insere o seguinte código abaixo.
    //Esta parte vai resolver o teu problema!
    mysqli_query($connect, "SET NAMES 'utf8'");
    mysqli_query($connect, 'SET character_set_connection=utf8');
    mysqli_query($connect, 'SET character_set_client=utf8');
    mysqli_query($connect, 'SET character_set_results=utf8');
?>