<?php 

		require ('../db_conexao.php');
		$sql = "select Not_ID,Not_titulo,Not_chamada,Not_texto,Not_data, Not_autor,Not_ID from noticias";

		//executa uma query no banco utilizando POO.
		$busca = $conector->query($sql);
		$quantidade = mysqli_num_rows($busca);
		//verifica se foi encontrado algum registro
		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
			$resultado = array_map('utf8_encode', $row);
     		$json[] = $resultado;

     		
     	};
			$dados['dados'] = $json;

			echo json_encode($dados);
		}

 ?>