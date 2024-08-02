<?php
//Objetivo da Aula - Implementar um script para excluir um registro do Banco de Dados

session_start();
ob_start(); //Limpando o BUFFER  de memória

// 1 - Chamando a conexão com o banco de dados
include("conexao.php");
$conn = conectar();

// 2 - Receber o id do usuário através da URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// 3 - Verifiando se o id é diferente de vazio. Se vem um valor pela URL
if(empty($id)){
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
    header("location: listar.php");
}

// 4 - Pesquisando no Bando de Dados pelo usuário que desejo excluir
$query_usuario = "SELECT id FROM usuarios WHERE id = $id LIMIT 1";

// 5 - Preparando a query - (consulta)
$result_usuario = $conn->prepare($query_usuario);

//6 - Executando a query
$result_usuario->execute();

//7 - Verificando se encontrou usuário no banco de dados
if($result_usuario->rowCount() != 0){
   
    //Excluir o Registro no Banco de Dados
    $query_del_usuario = "DELETE FROM usuarios WHERE id = $id";
    $result_del_usuario = $conn->prepare($query_del_usuario);

    //Preparando a execução da exclusão
    if($result_del_usuario->execute()){

        $_SESSION['msg'] = "<p style='color: green; text-align: center'>Usuário excluido com sucesso!</p>";
        header("location: listar.php");

    }else{
        
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não excluido</p>";
        header("location: listar.php");
    }

    }else{
    //8 - Criando uma session de erro
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
    header("location: listar.php");
    }


// O Script de Excluir um Registro está pronto! Vamos testar.
?>