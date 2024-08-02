<?php
// Start na sessão
session_start();

//1º_Conectando o Banco de Dados
include ("conexao.php");
$conn = conectar();

//2º_Verificar se os campos estão vazios
if (empty($_POST["email"]) || empty($_POST["senha"])) {
    header("Location: login_cadastro.php"); //Redirecionando o usuário para a página de login
    exit();
}

//3º_Recuperando os dados do formulário
$email = $_POST['email'];
$senha = MD5($_POST['senha']);

//4º_Realizar um Query no Banco para verificar se os dados do usuário são válidos.
$query = $conn->prepare("SELECT id FROM usuarios WHERE email=:e and senha=:s");

//5º_Validar os dados do usuário no Banco de Dados com método bindValue
$query->bindValue(":e", $email);
$query->bindValue(":s", $senha);

//6º_Executando a consulta com o método execute()
$query->execute();

//7º_Armazenando o resultado da consulta em uma variável
$row = $query->rowCount();

//echo $row;

//8º_Criar uma condição para verificar o resultado da consulta
//8.1 - Caso verdadeiro, redirecionar para a página de usuário logado
//8.2 - Caso falso, redirecionar para a página de login

// -- Criando um Login com Nível de Acesso --
if ($row == 1) {
    $verificar = $conn->query("SELECT *FROM usuarios");
    while ($linha = $verificar->fetch(PDO::FETCH_ASSOC)) {
        if ($linha['email'] == $email) {
            $nivel = $linha['painel'];

            switch ($nivel) {
                case 'cuidador':
                    $_SESSION['usuario'] = $email;
                    header("Location: index_cuidador.php");
                    exit();
                    break;
                case 'tutor':
                    $_SESSION['usuario'] = $email;
                    header("Location: index_tutor.php");
                    exit();
                    break;
                default:
                    $_SESSION['usuario'] = $email;
                    header("Location: painel_erro.php");
                    exit();
                    break;
            }
        }
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location:login_cadastro.php');
    exit();
}

/*
if ($row == 1) {
    $_SESSION['usuario'] = $email;
    header('Location:painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location:login.php');
    exit();
}
*/

?>