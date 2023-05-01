<?php

    function verifica_usuario($tipo_usuario) {
    $senha_criptografada = md5($_POST['password']);
    $mysqli = new mysqli ("localhost", "root", "root", "car_leasing");
    $usuarios = $mysqli->query(
        "SELECT * FROM `usuarios` WHERE nome='{$_POST['username']}' 
        AND senha='{$senha_criptografada}' AND tipo='{$tipo_usuario}'");

    return $usuarios->fetch_assoc();
}

    $usuario_admin = verifica_usuario('admin');
    $usuario_cliente = verifica_usuario('cliente');

    if ($usuario_admin == null && $usuario_cliente == null) {
        $erro = "Usuário ou senha inválidos.";
        header("Location: index.php?erro=" . urlencode($erro));
    } else if ($usuario_admin != null) {
        header("Location: tela_admin.php");
    } else {
        header("Location: tela_cliente.php");
    }
    ?>





