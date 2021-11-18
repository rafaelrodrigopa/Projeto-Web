<?php
        //header
        include_once './includes/header.php';
    ?>
    <title>Resetar Senha - Control of events</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">

    <link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/cad_usuario.css">
    <?php 
        //Menu
        include_once './includes/nav.php';
        
        //Conexão
        require_once './controllers/db_connect.php';
        require_once './php_action/changePassword.php';

            function selected( $value, $selected ){
                return $value==$selected ? ' selected="selected"' : '';
            }
    ?>            
    <h1>Alteração de senha</h1>
        </div>
        <div class="container-fluid wrapper">
            <form action="" method="post">
            <fieldset>
                    <legend>dados de acesso</legend>
                    <input type="hidden" name="idusuario" value="<?php echo $dadosChange['idusuario']; ?>">
                    <select class="form-control" name="select-loja" id="loja-cadastro" disabled>
                        <option value="MATRIZ" <?php echo selected( 'MATRIZ', $dadosChange['loja'] ); ?>> MATRIZ </option>
                        <option value="CB001 - TAUBATE" <?php echo selected( 'CB001 - TAUBATE', $dadosChange['loja'] ); ?>>CB001 - TAUBATE</option>
                        <option value="CB002 - LEME" <?php echo selected( 'CB002 - LEME', $dadosChange['loja'] ); ?>> CB002 - LEME </option>
                        <option value="CB003 - PORTO FERREIRA" <?php echo selected( 'CB003 - PORTO FERREIRA', $dadosChange['loja'] ); ?>> CB003 - PORTO FERREIRA </option>
                        <option value="CB004 - MOGI DAS CRUZES" <?php echo selected( 'CB004 - MOGI DAS CRUZES', $dadosChange['loja'] ); ?>> CB004 - MOGI DAS CRUZES </option>
                        <option value="CB005 - JUNDIAI" <?php echo selected( 'CB005 - JUNDIAI', $dadosChange['loja'] ); ?>> CB005 - JUNDIAI </option>
                        <option value="CB006 - PAPA J. PAULO" <?php echo selected( 'CB006 - PAPA J. PAULO', $dadosChange['loja'] ); ?>> CB006 - PAPA J. PAULO </option>
                        <option value="CB007 - RIBEIRAO PIRES" <?php echo selected( 'CB007 - RIBEIRAO PIRES', $dadosChange['loja'] ); ?>> CB007 - RIBEIRAO PIRES </option>
                        <option value="CB008 - CECAP" <?php echo selected( 'CB008 - CECAP', $dadosChange['loja'] ); ?>> CB008 - CECAP </option>
                        <option value="CB009 - SP IMPERADOR" <?php echo selected( 'CB009 - SP IMPERADOR', $dadosChange['loja'] ); ?>> CB009 - SP IMPERADOR </option>
                        <option value="CB010 - GJA. A. BARROS" <?php echo selected( 'CB010 - GJA. A. BARROS', $dadosChange['loja'] ); ?>> CB010 - GJA. A. BARROS </option>
                        <option value="CB011 - SANTOS" <?php echo selected( 'CB011 - SANTOS', $dadosChange['loja'] ); ?>> CB011 - SANTOS </option>
                        <option value="CB012 - VICENTE DE CARVALHO I" <?php echo selected( 'CB012 - VICENTE DE CARVALHO I', $dadosChange['loja'] ); ?>> CB012 - VICENTE DE CARVALHO I </option>
                        <option value="CB013 - VICENTE DE CARVALHO II" <?php echo selected( 'CB013 - VICENTE DE CARVALHO II', $dadosChange['loja'] ); ?>> CB013 - VICENTE DE CARVALHO II </option>
                        <option value="CB014 - BEBEDOURO" <?php echo selected( 'CB014 - BEBEDOURO', $dadosChange['loja'] ); ?>> CB014 - BEBEDOURO </option>
                        <option value="CB015 - SOROCABA RADIAL NORTE" <?php echo selected( 'CB015 - SOROCABA RADIAL NORTE', $dadosChange['loja'] ); ?>> CB015 - SOROCABA RADIAL NORTE </option>
                        <option value="CB016 - VALINHOS" <?php echo selected( 'CB016 - VALINHOS', $dadosChange['loja'] ); ?>> CB016 - VALINHOS </option>
                        <option value="CB017 - BROTAS" <?php echo selected( 'CB017 - BROTAS', $dadosChange['loja'] ); ?>> CB017 - BROTAS </option>
                        <option value="CB018 - MONTE MOR" <?php echo selected( 'CB018 - MONTE MOR', $dadosChange['loja'] ); ?>> CB018 - MONTE MOR </option>
                        <option value="CB019 - SAO CARLOS" <?php echo selected( 'CB019 - SAO CARLOS', $dadosChange['loja'] ); ?>> CB019 - SAO CARLOS </option>
                        <option value="CB020 - GUAIRA" <?php echo selected( 'CB020 - GUAIRA', $dadosChange['loja'] ); ?>> CB020 - GUAIRA </option>
                        <option value="CB021 - OLIMPIA" <?php echo selected( 'CB021 - OLIMPIA', $dadosChange['loja'] ); ?>> CB021 - OLIMPIA </option>
                        <option value="CB022 - ORLANDIA" <?php echo selected( 'CB022 - ORLANDIA', $dadosChange['loja'] ); ?>> CB022 - ORLANDIA </option>
                        <option value="CB023 - CAMPANELLA" <?php echo selected( 'CB023 - CAMPANELLA', $dadosChange['loja'] ); ?>> CB023 - CAMPANELLA </option>
                        <option value="CB024 - CACAPAVA" <?php echo selected( 'CB024 - CACAPAVA', $dadosChange['loja'] ); ?>> CB024 - CACAPAVA </option>
                        <option value="CB025 - GUARATINGUETA" <?php echo selected( 'CB025 - GUARATINGUETA', $dadosChange['loja'] ); ?>> CB025 - GUARATINGUETA </option>
                        <option value="CB026 - RIBEIRAO PIRES CENTRO" <?php echo selected( 'CB026 - RIBEIRAO PIRES CENTRO', $dadosChange['loja'] ); ?>> CB026 - RIBEIRAO PIRES CENTRO </option>
                        <option value="CB027 - GRU T PENTEADO" <?php echo selected( 'CB027 - GRU T PENTEADO', $dadosChange['loja'] ); ?>> CB027 - GRU T PENTEADO </option>
                        <option value="CB028 - MOGI SOCORRO" <?php echo selected( 'CB028 - MOGI SOCORRO', $dadosChange['loja'] ); ?>> CB028 - MOGI SOCORRO </option>                       
                    </select>
                </fieldset>
                <fieldset>
                    <legend>dados do USUÁRIO</legend>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="NOME" value="<?php echo $dadosChange['nome']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">      
                                    <input class="form-control" type="text" placeholder="SOBRENOME" value="<?php echo $dadosChange['sobrenome']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="USUÁRIO" value="<?php echo $dadosChange['name_user']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <?php if(password_verify('123mudar',$dadosChange['senha'])): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="senha" placeholder="senha">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="confirmSenha" placeholder="confirmar senha">
                                    </div>
                                </div>
                            </div>

                            </fieldset>
                            <br />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <button type="submit" name="btn-alterar-senha" class="btn btn-primary" style="border: none; width: 100%; background-color: #5BC0BE;">ALTERAR SENHA</button>
                                    </div>
                                </div>
                            <?php else:

                        ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="senha" disabled value="<?php echo $dadosChange['senha'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="confirmar senha" disabled value="<?php echo $dadosChange['senha'] ?>">
                                    </div>
                                </div>
                            </div>

                            </fieldset>
                            <br />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" name="btn-alterar-senha" class="btn btn-primary" disabled style="border: none; width: 100%; background-color: #5BC0BE;">ALTERAR SENHA</button>
                                        <!--input class="btn btn-primary" type="submit" value="CADASTRAR" style="border: none; width: 100%; background-color: #5BC0BE;"-->
                                    </div>
                                </div>
                        <?php 
                    
                                $erros[] = '<div class="alert alert-danger" role="alert" style="text-align: center;">
                                Solicite a um analista o Reset da senha.
                              </div>';
                        endif; ?>
                
                    <div class="col">
                        <input class="btn btn-danger" type="button" value="cancelar" style="width: 100%;">
                    </div>
                </div>
            </form>
            <ul>
            <?php
                if(!empty($erros)):
                    foreach ($erros as $errs):
                        echo $errs;
                    endforeach;
                endif;
            ?> 
        </ul>
        
<?php 
//Footer
include_once './includes/footer.php';
?>