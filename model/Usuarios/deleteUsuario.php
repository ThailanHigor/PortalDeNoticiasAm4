<?php 
	require ('../db_conexao.php');

	$id = $_GET['id'];

	$sql = "DELETE from usuarios where User_ID='$id'";

	$busca = $conector->query($sql);


	
 ?>