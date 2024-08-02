<?php
//Start na sessão
session_start();

//Conectando com o Banco de Dados
include ("conexao.php");
$conn = conectar();

//Recuperando os dados do formulário com o método POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$telefone = $_POST['telefone'];
$painel = $_POST['painel'];

//Preparando o INSERT INTO com pseudo-nome para cadastrar no Banco de Dados
$cadastro = $conn->prepare("INSERT INTO usuarios(nome, email, senha, telefone, painel)
VALUES(:nome, :email, :senha, :telefone, :painel)");

//Passando os dados das variáveis para os pseudo-nomes, através do método bindvalue.
$cadastro->bindValue(":nome", $nome);
$cadastro->bindValue(":email", $email);
$cadastro->bindValue(":senha", $senha);
$cadastro->bindValue(":telefone", $telefone);
$cadastro->bindValue(":painel", $painel);

//Verificando se já existe um e-mail cadastrado e
//Executar o cadastro caso seja falso.
$verificar = $conn->prepare("SELECT *FROM usuarios WHERE email=?");
$verificar->execute(array($email));

if ($verificar->rowCount() == 0):
    $cadastro->execute();
    echo "Usuário cadastrado com sucesso!";
else:
    echo "E-mail já cadastrado";
endif;

//Contar a quantidade de usuários cadastrados
$result = $cadastro->rowCount();

//Criando SESSÕES para mostrar as mensagens de usuário Cadastrado ou E-mail já cadastrado
if ($result == 1) {
    $_SESSION['cadastrado'] = true;
    header('Location: login_cadastro.php');
    exit();
} else {
    $_SESSION['nao_cadastrado'] = true;
    header('Location: login_cadastro.php');
    exit();
}


?>