<!doctype html>
<html>
<?php
	session_start();
	include "bd/conexao.php";
	if(ISSET($_SESSION['permissao'])){
		
		
	$ajuda = 1;
	?>
	
<head>

<title>página dos projetos</title>
	<meta charset="utf-8" lang="pt-br">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="javascript.js" type="text/javascript"></script>	
</head>
<body>

<?php

//parte responsável por alocar os projetos que estão no banco de dados.
$sql = "SELECT * FROM projeto WHERE codGrupo is NULL";
$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
$dados = mysqli_fetch_array($con);
$linhas =mysqli_num_rows($con);

for ($cont = 0; $cont < $linhas; $cont++) { 
?>

<div class="projeto"  onClick="mostrar()"><?php echo $dados['nome'];?></div>
	<div class="descricao"><?php echo $dados['descricao']; ?><div> <br>
	<form method="post" action="#" id="ola">
</form>
	<a href="escolher.php?id=<?php echo $dados['idprojeto']; ?>">veja mais</a>
	
<?php
	
	
	//essa parte comentada abaixo é a que mudaria a página quando o aluno escolhesse o projeto.
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		header('location:escolher.php');
		
		
	}

	//else{
	$dados = mysqli_fetch_array($con);//}
	$ajuda ++;
	
}
	
	}
	else {
		header('location:login.php');
		
	}
	

	
?>

</body>



</html>