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
        //Conexão
        require_once './controllers/db_connect.php';
        require_once './php_action/updatelancamento.php';
    ?>
            <h1>ALTERAÇÃO DE OCORRÊNCIAS</h1>
        </div>

        <ul>
            <?php
                if(!empty($erros)):
                    foreach ($erros as $errs):
                        echo $errs;
                    endforeach;
                endif;

                function selected( $value, $selected ){
                    return $value==$selected ? ' selected="selected"' : '';
                }

            ?> 
        </ul>

        <div class="container-fluid wrapper">
            <form action="" method="post">
                <div class="row" style="margin-top: 20px;">
                    <div class="col">
                            <fieldset>
                              <legend>dados da ocorrência</legend>
                              <div class="form-group">
                                
                                <select class="form-control" name="select-tp-ocorrencia" id="fdsa">
                                    <option value="FURTO" <?php echo selected( 'FURTO', $dadosoc['tipo_ocorrencia'] ); ?>>FURTO</option>
                                    <option value="ROUBO" <?php echo selected( 'ROUBO', $dadosoc['tipo_ocorrencia'] ); ?>>ROUBO</option>
                                    <option value="ARROMBAMENTO" <?php echo selected( 'ARROMBAMENTO', $dadosoc['tipo_ocorrencia'] ); ?>>ARROMBAMENTO</option>
                                    <option value="FRAUDE" <?php echo selected( 'FRAUDE', $dadosoc['tipo_ocorrencia'] ); ?>>FRAUDE</option>
                                    <option value="INIBIÇÃO" <?php echo selected( 'INIBIÇÃO', $dadosoc['tipo_ocorrencia'] ); ?>>INIBICAO</option>
                                    <option value="ABORDAGEM" <?php echo selected( 'ABORDAGEM', $dadosoc['tipo_ocorrencia'] ); ?>>ABORDAGEM</option>
                                    <option value="OUTRO" <?php echo selected( 'OUTRO', $dadosoc['tipo_ocorrencia'] ); ?>>OUTRO</option>
                                </select>
                              </div>
                              <div class="form-group">
                    
                                <input class="form-control" type="datetime-local" name="data-ocorrencia" id="data-ocorrencia" required value="<?php echo date("Y-m-d\TH:i", strtotime($dadosoc['data_hora'])); ?>">
                              </div>  
                            </fieldset>
                    </div>
                    <div class="col">

                        <fieldset>
                            <legend>dados dos itens</legend>
                            <div class="form-group">
                              
                              <input class="form-control" name="qtd-produto" type="text" id="qtd-produto" placeholder="QUANTIDADE" required value="<?php echo $dadosProduto['quantidade']; ?>">
                            </div>
                            <div class="form-group">
                  
                              <input class="form-control" name="valor-total" type="text" id="valor-total" placeholder="VALOR TOTAL" required value="<?php echo $dadosProduto['valor_unit']; ?>">
                            </div>

                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">

                <div class="col">
                    <fieldset>
                        <legend>dados do suspeito</legend>
                        <div class="form-group">
                            <select class="form-control" name="faixa-etaria" id="faixa-etaria">
                            <option value="ATÉ 12 ANOS" <?php echo selected( 'ATÉ 12 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>ATE 12 ANOS</option>
                                <option value="DE 13 A 17 ANOS" <?php echo selected( 'DE 13 A 17 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>DE 13 A 17 ANOS</option>
                                <option value="DE 18 A 24 ANOS" <?php echo selected( 'DE 18 A 24 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>DE 18 A 24 ANOS</option>
                                <option value="DE 25 A 36 ANOS" <?php echo selected( 'DE 25 A 36 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>DE 25 A 34 ANOS</option>
                                <option value="DE 35 A 59 ANOS" <?php echo selected( 'DE 35 A 59 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>DE 35 A 59 ANOS</option>
                                <option value="ACIMA DE 60 ANOS" <?php echo selected( 'ACIMA DE 60 ANOS', $dadosSuspeito['faixa_etaria'] ); ?>>ACIMA DE 60 ANOS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="aparencia" id="aparencia">
                            <option value="COMUM" <?php echo selected( 'COMUM', $dadosSuspeito['aparencia'] ); ?>>COMUM</option>
                                <option value="BOA CONDIÇÃO FINANCEIRA" <?php echo selected( 'BOA CONDIÇÃO FINANCEIRA', $dadosSuspeito['aparencia'] ); ?>>BOA CONDICAO FINANCEIRA</option>
                                <option value="DONA DE CASA" <?php echo selected( 'DONA DE CASA', $dadosSuspeito['aparencia'] ); ?>>DONA DE CASA</option>
                                <option value="ESTUDANTE" <?php echo selected( 'ESTUDANTE', $dadosSuspeito['aparencia'] ); ?>>ESTUDANTE</option>
                                <option value="PROBLEMAS MENTAIS" <?php echo selected( 'PROBLEMAS MENTAIS', $dadosSuspeito['aparencia'] ); ?>>PROBLEMAS MENTAIS</option>
                                <option value="MENDIGO/MORADOR DE RUA" <?php echo selected( 'MENDIGO/MORADOR DE RUA', $dadosSuspeito['aparencia'] ); ?>>MENDIGO/MORADOR DE RUA</option>
                                <option value="EX-PRESIDIÁRIO" <?php echo selected( 'EX-PRESIDIÁRIO', $dadosSuspeito['aparencia'] ); ?>>EX-PRESIDIARIO</option>
                                <option value="TROMBADINHA" <?php echo selected( 'TROMBADINHA', $dadosSuspeito['aparencia'] ); ?>>TROMBADINHA</option>
                                <option value="USUÁRIO DE DROGAS" <?php echo selected( 'USUÁRIO DE DROGAS', $dadosSuspeito['aparencia'] ); ?>>USUARIO DE DROGAS</option>
                                <option value="QUADRILHA" <?php echo selected( 'QUADRILHA', $dadosSuspeito['aparencia'] ); ?>>QUADRILHA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="modus" id="modus">
                            <option value="MOCHILA/BOLSA" <?php echo selected( 'MOCHILA/BOLSA', $dadosSuspeito['modus_operandi'] ); ?>>MOCHILA/BOLSA</option>
                                <option value="CARRINHO DE COMPRAS" <?php echo selected( 'CARRINHO DE COMPRAS', $dadosSuspeito['modus_operandi'] ); ?>>CARRINHO DE COMPRAS</option>
                                <option value="QUADRILHA" <?php echo selected( 'QUADRILHA', $dadosSuspeito['modus_operandi'] ); ?>>QUADRILHA</option>
                                <option value="ESCONDE NA ROUPA" <?php echo selected( 'ESCONDE NA ROUPA', $dadosSuspeito['modus_operandi'] ); ?>>ESCONDE NA ROUPA</option>
                                <option value="FALSA GESTANTE" <?php echo selected( 'FALSA GESTANTE', $dadosSuspeito['modus_operandi'] ); ?>>FALSA GESTANTE</option>
                                <option value="TROCA ETIQUETA" <?php echo selected( 'TROCA ETIQUETA', $dadosSuspeito['modus_operandi'] ); ?>>TROCA ETIQUETA</option>
                                <option value="TROCA DE EMBALAGEM" <?php echo selected( 'TROCA DE EMBALAGEM', $dadosSuspeito['modus_operandi'] ); ?>>TROCA DE EMBALAGEM</option>
                                <option value="DEGUSTAÇÃO" <?php echo selected( 'DEGUSTAÇÃO', $dadosSuspeito['modus_operandi'] ); ?>>DEGUSTACAO</option>
                                <option value="CARRINHO DE BEBÊ" <?php echo selected( 'CARRINHO DE BEBÊ', $dadosSuspeito['modus_operandi'] ); ?>>CARRINHO DE BEBE</option>
                                <option value="CAIXA DE PAPELÃO" <?php echo selected( 'CAIXA DE PAPELÃO', $dadosSuspeito['modus_operandi'] ); ?>>CAIXA DE PAPELAO</option>
                                <option value="OUTROS" <?php echo selected( 'OUTROS', $dadosSuspeito['modus_operandi'] ); ?>>OUTROS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="sexo" id="sexo">
                            <option value="MASCULINO" <?php echo selected( 'MASCULINO', $dadosSuspeito['sexo'] ); ?>>MASCULINO</option>
                                <option value="FEMININO" <?php echo selected( 'FEMININO', $dadosSuspeito['sexo'] ); ?>>FEMININO</option>
                                <option value="OUTRO" <?php echo selected( 'OUTRO', $dadosSuspeito['sexo'] ); ?>>OUTRO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="etnia" id="etnia">
                            <option value="BRANCO" <?php echo selected( 'BRANCO', $dadosSuspeito['etnia'] ); ?>>BRANCO</option>
                                <option value="PARDO" <?php echo selected( 'PARDO', $dadosSuspeito['etnia'] ); ?>>PARDO</option>
                                <option value="NEGRO" <?php echo selected( 'NEGRO', $dadosSuspeito['etnia'] ); ?>>NEGRO</option>
                                <option value="INDÍGENA" <?php echo selected( 'INDÍGENA', $dadosSuspeito['etnia'] ); ?>>INDIGENA</option>
                                <option value="ORIENTAL" <?php echo selected( 'ORIENTAL', $dadosSuspeito['etnia'] ); ?>>ORIENTAL</option>
                                <option value="AMARELO" <?php echo selected( 'AMARELO', $dadosSuspeito['etnia'] ); ?>>AMARELO</option>
                                <option value="OUTRO" <?php echo selected( 'OUTRO', $dadosSuspeito['etnia'] ); ?>>OUTRO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend>dados do boletim</legend>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" name="dp" type="text" placeholder="DP" value="<?php echo $dadosoc['dp']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" name="numdp" type="number" placeholder="NÚMERO DO BOLETIM" value="<?php echo $dadosoc['numdp']; ?>">
                                </div>
                            </div>
                        </div>
                </fieldset>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="btn-alterar-lancamento" class="btn blue" style="border: none; width: 100%; background-color: #5BC0BE;">ALTERAR LANÇAMENTO</button>
                            
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
