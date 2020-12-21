<?php
include 'conexaoBD.php';

    if(isset($_POST["acao"]) ? $_POST["acao"] == 'cadastro' : false ){


        $sql = "INSERT INTO empresas (nomeFantasia, CNPJ, razaoSocial, telefone, CNAE, logradouro, ".
        "numero, bairro, CEP, cidade, estado, observacao, situacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($con, $sql)){

            $param_nome = $_POST["nome"];
            $param_CNPJ = $_POST["CNPJ"];
            $param_razaoSocial = $_POST["razaoSocial"];
            $param_telefone = $_POST["telefone"];
            $param_CNAE = $_POST["CNAE"];
            $param_logradouro = $_POST["logradouro"];
            $param_numero = $_POST["numero"];
            $param_bairro = $_POST["bairro"];
            $param_CEP = $_POST["CEP"];
            $param_cidade = $_POST["cidade"];
            $param_estado = $_POST["estado"];
            $param_obsevacao = $_POST["observacao"];
            $param_situacao = $_POST["situacao"];
            
            mysqli_stmt_bind_param($stmt, "sssssssssssss",  $param_nome, $param_CNPJ, $param_razaoSocial,
                $param_telefone, $param_CNAE, $param_logradouro, $param_numero, $param_bairro, $param_CEP, 
                $param_cidade, $param_estado, $param_obsevacao, $param_situacao); 
            
            if(mysqli_stmt_execute($stmt)){
                
                echo 'success';
                exit();
            } else{
                echo "Erro ao executar SQL";
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($con);
    }

    else if(isset($_POST["acao"]) ? $_POST["acao"] == 'alteracao' : false && isset($_POST["id"]) && !empty($_POST["id"])){
        $sql = "UPDATE empresas SET nomeFantasia=?, CNPJ=?, razaoSocial=?, telefone=?, CNAE=?, logradouro=?, ".
            "numero=?, bairro=?, CEP=?, cidade=?, estado=?, observacao=?, situacao=? WHERE id=?";

            
            if( $stmt = mysqli_prepare($con, $sql)){
                $param_nome = $_POST["nome"];
                $param_CNPJ = $_POST["CNPJ"];
                $param_razaoSocial = $_POST["razaoSocial"];
                $param_telefone = $_POST["telefone"];
                $param_CNAE = $_POST["CNAE"];
                $param_logradouro = $_POST["logradouro"];
                $param_numero = $_POST["numero"];
                $param_bairro = $_POST["bairro"];
                $param_CEP = $_POST["CEP"];
                $param_cidade = $_POST["cidade"];
                $param_estado = $_POST["estado"];
                $param_obsevacao = $_POST["observacao"];
                $param_situacao = $_POST["situacao"];
                $param_id = $_POST["id"];
                
                $teste = mysqli_stmt_bind_param($stmt, "sssssssssssssi", $param_nome, $param_CNPJ, $param_razaoSocial,
                    $param_telefone, $param_CNAE, $param_logradouro, $param_numero, $param_bairro, $param_CEP, $param_cidade,
                    $param_estado, $param_obsevacao, $param_situacao, $param_id);

                if(mysqli_stmt_execute($stmt)){

                    echo 'successo';
                    exit();
        
                } else{
                    echo "Erro ao executar SQL.";
        
                }
                mysqli_stmt_close($stmt);

            }else{
                echo 'Erro ao preprar string SQL';
            }

        mysqli_close($con);
    }

    else if(isset($_GET["acao"]) ? $_GET["acao"] == 'exclusao' : false && isset($_POST["id"])){

        $sql = "UPDATE empresas SET situacao=? WHERE id = ?";

        if($stmt = mysqli_prepare($con, $sql)){

            $param_situacao = 'excluido';
            $param_id = $_POST["id"];
            
            mysqli_stmt_bind_param($stmt, "si", $param_situacao, $param_id);
            
        
            if(mysqli_stmt_execute($stmt)){
            
                echo 'successo';
                exit();
            } else{
                echo "Erro ao executar SQL.";
            }
            mysqli_stmt_close($stmt);
        }
        
        mysqli_close($con);
        
    }else{
        echo $_GET["acao"];
    }
    
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
?>