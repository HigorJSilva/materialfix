<?php

    $nome = $CNPJ = $telefone = $CNAE = $numero = $situacao = $logradouro = "";
    $razaoSocial = $CEP = $bairro = $cidade = $observacao = $id = $estado = "";

    $acao = 'alteracao';

    include 'conexaoBD.php';

?>

<html>

    <head>
        <title> Cadastro de empresas </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

        <script>
            $('[name="cbObservacao"]').on('change', function() {
                $('#observacao').toggle(this.checked);
            }).change();

        </script>
    </head>

    <body>

    <div class="wrapper">
        <div class="container-fluid" style='width:80%'>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2> Alterar empresa</h2>

                        <?php include 'form.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>