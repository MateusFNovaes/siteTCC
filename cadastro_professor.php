<!doctype HTML>
<?php
	include "bd/conexao.php"
?>
<html>
<html>
	<title>página de cadastro</title>
	<meta charset="utf-8" lang="pt-br">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"
</html>
<body style="background-color:#808080;">
	<form action="" method="post" align="center">
	<br><label>Nome: <input type="text" class="form-control" name="nome" placeholder="Digite o nome"></label>
	<br><br><label>E-mail: <input type="email" class="form-control" name="usuario" placeholder="Digite o e-mail"></label>
	<br><br><label>Senha: <input type="password" class="form-control" name="senha" placeholder="******"></label>
	<br><br><label>Confirmar: <input type="password" class="form-control" name="senha1" placeholder="******"></label>
	<br><br><label>Curso: <input type="text" name="curso" class="form-control" placeholder="Curso ministrado"></label>
	<br><br><label><input type="submit" name="enviar" class="btn btn-info form-control" Value="Cadastrar">
	
<?php
	
		
	if (ISSET($_POST['enviar'])){
		
		if (empty($_POST['nome']) or empty($_POST['usuario']) or empty($_POST['senha']) or empty($_POST['senha1']) or empty($_POST['curso'])){
		echo "<br><br>Todos os campos precisam estar preenchidos";
		}
			
		else {
			
			$usuario = $_POST['usuario'];
			$ver="SELECT * FROM professor WHERE email='$usuario'";
			$consulta = mysqli_query($mysqli,$ver);
			$linha = mysqli_num_rows($consulta);
			 
 
				if($linha !== 0){
				echo "<br><br>O e-mail já está cadastrado.";
					}
				else
					{
						$nome=$_POST['nome'];
						$usuario=$_POST['usuario'];
						$senha=$_POST['senha'];	
						$senha1=$_POST['senha1'];
						$curso=$_POST['curso'];
		
						if ($senha !== $senha1)	{
						echo "<br><br>As senhas não batem";}
					
		
						else { 
						$sql="INSERT INTO `professor`(`nome`, `email`, `senha`, `curso`) VALUES ('$nome','$usuario','$senha', '$curso' )";
						mysqli_query($mysqli,$sql) or die("Erro ao tentar cadastrar registro");
						echo "Cadastro realizado com sucesso";
							}
					}
		}				
	}
	else "";		
?>	
	
</body>
</html>