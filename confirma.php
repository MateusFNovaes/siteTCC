
<?php
 include "bd/conexao.php";
 session_start();

if (isset($_POST['submit'])){
	
	
	
	$busca = "SELECT * FROM aluno WHERE idAluno = ".$_SESSION['idaluno'];
	$con = mysqli_query($mysqli,$busca) or die (mysqli_error($mysqli));
	$dadosusuario = mysqli_fetch_array($con);	
	
	$buscap = "SELECT * FROM projeto WHERE codGrupo = '".$dadosusuario['codGrupo']."'";
	$conexao = mysqli_query($mysqli,$buscap) or die (mysqli_error($mysqli));
	$dadosprojeto = mysqli_fetch_array($conexao);
	$cont = mysqli_num_rows($conexao);
	
	
	if ($cont == 0)	{
		
		
		$sqlcod = "SELECT * FROM aluno WHERE codGrupo = '".$dadosusuario['codGrupo']."'";
		$conexao1 = mysqli_query($mysqli,$sqlcod) or die (mysqli_error($mysqli));
		$dado = mysqli_fetch_array($conexao1);
		$contador = mysqli_num_rows($conexao1);
		
		echo $contador;
		echo $dadosprojeto['qtd_alunos'];
		
		if ($contador <= $dadosprojeto['qtd_alunos']){
	
	
			$sql = "UPDATE projeto SET codGrupo ='".$_SESSION['grupo']."' WHERE idprojeto = ".$_SESSION['projetoid'];
			$con = mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli));
			echo "Foi realizado com sucesso!!";
		
			}
		
		else {
			
			echo "Seu grupo possui uma quantidade de membros superior a exigida no projeto!";
			
		}
	
	
	}
	
	
	else {
		
	echo "Seu grupo já possui um projeto";
		
			}
}

else {
	echo "";
}

?>