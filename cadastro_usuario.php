<?php
    //header
    include_once './includes/header.php';
?>

<title>Home - Control of events</title>
<link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">

<link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="./css/home.css">
<link rel="stylesheet" href="./css/cad_usuario.css">
<?php 
    //Menu
    include_once './includes/nav.php';
    
    require_once './php_action/createUser.php';
    //Conexão
    require_once './controllers/db_connect.php';
    if(!($_SESSION['nivel'] == "FISCAL") && !($_SESSION['nivel'] == "CONSULTOR")):
?>
        <h1>cadastro de usuários</h1>
    </div>
    <div class="container-fluid wrapper">
        <form action="" method="post">
            <fieldset style="margin-top: 20px;">
                <legend>dados do USUÁRIO</legend>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nome" placeholder="NOME">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">      
                                <input class="form-control" type="text" name="sobrenome" placeholder="SOBRENOME">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" type="text" name="usuario" placeholder="USUÁRIO">
                            </div>
                        </div>
                    </div>
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
                                <input class="form-control" type="password" name="conf-senha" placeholder="confirmar senha">
                            </div>
                        </div>
                    </div>
            </fieldset>
            <fieldset>
                <legend>dados de acesso</legend>

                <select class="form-control" name="loja" id="loja-cadastro">
                    <option value="">SELECIONE A LOJA</option>
                    <option value="MATRIZ"> MATRIZ </option>
                    <option value="CB001 - TAUBATE">CB001 - TAUBATE</option>
                    <option value="CB002 - LEME"> CB002 - LEME </option>
                    <option value="CB003 - PORTO FERREIRA"> CB003 - PORTO FERREIRA </option>
                    <option value="CB004 - MOGI DAS CRUZES"> CB004 - MOGI DAS CRUZES </option>
                    <option value="CB005 - JUNDIAI"> CB005 - JUNDIAI </option>
                    <option value="CB006 - PAPA J. PAULO"> CB006 - PAPA J. PAULO </option>
                    <option value="CB007 - RIBEIRAO PIRES"> CB007 - RIBEIRAO PIRES </option>
                    <option value="CB008 - CECAP"> CB008 - CECAP </option>
                    <option value="CB009 - SP IMPERADOR"> CB009 - SP IMPERADOR </option>
                    <option value="CB010 - GJA. A. BARROS"> CB010 - GJA. A. BARROS </option>
                    <option value="CB011 - SANTOS"> CB011 - SANTOS </option>
                    <option value="CB012 - VICENTE DE CARVALHO I"> CB012 - VICENTE DE CARVALHO I </option>
                    <option value="CB013 - VICENTE DE CARVALHO II"> CB013 - VICENTE DE CARVALHO II </option>
                    <option value="CB014 - BEBEDOURO"> CB014 - BEBEDOURO </option>
                    <option value="CB015 - SOROCABA RADIAL NORTE"> CB015 - SOROCABA RADIAL NORTE </option>
                    <option value="CB016 - VALINHOS"> CB016 - VALINHOS </option>
                    <option value="CB017 - BROTAS"> CB017 - BROTAS </option>
                    <option value="CB018 - MONTE MOR"> CB018 - MONTE MOR </option>
                    <option value="CB019 - SAO CARLOS"> CB019 - SAO CARLOS </option>
                    <option value="CB020 - GUAIRA"> CB020 - GUAIRA </option>
                    <option value="CB021 - OLIMPIA"> CB021 - OLIMPIA </option>
                    <option value="CB022 - ORLANDIA"> CB022 - ORLANDIA </option>
                    <option value="CB023 - CAMPANELLA"> CB023 - CAMPANELLA </option>
                    <option value="CB024 - CACAPAVA"> CB024 - CACAPAVA </option>
                    <option value="CB025 - GUARATINGUETA"> CB025 - GUARATINGUETA </option>
                    <option value="CB026 - RIBEIRAO PIRES CENTRO"> CB026 - RIBEIRAO PIRES CENTRO </option>
                    <option value="CB027 - GRU T PENTEADO"> CB027 - GRU T PENTEADO </option>
                    <option value="CB028 - MOGI SOCORRO"> CB028 - MOGI SOCORRO </option>                       
                </select>
                <br />
                <select class="form-control" name="select-nivel" id="nivel-cadastro">
                    <option value="">SELECIONE O NÍVEL DE ACESSO</option>
                    <option value="FISCAL">FISCAL</option>
                    <option value="CONSULTOR">CONSULTOR</option>
                    <option value="ANALISTA">ANALISTA</option>
                    <!--option value="ADMINISTRADOR">ADMINISTRADOR</option-->
                </select>
            </fieldset>
            <br />
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="btn-cadastrar" value="CADASTRAR" style="border: none; width: 100%; background-color: #5BC0BE;">
                    </div>
                </div>
                <div class="col">
                    <input class="btn btn-danger" type="button" name="btn-cancelar" value="cancelar" style="width: 100%;">
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

    else: 
        header('Location: ../home.php');            
    endif;

    //Footer
    include_once './includes/footer.php';
?>