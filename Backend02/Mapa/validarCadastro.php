<?php error_reporting(0);  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cooperativa de Crédito</title>

    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <script type="text/javascript" src="dist/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>
  </head>
    <body>

    <div class="container" style="margin-top:50px">
			<?php 
				
				include 'includes/conexao.php';
				include 'classes/cooperativa.php';
				$connection = new Banco();
				$cooperativa = new Cooperativa();
				
				$solicitante = $_POST["solicitante"];	
				$descricao = $_POST["descricao"];
				$email = $_POST["email"];				
				$ano = date('Y');
				$status = 1;
				$confirmar_cadastro = $cooperativa->cadastrar(
													$connection, 
													$solicitante, 
													$descricao,
													$email, 													
													$ano, 
													$status
												);
				
				if (!$confirmar_cadastro){								
					echo "<p>Erro no cadastro! Verifique!</p>";							
				}
				else{		
						$retorno = $cooperativa->listar_cadastro($connection);
						$dados = json_decode($retorno);

				    if (isset($dados) && !empty($dados)) {
				        foreach ($dados as $key =>$value){

				        			echo"<h3>PROTOCOLO REALIZADO COM SUCESSO!</h3>";

											echo "<p>Protocolo: ".$value->numero."</p>";			
											echo "<p>Solicitante: ".$value->solicitante." </p>";			
											echo "<p>Descrição: ".$value->descricao." </p>";			
											echo "<p>E-mail: ".$value->email." </p>";			
											echo "<p>Ano: ".$value->ano." </p>";			
											if($value->status == 1) echo "<p>Status: Aguardando analise</p>";else echo "<p>Status: concluído</p>";	
											echo "<p>Data Cadastro: ".$value->datacadastro." </p>";	
											echo "<br><button onclick='window.print()'>IMPRIMIR</button>";
											echo "<div class='text-center' style='margin-top: 20px'><a href='index.html'>VOLTAR</a></div>";
				        } 
				     }
				   }
			?>

     </div>
</body>
</html>