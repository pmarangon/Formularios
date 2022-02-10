
<?php
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro Escola</title>
</head>
<body>
  <h1> Cadastrar</h1>
  <form name= "cad-escola" method= "POST" action="index.php">
    <label>Nome: </label> 
    <input type = "text" name="escola" id="escola" placeholder="Nome da Escola "><br /><br />
    <label>E-mail:</label> 
    <input type = "email" name="escola" id="email" placeholder="Digite o  email da Escola "><br /> <br />
    <label>Senha:</label> 
    <input type = "password" name="senha" id="senha" placeholder="Escolha uma senha "><br /> <br />
    <input type="submit" value="Cadastrar" name="CadEscola"/>
  </form>
</body>
</html>