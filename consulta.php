<?php
        //header
        include_once './includes/header.php';
    ?>

    <title>Consulta - Control of events</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Compiled and minified JavaScript>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script-->

    <link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/consulta.css">

    
    <?php 
        //Menu
        include_once './includes/nav.php';
        //Conexão
        require_once './controllers/db_connect.php';
    ?>
            <h1>Consulta de lançamentos</h1>
        </div>
        <div class="container-fluid wrapper">

        <?php require_once './includes/mensagem.php'; ?>

            <div class="table-responsive" style="overflow: hidden; height: calc(100% - 80px); margin-right: 15px; overflow: scroll;">
                <table class="table table-hover" style="text-align: center; overflow: scroll;">
                    <thead class="thead-dark">
                        <tr >
                            <th scope="col" style="background-color: #0b132b;"></th>
                            <th scope="col" style="background-color: #0b132b;"></th>

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
                        
                             $data_atual = new DateTime();
                             $data_atual->format('d-m-Y H:i:s');
                            
                            $id = $_SESSION['usuario-logado'];
                            $sqlU = "SELECT * FROM usuario WHERE idusuario = '$id'";
                            $res = mysqli_query($connect, $sqlU);
                            $dadosUsuario = mysqli_fetch_array($res);

                            $loja = $dadosUsuario['loja'];

                            if($dadosUsuario['nivel'] == 'FISCAL'):
                                $sql = "SELECT O.idocorrencia,
                                            O.id_usuario,
                                            O.tipo_ocorrencia,
                                            O.data_hora,
                                            O.data_hora_lancamento,
                                            P.quantidade,
                                            P.valor_unit,
                                            S.faixa_etaria,
                                            S.aparencia,
                                            S.modus_operandi,
                                            S.sexo,
                                            S.etnia,
                                            S.aparencia,
                                            O.dp, 
                                            O.numdp,
                                            U.name_user
                                        FROM
                                            produto P
                                        INNER JOIN
                                        ocorrencia O
                                        ON P.id_ocorrencia = O.idocorrencia
                                        INNER JOIN
                                        usuario U
                                        ON U.idusuario = O.id_usuario
                                        INNER JOIN
                                        suspeito S
                                        ON S.id_ocorrencia = O.idocorrencia WHERE U.loja = '$loja'";
                            else:
                                $sql = "SELECT O.idocorrencia,
                                            O.id_usuario,
                                            O.tipo_ocorrencia,
                                            O.data_hora,
                                            O.data_hora_lancamento,
                                            P.quantidade,
                                            P.valor_unit,
                                            S.faixa_etaria,
                                            S.aparencia,
                                            S.modus_operandi,
                                            S.sexo,
                                            S.etnia,
                                            S.aparencia,
                                            O.dp, 
                                            O.numdp,
                                            U.name_user
                                        FROM
                                            produto P
                                        INNER JOIN
                                        ocorrencia O
                                        ON P.id_ocorrencia = O.idocorrencia
                                        INNER JOIN
                                        usuario U
                                        ON U.idusuario = O.id_usuario
                                        INNER JOIN
                                        suspeito S
                                        ON S.id_ocorrencia = O.idocorrencia";
                            endif;

                                    $resultado = mysqli_query($connect, $sql);

                            if(mysqli_num_rows($resultado) > 0):

                                
                                while($dados = mysqli_fetch_array($resultado)):
                            ?>
                                <tr> 

                                        <td><a href="./editar_lancamento.php?idocorrencia=<?php echo $dados['idocorrencia']; ?>"><i class="fa fa-edit" style="color: #F9AD29;"></i></a></td>
                                        
                                        <td><a id="btn-mensagem" data-toggle="modal" data-target="#modal<?php echo $dados['idocorrencia']; ?>"><i class="fa fa-trash-alt" style="color: brown;"></i></a></td>

                                        <td><?php echo $dados['idocorrencia']; ?></td>
                                        <td><?php echo $dados['name_user']; ?></td>
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

                                    <!-- Modal -->
                                    <div id="modal<?php echo $dados['idocorrencia']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Conteúdo do modal-->
                                            <div class="modal-content">

                                            <!-- Cabeçalho do modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Exclusão de lançamento</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Corpo do modal -->
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir o lançamento?</p>
                                            </div>

                                            <!-- Rodapé do modal-->
                                            <div class="modal-footer">
                                                <form action="./php_action/deleteevent.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $dados['idocorrencia']; ?>">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
                                                    <button type="submit" class="btn btn-primary" name="btn-deletar-evento" style="background-color: #6bc0be; border: none;">SIM, DESEJO EXCLUIR</button>
                                                </form>
                                            </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile;
                            else:?>

                            <tr>
                                <td></td>
                                <td></td>
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

                        <?php endif;?>
                    
                    </tbody>
                </table>
            </div>
            <br />

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <a href="./lancamento.php"><button class="btn btn-primary" style="border: none; width: 100%; background-color: #5BC0BE;">LANÇAR NOVA OCORRÊNCIA</button></a>
                    </div>
                </div>
            </div>

                      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.toast').toast('show');
        });
    </script>

    <?php 
        //Footer
        include_once './includes/footer.php';
    ?>
