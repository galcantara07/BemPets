<?php
//Start na sessão
session_start();

//Conectando com o Banco de Dados
include ("conexao.php");
$conn = conectar();

//Recuperando os dados do formulário com o método POST
$nome_pet = $_POST['nome_pet'];
$tipo_pet = $_POST['tipo_pet'];
$genero_pet = $_POST['genero_pet'];
$raca_pet = $_POST['raca_pet'];
$idade_pet = $_POST['idade_pet'];
$peso_pet = $_POST['peso_pet'];
$castrado_pet = $_POST['castrado_pet'];
$vacina_pet = $_POST['vacina_pet'];

//Preparando o INSERT INTO com pseudo-nome para cadastrar no Banco de Dados
$cadastro_pet = $conn->prepare("INSERT INTO pets(nome_pet, tipo_pet, genero_pet, raca_pet, idade_pet, peso_pet, castrado_pet, vacina_pet)
VALUES(:nome_pet, :tipo_pet, :genero_pet, :raca_pet, :idade_pet, :peso_pet, :castrado_pet, :vacina_pet)");

//Passando os dados das variáveis para os pseudo-nomes, através do método bindvalue.
$cadastro_pet->bindValue(":nome_pet", $nome_pet);
$cadastro_pet->bindValue(":tipo_pet", $tipo_pet);
$cadastro_pet->bindValue(":genero_pet", $genero_pet);
$cadastro_pet->bindValue(":raca_pet", $raca_pet);
$cadastro_pet->bindValue(":idade_pet", $idade_pet);
$cadastro_pet->bindValue(":peso_pet", $peso_pet);
$cadastro_pet->bindValue(":castrado_pet", $castrado_pet);
$cadastro_pet->bindValue(":vacina_pet", $vacina_pet);

//Verificando se já existe um e-mail cadastrado e
//Executar o cadastro caso seja falso.
$verificar = $conn->prepare("SELECT *FROM pets WHERE id_tutor=?");
$verificar->execute(array($id_tutor));

if ($verificar->rowCount() == 0):
    $cadastro_pet->execute();
    echo "Pet cadastrado com sucesso!";
else:
    echo "Pet já cadastrado";
endif;

//Contar a quantidade de usuários cadastrados
$result = $cadastro_pet->rowCount();

//Criando SESSÕES para mostrar as mensagens de usuário Cadastrado ou E-mail já cadastrado
if ($result == 1) {
    $_SESSION['pet_cadastrado'] = true;
    header('Location: cadastrar_pets.php');
    exit();
} else {
    $_SESSION['pet_nao_cadastrado'] = true;
    header('Location: cadastrar_pets.php');
    exit();
}


?>