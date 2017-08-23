<!doctype html>
<html>
<?php
	session_start();
	include "bd/conexao.php";
	if(ISSET($_SESSION['permissao'])){
		
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
$sql = "SELECT * FROM projeto WHERE codGrupo ='" .$_SESSION['grupo']."'";
$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
$dados = mysqli_fetch_array($con);
$linhas =mysqli_num_rows($con);

		if ($linhas == 0) {
	
	
			?>
		
			<h5>Seu grupo ainda não tem um projeto</h5>
			<a href="cadastro_projeto.php">Cadastre</a>
			<a href="pagina_projetos.php">Escolha</a>
	

	
			<?php	}

		else {
	


			ECHO "<h4>Nome do projeto:</h4>".$dados['nome'];  
			ECHO "<h4>Descrição do projeto:</h4>".$dados['descricao'];	
			ECHO "<h4>Requisitos do projeto:</h4>".$dados['requisitos'];
			ECHO "<h4>Quantidade de alunos:</h4>".$dados['qtd_alunos'];
	}


	
	}

	
else {
		header('location:login.php');
		
	}

	
?>

</body>



</html>

