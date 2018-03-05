<?php 
	session_start();

	//busca o modulo de conexao 
	require 'model/db_conexao.php';

	//recebe o post do formulario
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	//verifica se há campos em branco
	if(!empty($usuario = $_POST['usuario']) and !empty($senha = $_POST['senha'])){
	
		//query
		$sql = "select * from usuarios where User_login='$usuario' and User_senha='$senha'";

		//executa uma query no banco utilizando POO e $conector vindo do requite db_conexao.php.
		$busca = $conector->query($sql);

		//verifica se houve dado
		$quantidade = mysqli_num_rows($busca);

		//verifica se foi encontrado algum registro

		if ($quantidade > 0) {	 
			//faz o loop no array para extrair os dados
			while($linha = $busca->fetch_array()) {
				//configura session
				$_SESSION["nome"] =  $linha["User_nome"];
				$_SESSION["cargo"] = $linha["User_cargo"];
				$_SESSION["email"] = $linha["User_email"];
				
			}
			//se tudo deu ok, redireciona para pagina principal
			header('Location:principal.php');
	 	}else{
	 		echo "usuario nao encontrado ";
	 		header('Location:index.php');
	 	}
 }
 ?>