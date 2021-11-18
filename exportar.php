<?php
        //header
        include_once './includes/header.php';
    ?>

    <title>Extração - Control of events</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">

    <link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/consulta.css">

    
    <?php 
        //Menu
        include_once './includes/nav.php';
        //Conexão
        require_once './controllers/db_connect.php';
        require_once './php_action/extrair.php';
    ?>
        <h1>Extração de lançamentos</h1>
        </div>
        <div class="container-fluid wrapper">
            <div class="row" style="margin-top: 20px;">
                    <div class="col">
                        <form action="" method="post">
                        DATA INÍCIO: <input class="form-control" type="datetime-local" name="dt-inicial" id="">
                    </div>
                    <div class="col">
                        DATA FIM: <input class="form-control" type="datetime-local" name="dt-final" id="">
                    </div>
                    <div class="col">                       
                        <button type="submit" class="btn btn-primary" name="btn-buscar" style="margin-top: 24px; width: 100%; background-color: #5bc0be; border: none;">BUSCAR</button>
                        </form>
                    </div>
                <div class="table-responsive" style="overflow: hidden; height: 500px; margin-left: 15px; margin-right: 15px; overflow: scroll;">
                <table class="table table-hover" style="text-align: center; margin-top: 20px;">
                    <thead class="thead-dark">
                        <tr >
                            <th scope="col" style="background-color: #0b132b;">Id</th>
                            <th scope="col" style="background-color: #0b132b;">Usuário</th>
                            <th scope="col" style="background-color: #0b132b;">Tipo de ocorrência</th>
                            <th scope="col" style="background-color: #0b132b;">Data do ocorrido</th>
                            <th scope="col" style="background-color: #0b132b;">Data do lançamento</th>
                            <th scope="col" style="background-color: #0b132b;">Quantidade</th>
                            <th scope="col" style="background-color: #0b132b;">Valor total</th>
                            <th scope="col" style="background-color: #0b132b;">Faixa etária</th>
                            <th scope="col" style="background-color: #0b132b;">Aparência</th>
                            <th scope="col" style="background-color: #0b132b;">Modus Operandi</th>
                            <th scope="col" style="background-color: #0b132b;">Sexo</th>
                            <th scope="col" style="background-color: #0b132b;">Etnia</th>
                            <th scope="col" style="background-color: #0b132b;">DP</th>
                            <th scope="col" style="background-color: #0b132b;">Número do B.O</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['btn-buscar'])):

                                $daraInicial = $_POST['dt-inicial'];
                                $daraFinal = $_POST['dt-final'];

                                $_SESSION['dtini'] = $daraInicial;
                                $_SESSION['dtfin'] = $daraFinal;

                                
                                //$loja = $dadosUsuario['loja'];

                               
                                $sql = "SELECT * FROM 
                                            ocorrencia 
                                        INNER JOIN 
                                            produto 
                                        ON 
                                            produto.id_ocorrencia = ocorrencia.idocorrencia 
                                        INNER JOIN 
                                            suspeito 
                                        ON suspeito.id_ocorrencia = ocorrencia.idocorrencia
                                        WHERE DATE(`data_hora_lancamento`) 
                                        BETWEEN '$daraInicial' AND '$daraFinal'";

                                $resultado = mysqli_query($connect, $sql);

                                if(mysqli_num_rows($resultado) > 0):

                                    
                                    while($dados = mysqli_fetch_array($resultado)):
                                    
                                    $id = $dados['id_usuario'];
                                    $sqlU = "SELECT * FROM usuario WHERE idusuario = '$id'";
                                    $res = mysqli_query($connect, $sqlU);
                                    $dadosUsuario = mysqli_fetch_array($res);    
                                    
                                ?>
                                    <tr> 
                                        <td><?php echo $dados['idocorrencia']; ?></td>
                                        <td><?php echo $dadosUsuario['name_user']; ?></td>
                                        <td><?php echo $dados['tipo_ocorrencia']; ?></td>
                                        <td><?php echo substr($dados['data_hora'],0,10); ?></td>
                                        <td><?php echo substr($dados['data_hora_lancamento'],0,10); ?></td>
                                        <td><?php echo $dados['quantidade']; ?></td>
                                        <td><?php echo $dados['valor_unit']; ?></td>
                                        <td><?php echo $dados['faixa_etaria']; ?></td>
                                        <td><?php echo $dados['aparencia']; ?></td>
                                        <td><?php echo $dados['modus_operandi']; ?></td>
                                        <td><?php echo $dados['sexo']; ?></td>
                                        <td><?php echo $dados['etnia']; ?></td>
                                        <td><?php echo $dados['dp']; ?></td>
                                        <td><?php echo $dados['numdp']; ?></td>

                                    </tr>

                                    <?php endwhile;
                                else:?>

                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>


                            <?php endif;
                            
                                else:
                            ?>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            
                            <?php
                                endif;
                            
                            ?>
                        </tbody>
                    </table>
                
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary" name="btn-extrair" style="margin-top: 24px; width: 100%; background-color: #5bc0be; border: none;">EXTRAIR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php 
        //Footer
        include_once './includes/footer.php';
    ?>



        