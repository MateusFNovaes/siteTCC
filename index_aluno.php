<!doctype HTML>

<?php
	session_start();
	include "bd/conexao.php";
 
?>

<html>
<head>
<meta charset="utf-8" lang="pt-br">
<title>Área do aluno</title>
<?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM aluno WHERE email = '$email'";
$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
$dados = mysqli_fetch_array($con);

$_SESSION['idaluno'] = $dados['idAluno'];
$_SESSION['grupo'] = $dados['codGrupo']; 
?>

</head>
<body>
<h1 align="center">Aqui vai ser a área do aluno</h1>


</body>

</html>