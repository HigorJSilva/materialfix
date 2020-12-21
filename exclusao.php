<?php

    $acao = 'exclusao';
    include 'conexaoBD.php';
?>

<html >
    <head>
        
        <title>Confirmação de Exclusão</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="form.js"></script>

    </head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Exclusão de empresa</h1>
                    </div>
                    <form id="form" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" id="id" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Deseja confirmar a exclusão da empresa?</p><br>
                            <p>
                                <input type="submit" value="Sim" onClick="excluirEmpresa()" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">Não</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>