<?php
        //header
        include_once './includes/header.php';
    ?>

    <title>Consulta - Control of events</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/consulta.css">
    <?php 
        //Menu
        include_once './includes/nav.php';
        //Conexão
        require_once './controllers/db_connect.php';

        if(!($_SESSION['nivel'] == "FISCAL") && !($_SESSION['nivel'] == "CONSULTOR")):
    ?>
            <h1>Consulta de usuários</h1>
        </div>
        <div class="container-fluid wrapper">

            <?php require_once './includes/mensagem.php'; ?>

            <div class="table-responsive" style="overflow: hidden; height: calc(100% - 80px); margin-right: 15px; overflow: scroll;">
                <table class="table table-hover" style="text-align: center; overflow: scroll;">
                    <thead class="thead-dark">
                        <tr >
                            <th scope="col" style="background-color: #0b132b;"></th>
                            <th scope="col" style="background-color: #0b132b;"></th>
                            <th scope="col" style="background-color: #0b132b;">Loja</th>
                            <th scope="col" style="background-color: #0b132b;">nome</th>
                            <th scope="col" style="background-color: #0b132b;">sobrenome</th>
                            <th scope="col" style="background-color: #0b132b;">usuário</th>
                            <th scope="col" style="background-color: #0b132b;">nível de acesso</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        if($_SESSION['nivel'] != 'ADMINISTRADOR'):    
                            $sql = "SELECT * FROM usuario WHERE nivel != 'ADMINISTRADOR' AND idusuario !=".$_SESSION['idUser']." AND nivel != 'ANALISTA'";
                        else:
                            $sql = "SELECT * FROM usuario WHERE idusuario != ".$_SESSION['idUser'];
                        endif;
                        $resultado = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($resultado) > 0):

                            while($dados = mysqli_fetch_array($resultado)):
                    ?>

                        <tr>

                            <td><a href="./alterar_usuario.php?idusuario=<?php echo $dados['idusuario']; ?>"><i class="fa fa-edit" style="color: #F9AD29;"></i></a></td>
                                        
                            <td><a id="btn-mensagem" data-toggle="modal" data-target="#modal<?php echo $dados['idusuario']; ?>"><i class="fa fa-trash-alt" style="color: brown;"></i></a></td>
                            <td><?php echo $dados['loja']; ?></td>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['sobrenome']; ?></td>
                            <td><?php echo $dados['name_user']; ?></td>
                            <td><?php echo $dados['nivel']; ?></td>
                        </tr>

                        <!-- Modal -->
                        <div id="modal<?php echo $dados['idusuario']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Conteúdo do modal-->
                                <div class="modal-content">

                                <!-- Cabeçalho do modal -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Exclusão de usuário</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Corpo do modal -->
                                <div class="modal-body">
                                    <p>Deseja realmente excluir o usuário?</p>
                                </div>

                                <!-- Rodapé do modal-->
                                <div class="modal-footer">
                                    <form action="./php_action/deleteUser.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dados['idusuario']; ?>">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
                                        <button type="submit" class="btn btn-primary" name="btn-deletar" style="background-color: #6bc0be; border: none;">SIM, DESEJO EXCLUIR</button>
                                    </form>
                                </div>

                                </div>
                            </div>
                        </div>

                
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
                            </tr>

                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <form action="./cadastro_usuario.php" method="post">
                            <input class="btn btn-primary" type="submit" value="CADASTRAR NOVO USUÁRIO" style="border: none; width: 100%; background-color: #5BC0BE;">
                        </form>
                    </div>
                </div>
            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <?php 

    else: 
        header('Location: ../home.php');            
    endif;

    //Footer
    include_once './includes/footer.php';
    ?>