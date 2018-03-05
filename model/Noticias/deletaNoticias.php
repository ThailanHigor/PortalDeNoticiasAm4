<?php 
	require ('../db_conexao.php');

	//recebe id
	$id = $_GET['id'];
	//query
	$sql = "DELETE from noticias where Not_ID='$id'";
	//executa query
	$busca = $conector->query($sql);


	
 ?>