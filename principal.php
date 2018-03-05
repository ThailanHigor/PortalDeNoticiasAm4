
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
	<title>Portal</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script type="text/javascript" src="js/angular_crud.js"></script>

<body ng-app="portal" ng-controller='exibeNoticias'>

	<header><br>
	<!--  HEADER PRINCIPAL -->
		<div>	
			<div class='header'>
				<div class="area-admin">
				
				<center>
					<label>Adminstração</label></br>
					<a rel="stylesheet" type="text/css" class='btn btn-outline-dark' href="administracao.php">Entrar</a>			
					</center>
				</div>
				<center>
				<img src="imagens/am4_logo.png" width="120" id='logotipo' ></center>

		</div>


		<div class='box-dados'>
					<!--  exibe dados do session-->
					<?php
					session_start();
					echo "<p> Usuario: " . $_SESSION["nome"] . ".</p>";
					echo "<p> Cargo: " . $_SESSION["cargo"] . "</p>";
					echo "<p> Email: " . $_SESSION["email"] . "</p>";
					?>
		</div>


	</header>
		<div class='nav-filtros'>
		<!-- filtragem dinamica angular com qualquer campo -->
			<div class="nav-botoes">
			<label>Filtro:</label>
			<input type="text" ng-model='titulo' name="porTitulo">
			</div>
		</div>

	<section ng-controller='vermaisNoticias' >
		<div class='lista-noticias'>
			<table border="1px" class='table'  ng-show='noticias'>
				<tr>
					<th scope="col">Titulo</th>
					<th scope="col">Data</th>
					<th scope="col">Chamada</th>
					<th scope="col">Autor</th>
					<th scope="col">Materia</th>
					
				</tr>
				<!--  exibe noticias com opçao de ver mais-->
				<tr ng-repeat="x in mydata | filter:titulo">
					<td>{{ x.Not_titulo}}</td>
					<td>{{ x.Not_data}}</td>
					<td>{{ x.Not_chamada}}</td>
					<td>{{ x.Not_autor}}</td>
					<td><a href="" ng-click='showmais(x.Not_texto,x.Not_titulo)'>Ver mais..</a></td>

				</tr>

				
		</table><!-- exibe ver mais quando a noticia for selecionada -->
		<div ng-show='vermais'>
			<center>
				<h1>{{titulo}}</h1>
			</center>
			<br>
			<p>{{txt}}</p>
			<center>
				<a href="principal.php" class='btn btn-outline-dark'>Voltar</a>
			</center>
		</div>


		</div>

	</section>
	<footer></footer>
</body>
</html>