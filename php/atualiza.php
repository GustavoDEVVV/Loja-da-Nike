<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$host 	= "localhost";
	$bd 	= "lojanike";
	$user 	= "root";
	$pass 	= "";

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$email 		= $_POST['email'];
		$senha 		= $_POST['senha'];

        
        $sql = "UPDATE usuario SET senha = :senha WHERE email = :email";

        $stmt = $pdo->prepare($sql);

		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        if ($stmt->execute()){
            echo "cadastro atualizado com sucesso!";
        } else { echo "Cadastro não atualizado!";}

	} catch (PDOException $e) {
		echo "Erro: " . $e->getMessage();
	}

} else {
	echo "Você não tem permissão para acessar o site!";
}

?>