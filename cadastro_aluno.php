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
<body style="background-color: #808080;">	
	<div>
		<div class="row">
			<div class="col-md-6" style="margin-left: 25%" class="form-group">
				<form action="" method="post" align="center" class="">
				<br><label>Nome: <input type="text" name="nome" class="form-control" placeholder="Digite seu nome"></label>
				<br><br><label>E-mail: <input type="email" class="form-control" name="usuario" placeholder="Digite seu e-mail"></label>
				<br><br><label>Senha: <input type="password" class="form-control" name="senha" placeholder="******"></label>
				<br><br><label>Confirmar Senha: <input type="password" class="form-control" name="senha1" placeholder="******"></label>
				<br><br><label>Código: <input type="text" class="form-control" name="codigo" placeholder="Digite o código do seu grupo"></label>
				<br><br><label><input type="submit" name="enviar" Value="Cadastrar" class="btn btn-info form-control" >
			</div>	
		</div>
	</div>	
		
<?php
	
		
	if (ISSET($_POST['enviar'])){
		
		if (empty($_POST['nome']) or empty($_POST['usuario']) or empty($_POST['senha']) or empty($_POST['senha1']) or empty($_POST['codigo'])){
		echo "<p align='center'><br><br>Todos os campos precisam estar preenchidos";
		}
			
		else 
		{	$usuario = $_POST['usuario'];
			$ver="SELECT * FROM aluno WHERE email='$usuario'";
			$consulta = mysqli_query($mysqli,$ver);
			$linha = mysqli_num_rows($consulta);
			 
 
				if($linha !== 0){
				echo "<p align='center'><br><br>O e-mail já está cadastrado.";
					}
				else
					{
						$codigo=$_POST['codigo'];
						$usuario = $_POST['usuario'];
						$sql="SELECT * FROM grupo WHERE codGrupo='$codigo'";
						$consulta = mysqli_query($mysqli,$sql);
						$linha = mysqli_num_rows($consulta);
						
						if ($linha == 0){
							echo "<p align='center'><br><br>Código de acesso inválido";
						
						}
						
						else {
						$nome=$_POST['nome'];
						$usuario=$_POST['usuario'];
						$senha=$_POST['senha'];	
						$senha1=$_POST['senha1'];
						//$codigo=$_POST['codigo'];
		
						if ($senha !== $senha1)	{
						echo "<p align='center'><br><br>As senhas não batem";}
					
		
						else { 
						$sql="INSERT INTO `aluno`(`nome`,`email`,`senha`,`codGrupo`) VALUES ('$nome','$usuario','$senha','$codigo')";
						mysqli_query($mysqli,$sql) or die("Erro ao efetuar cadastro");
						echo "<p align='center'>Cadastro realizado com sucesso";
						header ("Location: login.php");
						}
					}
					}
	}
	}
	else "";		
?>	
	
</body>
</html>