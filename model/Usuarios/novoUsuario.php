<?php 
	require ('../db_conexao.php');

	$nome= $_POST['Nome'];
	$email= $_POST['Email'];
	$login= $_POST['Login'];
	$senha= $_POST['Senha'];
	$cargo= $_POST['Cargo'];



	$sql = "INSERT INTO usuarios (User_nome,User_email,
	User_login,User_senha,User_cargo) values(
	'$nome','$email','$login','$senha','$cargo')";
	   
	$executa = $conector->query($sql)or die("Erro ao inserir.");
	header('Location:/portal/administracao.php');
 
	 

 ?>