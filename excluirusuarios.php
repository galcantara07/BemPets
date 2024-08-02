<?php
//Objetivo da Aula - Implementar um Script par Excluir vários Registros no Banco de Dados

session_start(); //estartando a sessão
ob_start(); //Limpando o Buffer de saida no redirecionamento

//1 - Chamando a conexão com o banco de dados e a função conectar
include("conexao.php");
$conn = conectar();

//2 - Recebendo os Registros Selecionados de uma única vez.
$usuarios_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);


//3 - Verificando se o usuário clicou no botão "Excluir usuários selecionados" [delusuarios]
if(!empty($usuarios_id['delusuarios'])){
     
    //Verificando se vem algum registro pela variável $usuarios_id
    if(isset($usuarios_id['id'])){

        /*Como posso ter um array de usuários selecionados para excluir, 
        logo vou precisar do foreach para ler o array e identificar os usuarios
        no vetor através do id para excluir */       
        foreach ($usuarios_id['id'] as $id => $usuario){
        
            //Criando, Preparando e Executando a Query de Exclusão
            $query_del_usuario = "DELETE FROM usuarios WHERE id=$id LIMIT 1";
            $result_del_usuario = $conn->prepare($query_del_usuario);
            $result_del_usuario->execute();
        }

        //Mensagem de usuário Excluido com sucesso.
        $_SESSION['msg'] = "<p style='color: green; text-align: center;'> Usuário excluido com sucesso</p>";
        header("location: listar.php");

    }else{ //Criando a mensagem de ERRO

        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
        header("location: listar.php");
    }

}else{ //Criando a mensagem de ERRO
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
    header("location: listar.php"); 
    }

//4 - Está pronto o nosso script para excluir vários registros. Vamos testar.

?>