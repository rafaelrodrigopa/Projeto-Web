<?php
    //header
    include_once './includes/header.php';
?>

<title>lançamento - Control of events</title>
<link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">

<link rel="shortcut icon" href="./img/logo_um.png" type="image/x-icon">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Bootstrap/js/jquery.mask.min.js"></script>	
<script type="text/javascript">
	$(document).ready(function(){

		$("#valor-total").mask("999.999.990,00", {reverse: true})
		$("#qtd-produto").mask("999.999.990,00", {reverse: true})

	})
</script>
<link rel="stylesheet" href="./css/home.css">


<?php 
    //Menu
    include_once './includes/nav.php';
    require_once './php_action/createEvent.php';
    //Conexão
    require_once './controllers/db_connect.php';
?>
        <h1>LANÇAMENTO DE OCORRÊNCIAS</h1>
    </div>
    <div class="container-fluid wrapper">
        <form action="" method="post">
            <div class="row" style="margin-top: 20px;">
                <div class="col">
                        <fieldset>
                          <legend>dados da ocorrência</legend>
                          <div class="form-group">
                            
                            <select class="form-control" name="select-tp-ocorrencia" id="fdsa">
                                <option value="">SELECIONE O TIPO DE OCORRENCIA</option>
                            <option value="FURTO">FURTO</option>
                            <option value="ROUBO">ROUBO</option>
                            <option value="ARROMBAMENTO">ARROMBAMENTO</option>
                            <option value="FRAUDE">FRAUDE</option>
                            <option value="INIBICAO">INIBIÇÃO</option>
                            <option value="ABORDAGEM">ABORDAGEM</option>
                            <option value="OUTRO">OUTRO</option>
                            </select>
                          </div>
                          <div class="form-group">
                
                            <input class="form-control" type="datetime-local" name="data-ocorrencia" id="data-ocorrencia" required>
                          </div>  
                        </fieldset>
                </div>
                <div class="col">

                    <fieldset>
                        <legend>dados dos itens</legend>
                        <div class="form-group">
                          
                          <input class="form-control" min="0" name="qtd-produto" id="qtd-produto" type="text" placeholder="QUANTIDADE" required >
                          
                        </div>
                        <div class="form-group">
              
                          <input class=" form-control" min="0" name="valor-total" type="text" id="valor-total" placeholder="VALOR TOTAL" required>
                        </div>

                </div>
            </div>
            <div class="row" style="margin-top: 20px;">

            <div class="col">
                <fieldset>
                    <legend>dados do suspeito</legend>
                    <div class="form-group">
                        <select class="form-control" name="faixa-etaria" id="faixa-etaria">
                            <option value="">SELECIONE A FAIXA ETARIA</option>
                            <option value="ATÉ 12 ANOS">ATE 12 ANOS</option>
                            <option value="DE 13 A 17 ANOS">DE 13 A 17 ANOS</option>
                            <option value="DE 18 A 24 ANOS">DE 18 A 24 ANOS</option>
                            <option value="DE 25 A 36 ANOS">DE 25 A 34 ANOS</option>
                            <option value="DE 35 A 59 ANOS">DE 35 A 59 ANOS</option>
                            <option value="ACIMA DE 60 ANOS">ACIMA DE 60 ANOS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="aparencia" id="aparencia">
                            <option value="">SELECIONE A APARENCIA</option>
                            <option value="COMUM">COMUM</option>
                            <option value="BOA CONDIÇÃO FINANCEIRA">BOA CONDICAO FINANCEIRA</option>
                            <option value="DONA DE CASA">DONA DE CASA</option>
                            <option value="ESTUDANTE">ESTUDANTE</option>
                            <option value="PROBLEMAS MENTAIS">PROBLEMAS MENTAIS</option>
                            <option value="MENDIGO/MORADOR DE RUA">MENDIGO/MORADOR DE RUA</option>
                            <option value="EX-PRESIDIÁRIO">EX-PRESIDIARIO</option>
                            <option value="TROMBADINHA">TROMBADINHA</option>
                            <option value="USUÁRIO DE DROGAS">USUARIO DE DROGAS</option>
                            <option value="QUADRILHA">QUADRILHA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="modus" id="modus">
                            <option value="">SELECIONE O MODUS-OPERANDI</option>
                            <option value="MOCHILA/BOLSA">MOCHILA/BOLSA</option>
                            <option value="CARRINHO DE COMPRAS">CARRINHO DE COMPRAS</option>
                            <option value="QUADRILHA">QUADRILHA</option>
                            <option value="ESCONDE NA ROUPA">ESCONDE NA ROUPA</option>
                            <option value="FALSA GESTANTE">FALSA GESTANTE</option>
                            <option value="TROCA ETIQUETA">TROCA ETIQUETA</option>
                            <option value="TROCA DE EMBALAGEM">TROCA DE EMBALAGEM</option>
                            <option value="DEGUSTAÇÃO">DEGUSTACAO</option>
                            <option value="CARRINHO DE BEBÊ">CARRINHO DE BEBE</option>
                            <option value="CAIXA DE PAPELÃO">CAIXA DE PAPELAO</option>
                            <option value="OUTROS">OUTROS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="">SELECIONE O SEXO</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMININO">FEMININO</option>
                            <option value="OUTRO">OUTRO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="etnia" id="etnia">
                            <option value="">SELECIONE A ETNIA</option>
                            <option value="BRANCO">BRANCO</option>
                            <option value="PARDO">PARDO</option>
                            <option value="NEGRO">NEGRO</option>
                            <option value="INDÍGENA">INDIGENA</option>
                            <option value="ORIENTAL">ORIENTAL</option>
                            <option value="AMARELO">AMARELO</option>
                            <option value="OUTRO">OUTRO</option>
                        </select>
                    </div>
                </div>
            </div>
            <fieldset>
                <legend>dados do boletim</legend>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" name="dp" type="text" placeholder="DP">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" name="numdp" type="number" placeholder="NÚMERO DO BOLETIM">
                            </div>
                        </div>
                    </div>
            </fieldset>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="btn-lancar" class="btn blue" style="border: none; width: 100%; background-color: #5BC0BE;">REGISTRAR</button>
                        
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-danger" type="submit" name="btn-cancelar" class="btn red" style="width: 100%;">CANCELAR</button>
                </div>
            </div>
        </form>
        
        <div>

        <ul>
            <?php
                if(!empty($erros)):
                    foreach ($erros as $errs):
                        echo $errs;
                    endforeach;
                endif;
            ?> 
        </ul>
    </div>
<?php 
    //Footer
    include_once './includes/footer.php';
?>
