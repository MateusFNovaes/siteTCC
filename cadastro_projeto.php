<!doctype HTML>
<?php

	session_start();
	include "bd/conexao.php";
	if(ISSET($_SESSION['permissao'])){
?>
<html>

	<title>página de cadastro</title>
	<meta charset="utf-8" lang="pt-br">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<body style="background-color: #808080;">	
	<div>
		<div class="row">
			<div class="col-md-6" style="margin-left: 25%" class="form-group">
				<form action="" method="post" align="center" class="">
				<br><label>Nome: <input type="text" name="nome" class="form-control" placeholder="Digite o nome"></label>
				<br><br><label>Descrição: <textarea class="form-control" name="descricao" placeholder="Descrição do sistema"></textarea></label>
				<br><br><label>número de alunos: <input type="number" class="form-control" name="numero" min="2" max="10"></label>
				<br><br><label>requisitos: <textarea class="form-control" name="requisitos" placeholder="Requisitos do sistema."></textarea></label>
				<br><br><label><input type="submit" name="enviar" Value="Cadastrar" class="btn btn-info form-control" >
			</div>	
		</div>
	</div>	
		
<?php
	
		
	if (ISSET($_POST['enviar'])){
		
		
		
		if (empty($_POST['nome']) or empty($_POST['descricao']) or empty($_POST['numero']) or empty($_POST['requisitos'])){
		echo "<p align='center'><br><br>Todos os campos precisam estar preenchidos";
		}
			
		
		else {

		if($_SESSION['permissao'] == "2"){
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$qtd = $_POST['numero'];
		$requisitos = $_POST['requisitos'];
		
		$sql="INSERT INTO `projeto`(`nome`,`descricao`,`qtd_alunos`,`requisitos`) VALUES ('$nome','$descricao','$qtd','$requisitos')";
		mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<p align='center'>Cadastro realizado com sucesso!";}
		
		
		elseif($_SESSION['permissao'] == "1"){
		
		$grupo = $_SESSION['grupo'];	
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$qtd = $_POST['numero'];
		$requisitos = $_POST['requisitos'];
		
		$sql="INSERT INTO `aprovacao`(`nome`,`descricao`,`qtd_alunos`,`requisitos`, `grupo`) VALUES ('$nome','$descricao','$qtd','$requisitos','$grupo')";
		mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<p align='center'>Cadastro aguardando aprovação!";}
		
		
		else {
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$qtd = $_POST['numero'];
		$requisitos = $_POST['requisitos'];
		
		$sql="INSERT INTO `projeto`(`nome`,`descricao`,`qtd_alunos`,`requisitos`) VALUES ('$nome','$descricao','$qtd','$requisitos')";
		mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<p align='center'>Cadastro realizado com sucesso!";
		}
						
						}
					
					}
					
	else "";
	}
	
	else {
		
		header('location:login.php');
		
	}
?>	
	
</body>
</html>