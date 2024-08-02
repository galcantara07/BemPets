<?php
session_start();//Iniciando a sessão

//Verificando se existi um usuário logado
include ('scriptverificalogin.php');

?>

<!--Mostrar o e-mail do usuário logado-->
<div align="right">
    <h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>
</div>

<!--Link para encerrar a sessão do usuário -->
<nav align="right">
    <h3><a href="scriptlogout.php">Sair</a></h3>
</nav>

<div align="center">
    <h1>Usuário sem nível de acesso</h1>
    <h2>Por favor, entre em contato com o administrador!</h2>
</div>