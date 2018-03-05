<?php 
	require ('../db_conexao.php');

	//recebe dados do post formulario
	$titulo= $_POST['titulo'];
	$chamada= $_POST['chamada'];
	$data= $_POST['data'];
	$autor= $_POST['autor'];
	$texto= $_POST['texto'];
	//recebe informaçoes sobre a imagem
	$image = $_FILES['imagem']['tmp_name'];
  	$nome = $_FILES['imagem']['name'];

  	
	  if ( $image != "none" )
	  {
	  	//query
		$sql = "INSERT INTO noticias(Not_titulo,
		Not_chamada,
		Not_texto,
		Not_data,
		Not_autor,Not_imagem) values(
		'$titulo','$chamada','$texto','$data','$autor','$nome');";

	  //executa a query 
	 $executa = $conector->query($sql)or die("Erro ao inserir.");
	  header('Location:/portal/administracao.php');
	  //move a imagem para o servidor diretorio: Noticias/imagens
	  move_uploaded_file($image,DIRIMAGEM.$nome);
	   }

	 
	 

 ?>