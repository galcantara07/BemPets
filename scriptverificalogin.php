<?php
//Verificando se existe um usuário logado
//Caso contrário redirecionar para a tela de login

if (!$_SESSION['usuario']) {
    header('Location: login_cadastro.php');
    exit();
}


?>  