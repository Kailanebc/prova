<?php

    if ($_POST['password'] !== $_POST['password_repeat']) {
        $erro = "Senhas Diferentes.";
        header("Location: tela_cadastro-cliente.php?erro=" . urlencode($erro));
    }else{
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        $senha = md5($_POST['password']);
        $tipo = $_POST['tipo'];

        $mysqli = new mysqli("localhost", "root", "root", "car_leasing");
        $sql = "INSERT INTO `usuarios`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `senha`, `tipo`) VALUES ('".$nome."', '".$endereco."', '".$telefone."','".$email."', '".$data_nascimento."','".$senha."', '".$tipo."')";

        $mysqli->query($sql);
        header('Location: index.php');
    }
?>