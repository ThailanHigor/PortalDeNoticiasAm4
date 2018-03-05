<?php 

		require ('../db_conexao.php');
		$sql = "select User_ID,User_nome,User_email,User_login,User_senha,User_cargo from usuarios";

		//executa uma query no banco utilizando POO.
		$busca = $conector->query($sql);
		$quantidade = mysqli_num_rows($busca);
		//verifica se foi encontrado algum registro
		if ($quantidade > 0) {
			//loop para extrair dados
			while($row = $busca->fetch_assoc()){
			//  armazena numa novo array
     		$json[] = $row;

     		
     	};
     		//insere cabeçalho
			$dados['dados'] = $json;
			//codifica em json para o angular receber
			echo json_encode($dados);
		}

 ?>