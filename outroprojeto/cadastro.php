<?php
 include("conexao.php");
 
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$empresa=$_POST['empresa'];
 
$verificar = ("SELECT email FROM atores WHERE email = '$email'");
$resultado = mysqli_query($conexao, $verificar);
if (mysqli_num_rows($resultado) > 0) { 
	echo "Email já cadastrado";
}
else {
	$sql="INSERT INTO atores(nome, email, senha, empresa)
		VALUES ('$nome', '$email', '$senha', '$empresa')";
			
		if(mysqli_query($conexao, $sql)){
			header("Location: Login.html");
		}
		mysqli_close($conexao);}
		
if (mysqli_connect_errno()) {
	echo "Falha na conexão ao MySQL: " . mysqli_connect_error();
}
?>