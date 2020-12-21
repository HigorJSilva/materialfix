<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.CNPJ').mask('00.000.000/0000-00');
			$('.telefone').mask('(00) 00000-0000');
			$('.Inativa').hide();

			$('.Inativa').css('background-color','#F5C6CB')


			$('input[name="empInativas"]').on('click', function(){
				if ( $(this).prop('checked') ) {
					$('.Inativa').fadeIn();
				} 
				else {
					$('.Inativa').hide();

				}
			});
		});
		
	</script>

	</head>

	<body>

		<div class="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="page-header clearfix">
							<h2 class="pull-left">Empresas Cadastradas</h2>
							
							<a href="cadastro.php" class="btn btn-success pull-right">Adicionar Empresas</a>
							

						</div>
						<label class="form-check-label" for="cbObservacao">
								Mostrar inativas
							</label>
							<input name="empInativas" class="form-check-input" type="checkbox" id="empInativas">
						<?php
							
							require_once "conexaoBD.php";

							$sql = "SELECT * FROM empresas WHERE situacao != 'excluido' ";
							$res = mysqli_query($con, $sql );

							if($res){
								
								if(mysqli_num_rows($res) > 0){
									echo "<table class='table table-bordered table-striped'>";
									echo "<thead>";
										echo "<tr>";
											echo "<th>Nome</th>";
											echo "<th>Telefone</th>";
											echo "<th>CNPJ</th>";
											echo "<th>Cidade</th>";
											echo "<th>Ações</th>";
										echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
									while($row = mysqli_fetch_array($res)){
										echo "<tr class=".$row['situacao'].">";
											echo "<td>" . $row['nomeFantasia'] . "</td>";
											echo "<td class='telefone'> " . $row['telefone'] . "</td>";
											echo "<td class='CNPJ'>" . $row['CNPJ'] . "</td>";
											echo "<td>" . $row['cidade'] . "</td>";
											echo "<td style=>";
												
												echo "<a href='alteracao.php?id=". $row['id'] ."' title='Atualizar Empresa' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
												echo "<a href='exclusao.php?id=". $row['id'] ."' title='Excluir Empresa' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
											echo "</td>";
										echo "</tr>";
									}
									echo "</tbody>";                            
								echo "</table>";
								mysqli_free_result($res);
							} else{
								echo "<p class='lead'><em>Nenhum registro encontrado.</em></p>";
							}
						} else{
							echo "ERRO: Erro ao executar $sql. " . mysqli_error($con);
						}
	
						mysqli_close($con);
						?>
					</div>
				</div>        
			</div>
		</div>
	</body>
</html>










