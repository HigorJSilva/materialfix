
    <script type="text/javascript" src="form.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous"></script>
    <style type="text/css">  .error {color: red}    </style>

<?php


    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM empresas WHERE id = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $id = $row["id"];
                    $nome = $row["nomeFantasia"];
                    $CNPJ = $row["CNPJ"];
                    $razaoSocial = $row["razaoSocial"];
                    $CNAE = $row["CNAE"];
                    $logradouro = $row["logradouro"];
                    $telefone = $row["telefone"];
                    $numero = $row["numero"];
                    $cidade = $row["cidade"];
                    $estado = $row["estado"];
                    $bairro = $row["bairro"];
                    $CEP = $row["CEP"];
                    $observacao = $row["observacao"];
                    $situacao = $row["situacao"];

                    
                } else{

                    exit();
                }
                
            } else{
                echo "Erro ao executar SQL.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($con);
    }

   
?>

    <script>
            $('[name="cbObservacao"]').on('change', function() {
                $('#observacao').toggle(this.checked);
            }).change();

        </script>

        <form id="formSubmit" method="POST">

            <div class="inputArea" >
                <h3 class="display-6">
                    <p>Informações da empresa <p>   </h3>

                <div>
                    <label>Nome fantasia</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                    
                    <span class="help-block"> </span>
                <div>

                <div>
                    <label>CNPJ</label>
                    <input type="text" name="CNPJ" class="form-control" value="<?php echo $CNPJ; ?>">
                    
                <div>

                <div>
                    <label>Razão Social</label>
                    <input type="text" name="razaoSocial" class="form-control" value="<?php echo $razaoSocial; ?>">
                   

                <div>
                    <label>CNAE</label>
                    <input type="text" name="CNAE" class="form-control" value="<?php echo $CNAE; ?>">
                   
                <div>

                <div>
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>">
                    
                <div>

            </div>

            <div class="inputArea">
            <h3 class="display-6">
                    <p>Informações da empresa <p>   </h3>

                <div>
                    <label>Logradouro</label>
                    <input type="text" name="logradouro" class="form-control" value="<?php echo $logradouro; ?>">
                   
                <div>

                <div>
                    <label>Número</label>
                    <input type="text" name="numero" class="form-control" value="<?php echo $numero; ?>">
                    
                <div>

                <div>
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>">
                    
                <div>

                <div>
                    <label>Estado</label>
                    <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>">
                    
                <div>

                <div>
                    <label>Bairro</label>
                    <input type="text" name="bairro" class="form-control" value="<?php echo $bairro; ?>">
                   
                <div>

                <div>
                    <label>CEP</label>
                    <input type="text" name="CEP" class="form-control" value="<?php echo $CEP; ?>">
                    
                <div>

            </div>

            <div class="inputArea">
                <h3 class="display-6">
                    <p>Observação<p>
                </h3>

                <div class="form-check">
                    <input name="cbObservacao" class="form-check-input" type="checkbox" id="cbObservacao"
                    <?=($observacao != '') ? 'checked':''?>>
                    <label class="form-check-label" for="cbObservacao">
                    Usa Observação
                    </label>
                </div>

                <div>
                    <label for="observacao" name="lblObservacao" >Observação</label>
                    <textarea name="observacao" class="form-control" id="observacao"><?php echo $observacao; ?></textarea>
                </div>

                <div>
                    <label for="situacao" >Situação</label>
                    <select class="form-select" id="situacao" name="situacao" >

                        <option value="Ativa" <?=($situacao == 'Ativa') ? 'selected':''?>>Ativa</option>
                        <option value="Inativa" <?=($situacao == 'Inativa') ? 'selected':''?>>Inativa</option>
                    </select>
                </div>

                <input type="hidden" id="id" value="<?php echo $id; ?>"></input>
                <input type="hidden" id="acao" value="<?php echo $acao; ?>"></input>

                <div>
                    <input type="submit" onClick="submitForm()" id="btnSubmit" class="btn btn-primary" value="Enviar">
                    <a href="index.php" class="btn btn-default">Cancelar</a>
                 </div>

            </div>

        </form>