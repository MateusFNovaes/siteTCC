<!doctype HTML>

<?php 

//página para qual a variável global (id do projeto) será enviada.
	 include "bd/conexao.php";
 session_start();
	
 $idprojeto = $_GET['id'];

?>

<html>
<head>

<title>Escolher projetos</title>


</head>
<body>

<?php 

$sql = "SELECT * FROM projeto WHERE idprojeto =". $idprojeto.";";
$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
$dados = mysqli_fetch_array($con);

//pegar as informações do aluno
$sql = "SELECT codGrupo FROM aluno WHERE email = '". $_SESSION['usuario']."';";
$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
$dadosusuario = mysqli_fetch_array($con);
$_SESSION['grupo'] = $dadosusuario['codGrupo'];
$_SESSION['projetoid'] = $idprojeto;


ECHO "<h4>Nome do projeto:</h4>".$dados['nome'];  
ECHO "<h4>Descrição do projeto:</h4>".$dados['descricao'];	
ECHO "<h4>Requisitos do projeto:</h4>".$dados['requisitos'];
ECHO "<h4>Quantidade de alunos:</h4>".$dados['qtd_alunos'];

?>

<form action="confirma.php" method="post">
<input type="submit" name="submit" value="Confirmar">
</form>


</body>

</html>

