<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$host 	= "localhost";
	$bd 	= "base_turma01";
	$user 	= "root";
	$pass 	= "";

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$nome 		= $_POST['nome'];
		$telefone 	= $_POST['telefone'];
		$email 		= $_POST['email'];
		$senha 		= $_POST['senha'];

		$sql = "INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";

		$stmt = $pdo->prepare($sql);

		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

		$stmt->execute();

		echo "Usuário cadastrado com xuxexuuu!";

	} catch (PDOException $e) {
		echo "Erro: " . $e->getMessage();
	}

} else {
	echo "Você não tem permissão para acessar o site!";
}

?>