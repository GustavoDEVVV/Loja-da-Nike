<?php
 $nome = "";
 $telefone= "";
 $email = "";
 $senha = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$host 	= "localhost";
	$bd 	= "lojanike";
	$user 	= "root";
	$pass 	= "";

    try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id 		= $_POST['id'];
    
	$sql = "SELECT * FROM usuario WHERE id = :id";

	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();  

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $senha = $row['senha'];
        }
        else {
            $nome = "";
            $telefone= "";
            $email = "";
            $senha = "";
        }
    } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    }
  
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa e atualização cadastral</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

body{
    overflow-x: hidden;
    background-color: #0D0D0D;
    align-items: center;
    text-align: center;
    justify-content: space-between;
    margin: 0;
}


.logo-e-login{
    
    display: flex;
}

.logo-e-login #jordan{
    
    margin-left: 12px;
}

.logo-e-login a{
    padding: 4px;
    text-decoration: none;
    margin-top: 4px;
    margin-bottom: 4px;
    font-family: "Raleway", sans-serif;
    font-size: 0.8rem;
}

#entrar{
    margin-right: 0;
    color: aliceblue;
}

#ajuda{
    
    margin-left: 1220px;
    color: aliceblue;
}

/* header */
header{
    max-width: 100%;
    border-bottom: 2px solid #CEA96E;
    height: 70px;
    margin-bottom: 5%;
    display: flex;
    box-shadow:0px 5px 10px #cea96e92;
}

header #logo{
    align-items: center;
    text-align: center;
    margin-left: 18px;
    margin-top: 0.6em;
    width: 60px;
    
}

header a{

    text-decoration: none;
    font-size: 1.3rem;
    margin-bottom: 0;
    color: #CEA96E;
    margin-left: 50px;
    transition: 0.9s;
    font-family: "Bebas Neue", sans-serif;
}

header .links{

    margin-top: 1.5em;
}

header a:hover{
    text-decoration: underline;
}


input{
    border: none;
    background-color: white;
    width: 150px;
    margin-top: 12px;
    margin-left: 400px;
    font-family: "Bebas Neue", sans-serif;
    height: 40px;
    border-radius: 1rem;
}

input::placeholder {
    text-indent: 10px;
}

#teste{
    display: none;
}

header ion-icon{

    font-size: 1.5rem;
    margin-top: 19px;
    color: #CEA96E;
    margin-left: 12px;
}

h2{
    font-family: "bebas Neue", sans-serif;
    text-align: center;
    align-items: center;
    color: white;
    font-size: 2rem;
}

p{
    color: white;
    padding: 1rem;
    margin: 1.5%  0  0 5%;
    color: black;
    font-size: 1.2rem;
    font-family: "Raleway", sans-serif;
}

.box{
    background-color: white;
    width: 20%;
    margin-left: 40%;
    border-radius:1rem;
}

/* responsividade */
@media(min-width: 1440px) and (max-width: 3000px){

    
#ajuda{
    
    margin-left: 80rem;
}

header{
    height: 5rem;
    max-width: 100%;
}

header a{
    font-size: 1.5rem;
}

header #logo{
    margin-top: 0.7rem;
}

header ion-icon {
    font-size: 1.9rem;
    margin-top: 20px;
}

.links{
    margin-top: 1.5em;
}

input{        
    width: 190px;
    height: 40px;
    margin-left: 55em;
}

input::placeholder {
    font-size: 1.5rem;
    text-indent: 10px;
}

#btn-1{
    
    margin-left: 15em;
}

#btn-2{
    margin-right: 0;
    margin-left: 0;
}

#btn-3{
    margin-left: 15em;
}

}

@media(width <= 768px){

.logo-e-login{
    display: none;
}

#teste{
    display: inline-block;
}

header{
    max-width: 100%;
    display: block;
    height: 9em;
}

header #logo{

    width: 2em;
    margin-top: 1em;
}

header .links{

    font-size: 0.8rem;
    margin-top: 1em;
    
}

input{

    margin-left: 1em;
    width: 20em;
}

ion-icon{

    display: none;
}

.esportes #banner_esportes{
    margin: 0;
    width: 70%;
    height: 10%;
}

.esportes{
    gap: 0;
    display: block;
}

.academia{
    display: block;
}

.camisas{
    display: block;
}

.camisas .textos{
    margin: 0;
}

.camisas #camisa{
    width: 70%;
    height: 10%;
}

.academia #video{
    margin: auto;
    width: 80%;
    border-radius: 1rem;
}


.subtitulo .subtitulo2 .titulo{
    margin-left: 0;
}

#btn-1{        
    margin-left: 1em;
    width: 9em;
}

#btn-2{
    margin-left: 1em;
    width: 9em;
}

#btn-3{
    margin-left: 1em;
    width: 15em;
}

}

/* responsividade */

    </style>
</head>
<body>

<div class="logo-e-login">
        <a href="https://atendimento.nike.com.br/hc/pt-br" id="ajuda">Ajuda |</a>
        <a href="./html/login.html" id="entrar">Entrar |</a>
        <a href="./php/pesquisa.php" id="entrar">Pesquisar Usuários |</a>
        <a href="./html/delete.html" id="entrar">Deletar Usuários</a>
    </div>

    <header>

        <a id="logo" href="../index.html">
            <img id="logo" src="../img/index/logo.png" alt="">
        </a>

        <div class="links">
            <a id="camisas" href="../html/camisas.html">Camisas</a>
            <a id="sapatos" href="../html/sapatos.html">Sapatos</a>
            <a id="esportes" href="../html/esportes.html">Esportes</a>
            <a id="teste" href="../html/login.html">Login</a>
        </div>

        <label for="pesquisa">
            <input type="text" id="pesquisa" class=".input-with-margin" name="pesquisa" placeholder="Buscar">
        </label>

        <div class="carrinho">
            <a href="./html/carrinho.html">
                <ion-icon name="bag-outline"></ion-icon>
            </a>
            <ion-icon name="person-circle-outline"></ion-icon>
        </div>
    </header>

    <h2>Pesquisar Usuário</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h1>
            <input style="margin-left: 0px;" type="text" name="id" placeholder="Digite seu Id">
            <input style="margin-left: 0px;" type="submit" value ="Pesquisar">
        </h1>
    </form>  

    <div class="box">

        <?php if (!empty($nome)){ ?>
        <p>ID:<?php echo $id ?></p>
    <p>
        Nome:
    <?php echo $nome ?>
</p>
<p>
    Telefone:
<?php echo $telefone ?>
<p>
    E-mail:
<?php echo $email ?>
</p>
<p>
    Senha:
<?php echo $senha ?>
</p>
<?php } ?>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>