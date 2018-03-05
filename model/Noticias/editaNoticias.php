<?php 

	require ('../db_conexao.php');

	$id = $_GET['ide'];
	$titulo = $_GET['titulo'];
	$autor = $_GET['autor'];
	$texto = $_GET['texto'];
	$chamada = $_GET['chamada'];




	$sql = "UPDATE noticias set Not_titulo='$titulo',
	Not_chamada='$chamada',
	Not_autor='$autor',
	Not_texto='$texto'
	 where Not_ID = '$id'";

	$busca = $conector->query($sql);

	
	
 ?>