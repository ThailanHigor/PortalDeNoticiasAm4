<!DOCTYPE html>
<html>
<head>
	<title>Portal</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script type="text/javascript" src="js/angular_crud.js"></script>

</head>
<body ng-app="portal">
	 <!-- HEADER PAGINA PRINCIPAL -->
	<header><br>
		<div>
			<div>
				<div class="area-admin">
				<center>
					<a rel="stylesheet" type="text/css" class='btn btn-outline-dark' href="index.php">Sair</a>			
				</center>
				</div>
				<center><img src="imagens/am4_logo.png" width="120" id='logotipo' ></center>

		</div>

	</header>
		<div class='nav-filtros'>
			<center><h3>Administração</h3></center>
		</div>
 	<!-- MENU LATERAL PRINCIPAL -->
	<section ng-controller='crud'>
		<div class='container-fluid'>
			<div class="row content">
				<div class="menu-adm">
					<div class="btn-group-vertical">
					<!-- Cada botao chamando sua funcao no arquivo angular_crud.js -->
						<button type="button" class="btn btn-outline-warning " ng-click="showNoticia()">Notícias</button>

						<button type="button" class="btn btn-outline-warning" ng-click="showNovaNoticia()
						">Nova Noticia</button>

						<button type="button" ng-click="showListaUsuarios()" class="btn btn-outline-warning">Usuários</button>

						<button type="button" ng-click="showNovoUsuario()" class="btn btn-outline-warning">Novo Usuário</button>

		  			</div>
				</div>
				

		<!-- CONTROLE CRUD/ANGULAR - Divs dinamicas utilizando angular e NG-SHOW -->
				
			<div  id=lista class='lista-crud col-md-10' ng-controller='exibeNoticias'>


				<!-- EXIBE NOTICIAS -->	

					<table border="1px"  class='table'  ng-show='Noticia'>
			
						<tr>
							<th>Titulo</th>
							<th>Data</th>
							<th>Chamada</th>
							<th>Autor</th>
							<th>Editar</th>
							<th>Deletar</th>
							
						</tr>
							

						<!-- for dinamico angular -->	
						<tr ng-repeat="x in mydata">
							<td>{{ x.Not_titulo}}</td>
							<td>{{ x.Not_data}}</td>
							<td>{{ x.Not_chamada}}</td>
							<td>{{ x.Not_autor}}</td>

							<!-- editar dinamico passando campos como parametros -->	
							<td><a href="" ng-click="showEditaNoticia(x.Not_ID,x.Not_titulo,x.Not_chamada,x.Not_texto,x.Not_autor)">editar</a>
							<!-- delete dinamico passando id  -->	
							<td><a href="" ng-controller='delete' ng-click="delete(x.Not_ID,$index)">deletar</a></td>
						</tr>
						
					</table>

				<!-- NOVA NOTICIA -->	
					<div ng-show='NovaNoticia' >
						<form  enctype="multipart/form-data" method="POST" action="model/Noticias/novaNoticias.php">
						  <div class="form-row">
						    <div class="form-group col-md-4">
						      <label for="titulo">Título</label>
						      <input type="text"  name ='titulo' class="form-control" id='titulo' placeholder="Informe o Titulo da notícia">
						    </div>

						    <div class="form-group col-md-8">
						      <label for="chamada">Chamada</label>
						      <input type="text" name 	='chamada' class="form-control" id='chamada' placeholder="Informe a chamada da notícia" >
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-md-2">
						      <label for="data">Data</label>
						      <input type="date" name='data' class="form-control" id='data'>
						    </div>

						    <div class="form-group col-md-2">
						      <label for="autor">Autor</label>
						      <input type="text" name='autor' class="form-control" id="autor" placeholder="Autor">
						    </div>
				
						   <div class="form-group">
						    <label for="imagem">Imagem</label>
						    <input type="file" name='imagem' class="form-control-file" id="imagem">
						  </div>
						  </div>


						  <div class="form-group">
						  	<div class="form-group col-md-12">
						   		<label for="textarea">Texto</label>
						   	 	<textarea class="form-control" name='texto' id="textarea" rows="5"></textarea>
						    </div>
						  </div>
						  <center>
						  <button type="submit" class="btn btn-primary">Salvar</button>

						  </center>
						</form>

					</div>


				<!-- EDITA NOTICIA -->
					<div id='edita-noticia' ng-controller='atualiza' ng-show="EditaNoticia">
						
						<form  enctype="multipart/form-data" method="POST" >
						
						  <div class="form-row">
						    <div class="form-group col-md-4">
						      <label for="titulo">Título</label>
						      <input type="text" ng-model='titulo' name ='titulo' class="form-control" placeholder="Informe o Titulo da notícia">
						    </div>
						       <div class="form-group col-md-2">
						      <label for="autor">Autor</label>
						      <input type="text" ng-model='autor' name='autor' class="form-control" placeholder="Autor">
						    </div>

						    <div class="form-group col-md-10">
						      <label for="chamada">Chamada</label>
						      <input type="text" name='chamada'
						      ng-model='chamada' class="form-control"  placeholder="Informe a chamada da notícia" >
						    </div>
						  </div>
						  <div class="form-row">

						 
				
						
						  </div>


						  <div class="form-group">
						  	<div class="form-group col-md-12">
						   		<label for="exampleFormControlTextarea1">Texto</label>
						   	 	<textarea class="form-control" ng-model='texto' name='texto' rows="5"></textarea>
						    </div>
						  </div>

						  <center>
						  <button type="submit" class="btn btn-primary" ng-click='atualiza(id,titulo,chamada,autor,texto,$index)'>Editar</button>



						  </center>
						</form>

					</div>


				<!-- EXIBE USUARIOS -->
					<div ng-controller='exibeUsuarios'>
						<table border="1px"  class='table'  ng-show='ListaUsuarios'>
			
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Cargo</th>
							<th>Editar</th>
							<th>Deletar</th>
							
						</tr>
							

						<tr ng-repeat="x in usuarios">
							<td>{{ x.User_nome}}</td>
							<td>{{ x.User_email}}</td>
							<td>{{ x.User_cargo}}</td>
							<td><a href="" ng-click="showEditaUsuario(x.User_ID,x.User_nome,x.User_email,x.User_login,x.User_senha,x.User_cargo)">editar</a>
							<td><a href="" ng-controller='deleteUsuario' ng-click="deleteUser(x.User_ID,$index)">deletar</a></td>
						</tr> 
						
					</table>

					</div>


				<!-- NOVO USUARIO -->

					<div ng-show='NovoUsuario' >
								<form  method="POST" action="model/Usuarios/novoUsuario.php">
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="Nome">Nome</label>
								      <input type="text"  name ='Nome' class="form-control" id='Nome' placeholder="Digite seu Nome">
								    </div>

								    <div class="form-group col-md-6">
								      <label for="Email">Email</label>
								      <input type="email" name='Email' class="form-control" id='Email' placeholder="Digite seu email" >
								    </div>
								  </div>
								  <div class="form-row">
								 	 <div class="form-group col-md-5">
								      <label for="Login">Login</label>
								      <input type="text" name='Login' class="form-control" id="Login" placeholder="Login">
								    </div>


								    <div class="form-group col-md-5">
								      <label for="Senha">Senha</label>
								      <input type="password" name='Senha' class="form-control" id="Senha" placeholder="Senha">
								    </div>
						
							 		<div class="form-group col-md-2">
								      <label for="Cargo">Cargo</label>
								      <input type="text" name='Cargo' class="form-control" id="Cargo" placeholder="Cargo">
								    </div>
						
								  </div>

								  <center>
								  <button type="submit" class="btn btn-primary">Salvar</button>

								  </center>
								</form>

					</div>			
	
				
				<!-- EDITA USUARIO -->
					<div ng-show='EditaUsuario'  ng-controller='atualizaUser' >
								<form  method="POST" action="model/Usuarios/editaUsuario.php">
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="Nomeedit">Nome</label>
								      <input type="text" ng-model="nome"  name ='Nome' class="form-control" id='Nomeedit' placeholder="Digite seu Nome">
								    </div>

								    <div class="form-group col-md-6">
								      <label for="Emailedit">Email</label>
								      <input type="email" name='Email' ng-model="email"  class="form-control" id='Emailedit' placeholder="Digite seu email" >
								    </div>
								  </div>
								  <div class="form-row">
								 	 <div class="form-group col-md-5">
								      <label for="Loginedit">Login</label>
								      <input type="text" name='Login' ng-model="login"  class="form-control" id="Loginedit" placeholder="Login">
								    </div>


								    <div class="form-group col-md-5">
								      <label for="Senhaedit">Senha</label>
								      <input type="password" name='Senha' ng-model="senha"  class="form-control" id="Senhaedit" placeholder="Senha">
								    </div>
						
							 		<div class="form-group col-md-2">
								      <label for="Cargoedit">Cargo</label>
								      <input type="text" name='Cargo' ng-model="cargo"  class="form-control" id="Cargoedit" placeholder="Cargo">
								    </div>
						
								  </div>
								  
								
								  <center>
					 			     <button type="submit" class="btn btn-primary" ng-click='atualizaUser(iduser,nome,email,login,senha,cargo,$index)'>Editar</button>
								  </center>
								</form>
		

		</div>
	</div>

	</section>
	<footer></footer>

	<script type="text/javascript">
	</script>
</body>
</html>