<?php
require 'Conn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Ilustrador</title>
    </head>
    <body>
        <h1>Cadastrar</h1>
        <?php
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['CadIlustrador'])) {
            //var_dump($dados);

            $empty_input = false;

            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
            }

            if (!$empty_input) {
                $query_usuario = "INSERT INTO ilustrador (nome, sobrenome, email, Whats, Portifolio, login,   senha) VALUES (:nome, :sobrenome, :email, :Whats, :Portifolio, :login, :senha) ";
                $cad_usuario = $conn->prepare($query_usuario);
                $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':sobrenome', $dados['sobrenome'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':Whats', $dados['Whats'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':Portifolio', $dados['Portifolio'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':login', $dados['login'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
                $cad_usuario->execute();
                if ($cad_usuario->rowCount()) {
                    echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                    unset($dados);
                } else {
                    echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
                }
            }
        }
        ?>
        <form name="cad-usuario" method="POST" action="">
            <label>Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome " value="<?php
            if (isset($dados['nome'])) {
                echo $dados['nome'];
            }
            ?>"><br><br>
            <label>sobrenome: </label>
            <input type="text" name="sobrenome" id="sobrenome"  value="<?php
            if (isset($dados['sobrenome'])) {
                echo $dados['sobrenome'];
            }
            ?>"><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" id="email" placeholder="Seu melhor e-mail" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
            ?>"><br><br>
            <label>Whats: </label>
            <input type="Whats" name="Whats" id="Whats"  value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
            ?>"><br><br>
            <label>Portifolio: </label>
            <input type="Portifolio" name="Portifolio" id="Portifolio" placeholder="Deixe o link do seu portifolio" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
            ?>"><br><br>
            <label>Login: </label>
            <input type="login" name="login" id="login" placeholder="Escolha um nome de usuário" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
            ?>"><br><br>
             <label>Senha: </label>
            <input type="password" name="senha" id="email" placeholder="Escolha uma senha" value="<?php
            if (isset($dados['senha'])) {
                echo $dados['senha'];
            }
            ?>"><br><br>

            <input type="submit" value="Cadastrar" name="CadIlustrador">
        </form>
    </body>
</html>