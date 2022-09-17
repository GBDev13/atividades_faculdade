<?php


class Cooperativa{

	public function consultar($connection, $protocolo){
		
		$conectar = $connection->conexao_banco();

		$sql = "select * from protocolo where numero = '%s'";

		$sql = sprintf($sql, $protocolo);		
		$consulta = $conectar->prepare($sql);
		$consulta->execute();

		 $results = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
	}

	public function listar_cadastro($connection){
		
		$conectar = $connection->conexao_banco();

		$sql = "SELECT * FROM protocolo ORDER BY numero DESC LIMIT 1";

		$sql = sprintf($sql, $protocolo);		
		$consulta = $conectar->prepare($sql);
		$consulta->execute();

		 $results = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
	}




	public function cadastrar($connection,$solicitante, $descricao, $email, $ano, $status){
			
		echo $dataCadastro;
		$sql = "INSERT INTO protocolo(solicitante, descricao, email, ano, status) VALUES(:solicitante, :descricao, :email, :ano, :status)";


		
		$conectar = $connection->conexao_banco();
		$ins_dado = $conectar->prepare($sql);

		$ins_dado->bindParam( ':solicitante', $solicitante );		
		$ins_dado->bindParam( ':descricao', $descricao );
		$ins_dado->bindParam( ':email', $email );
		$ins_dado->bindParam( ':ano', $ano );
		$ins_dado->bindParam( ':status', $status );
		//$ins_dado->bindParam( ':dataCadastro', $dataCadastro );
		 		

		$resultado = $ins_dado->execute();
 
		if ($resultado)	
		  return $resultado;		   
		else
			return false;	
	}

	public function gerar_protocolo($connection){
		
		$sql = "SELECT protocolo FROM cooperativa where protocolo != 'ABC654321' AND protocolo != 'ABC123456' ORDER BY protocolo DESC limit 1";
	
		$conectar_banco = $connection->conexao_banco();
		$consultaProtocolo = $conectar_banco->query($sql);

		
		if($consultaProtocolo)
		{
			$dados_protocolo = $consultaProtocolo->fetch(PDO::FETCH_ASSOC);
		
			$protocolo = $dados_protocolo['protocolo'] ;
			
			$ano_protocolo = str_split($protocolo, 5);	
			
			
			if(end($ano_protocolo) == date('Y'))
			{				
				$gerar_protocolo = str_pad ($ano_protocolo[0]+1, 4, "0", STR_PAD_LEFT); 
			}			
			else
			{
				$input = 1;
				$gerar_protocolo = str_pad ($input, 4, "0", STR_PAD_LEFT);
			}
			
			$novo_protocolo = $gerar_protocolo."/".date('Y');
			
			return $novo_protocolo;
		}else{
			return false;
		}

	}

}


