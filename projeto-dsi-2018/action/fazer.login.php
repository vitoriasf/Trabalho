<?php
    require('../config/config.php');
    require('../class/UsuarioDAO.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuariodao = new UsuarioDAO();
    $usuario = $usuariodao->getUsuario($email);

    //$senhaGravada = password_hash("123456", PASSWORD_DEFAULT);

    if(password_verify($senha, $usuario->senha)) {
        session_start();
        session_regenerate_id();
        $_SESSION['usuario']['id'] = $usuario->id;
        $_SESSION['usuario']['email'] = $_POST['email'];
        header('location: '. SITE_HOME .'/index.php');
    } else {
        header('location: '. SITE_HOME .'/login.php?erro');
    }
?>