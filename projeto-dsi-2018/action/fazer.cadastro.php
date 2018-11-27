<?php
    require('../config/config.php');
    require('../class/UsuarioDAO.php');

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    if($email != false) {
        $usuariodao = new UsuarioDAO();
        $usuario = $usuariodao->cadastrar($email, $senha);
        header('location: '. SITE_HOME .'/login.php');
    } else {
        header('location: '. SITE_HOME .'/cadastro.php?erro');
    }
    
?>