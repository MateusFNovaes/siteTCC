<!doctype HTML>
<?php
	
	//página responsável pelo login, os códigos abaixo são responsáveis por decidir qual o erro (se existir) na tentativa de login. 
	
	include "bd/conexao.php";
	session_start();
	?>
<html>
<html>
	<title>página de login</title>
	<meta charset="utf-8" lang="pt-br">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</html>
<body>
	
	<?php  if (!isset($_SESSION['verifica'])){   ?>
	<form method="post" action="verifica.php" align="center">
	<div class="container login">
	<label><input type="text" class="form-control" name="usuario" placeholder="E-mail"></label><br>
	<label><input type="password" class="form-control" name="senha" placeholder="Senha"></label><br>
	<input type="submit" name="submit" class="btn btn-info" value="Login" >
	</div>
	</form>
	<?php
	}
	elseif (ISSET($_SESSION['verifica']))
	{
		if ($_SESSION['verifica'] == "1") 
		{
	 
	 
	?>
	<form method="post" action="verifica.php" align="center">
	<div class="container login">
	<label><input type="text" class="form-control" name="usuario" value= "<?php echo $_SESSION['usuario'];?>"></label><br>
	<label><input type="password" class="form-control figuras" style="box-shadow: 0px 0px 5px 0px red;" name="senha" placeholder="Senha incorreta"></label><br>
	<input type="submit" name="submit" class="btn btn-info" value="Login" >
	</div>
	</form>

	<?php	}	
		elseif ($_SESSION['verifica'] == "2")
		{
			?><form method="post" action="verifica.php" align="center">
	<div class="container login">
	<label><input type="text" class="form-control" style="box-shadow: 0px 0px 5px 0px red;" name="usuario" placeholder="E-mail incorreto"></label><br>
	<label><input type="password" class="form-control" name="senha" placeholder="Senha"></label><br>
	<input type="submit" name="submit" class="btn btn-info" value="Login" >
	</div>
	</form>
		<?php
		}
		
		elseif ($_SESSION['verifica'] == "3")
		{
		?> <form method="post" action="verifica.php" align="center">
	<div class="container login">
	<label><input type="text" class="form-control" name="usuario" placeholder="E-mail"></label><br>
	<label><input type="password" class="form-control" name="senha" placeholder="Senha"></label><br>
	<input type="submit" name="submit" class="btn btn-info" value="Login" >
	</div>
	<div align="center">Preencha ambos os campos</div>
	</form>
	
		<?php
	}
		else echo "";
	}
	
	else echo "";
	
	UNSET ($_SESSION['verifica']);
	
	?>
</form>	

<p align="center"><a href="cadastro_aluno.php" style="align:center;">Não possui conta? Cadastre-se</a></p>
</body>
</html>