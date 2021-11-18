<?php

    //Encerrando a sessão
    session_start();
    session_unset();
    session_destroy();

    //Conexão
    require_once './controllers/db_connect.php';

    //Inicia a sessão
    session_start();

    function clear($input){
        global $connect;
    
        //Sql
        $var = mysqli_escape_string($connect, $input);
    
        //XSS
        $var = htmlspecialchars($var);
        return $var;
    }

    if(isset($_POST['btn-entrar'])):
        $erros = array();

        $login = clear($_POST['usuario']);
        $senha = clear($_POST['senha']);

        if(empty($login) or empty($senha)):
            $erros[] = '<div class="alert alert-danger" role="alert" style="text-align: center;"> O campo login/senha precisa ser preenchido</div>';
        else:

                $sql = "SELECT * FROM usuario WHERE name_user = '$login'"; //Busca o usuario no banco
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);

                    if(password_verify($senha,$dados['senha'])):
                        $_SESSION['logado'] = true;
                        $_SESSION['usuario-logado'] = $dados['idusuario'];

                        $_SESSION['nivel'] = $dados['nivel'];
                        header('Location: ./home.php');
                    else:
                        $erros[] = '<div class="alert alert-danger" role="alert" style="text-align: center;">Usuário e senha não conferem</div>';
                    endif;

                else:
                    $erros[] = '<div class="alert alert-danger" role="alert" style="text-align: center;">Usuário inexistente</li>';
                endif;
        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Control of Events</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">

</head>

<body>
</body>
<div class="container-fluid background-login">
    <div class="container pn-login rd-10">
        <div class="row">
            <div class=" col pn-login-esquerdo">
            <ul style="margin-top: 40px;margin-bottom: -15px; margin-left: -15px; width: calc(100% - 8px);">
                    <?php
                        if(!empty($erros)):
                            foreach ($erros as $errs):
                                echo $errs;
                            endforeach;
                        endif;
                    ?>
                </ul>
                <div class="container-fluid logo-esquerdo">
                    <img src="./img/logo_um.png" alt="">
                </div>
                <h1>LOGIN
                </h1>
                <div class="form-group">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="sz-font" type="text" name="usuario" id="usuario" placeholder="USUÁRIO">
                        <input class="sz-font" type="password" name="senha" id="senha" placeholder="SENHA">
                        <!--input class="sz-font rd-10" type="button" value="ENTRAR"-->
                        <button class="btn btn-primary" type="submit" name="btn-entrar" style="background-color: #6bc0be; border: none; margin-top: 20px; height: 50px; color: #3A506B;">ENTRAR</button>
                    </form>
                </div>
            </div>
            <div class="col pn-login-direito"></div>
            <div class="logo-extenso-direito">
                <img class="rounded float-right" src="./img/logo_claro.png" alt="logo_branco">
            </div>
        </div>
    </div>
</div>

</html>