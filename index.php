
<!DOCTYPE html>
<html>
<head>
    <title></title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="loginform">
    <!--  PAGINA DE LOGIN validando no arquivo valida_login.php-->
    <form class="form-campos" action="valida_login.php" method="POST">       
      <h2>Login</h2>
      <hr>
      <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus="" />
      <input type="password" class="form-control" name="senha" placeholder="Senha" required /> 
      <br>     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>   
    </form>
  </div>
</body>
</html>