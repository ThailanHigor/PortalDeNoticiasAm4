<?php 

	require ('../db_conexao.php');

	$id = $_GET['id'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	$cargo = $_GET['cargo'];
	


	$sql = "UPDATE usuarios set
	User_nome='$nome',
	User_email='$email',
	User_login='$login',
	User_senha='$senha',
	User_cargo='$cargo'
	 where User_ID = '$id'";

	$busca = $conector->query($sql);

	
	
 ?>