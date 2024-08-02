<?php
//Inicializando as Sessões
session_start();

//1- Realizar a conexão com o Banco de Dados
include("conexao.php");
$conn = conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar registros</title>
</head>

<body>
    <!--Título Listar-->
    <div style="width: 100%;">
        <h2 style="float: left;">Listar Registros</h2>
        <h2 style="float: right;"><a href="login_cadastro.php">Cadastrar</a> </h2>
    </div>

    <?php
    //Verificando se a sessão MSG existe
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }

    //Destruindo a sessão
    unset($_SESSION['msg']);
    ?>

    <br>

    <?php
    /*--------------------- CRIANDO A PAGINAÇÃO DA LISTA ------------------------*/

    //1 - Criar uma variável page usando o metodo GET na barra de navegação para receber o número da página atual.

    //http://localhost/escola/listar2.php?page=1

    //2 - Criar uma variável para receber o número da página atual através da URL
    $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);

    //3 - Verificar se não foi enviado a página pela URL, se isso acontecer receber página 1
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //4 - Setar a quantidade de resgistros por página
    $limite_result = 5;

    //5 - Calcular o início da visualização (Precisamos identificar a partir de qual registro irá iniciar a visualização)
    $inicio = ($limite_result * $pagina) - $limite_result;

    /*------------------------ FIM DA PARTE 1_PAGINAÇÃO -------------------------*/

    // 2 - Criando uma Consulta para Pesquisar usuarios no Banco de Dados
    $query_usuarios = $conn->prepare("SELECT id, nome, email, telefone,  painel FROM usuarios ORDER BY painel DESC LIMIT $inicio, $limite_result");

    $query_usuarios->execute(); //Executando a consulta
    ?>

    <!--Criando um Formulário para Excluir mais de um registro-->
    <form name="delusuarios" method="POST" action="excluirusuarios.php">

        <!--Criando uma tabela para organizar os registros-->
        <table style="width: 100%; margin: 15px auto;">
            <thead>
                <tr><!--Criando a primeira linha da tabela - Colunas da tabela-->
                    <th style="background-color: #E6E6FA; padding: 10px;">Item</th>
                    <th style="background-color: #E6E6FA; padding: 10px;">ID</th>
                    <th style="background-color: #E6E6FA; padding: 10px;">Nome</th>
                    <th style="background-color: #E6E6FA; padding: 10px;">E-mail</th>
                    <th style="background-color: #E6E6FA; padding: 10px;">Painel</th>
                    <th style="background-color: #E6E6FA; padding: 10px;">Ações</th>
                </tr>
            </thead>

            <?php
            //3_Fase 1 - Verificando se encontrou dados no Banco de Dados(Se for verdadeiro vai mostrar os registros, senao mostra a mensagem de erro)
            if ($query_usuarios->rowCount() != 0) {

                //3_Fase 2 - Geralmente  temos mais de um registro. 
                //Precisamos de um While para percorrer o Array de registros 
                //(Implementando o While no IF)
                while ($rowusuarios = $query_usuarios->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr align=center>"; //Criando a 2ª linha da tabela
                    extract($rowusuarios); //função extract() faz conversão de array para variável
                    echo "<td> <input type='checkbox' name='id[$id]'> </td>"; //INPUT dentro da celula
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $painel . "</td>";
                    echo "<td> <a href='editar.php?id=$id'>[Editar]</a> <a href='confirmarexcluir.php?id=$id'>[Excluir]</a> </td>";
                    echo "</tr>";
                }
            ?>

                <!--Encerrar a Tabela-->
        </table>
        <br>
        <!--Criando o botão para Excluir usuários-->
        <input type="submit" value="Excluir usuários selecionados" name="delusuarios">

    </form><!--Encerrando o formulário-->
    <br>
    <br>

<?php
                /*---------------------- CRIANDO A PAGINAÇÃO DA LISTA - Parte 2 ---------------------*/

                //6 - Contar a quantidade de registros no banco de dados
                $query_qnt_registros = $conn->prepare("SELECT COUNT(id) AS num_result FROM usuarios");
                $query_qnt_registros->execute();

                $row_qnt_registros = $query_qnt_registros->fetch(PDO::FETCH_ASSOC); //retorna um array de registros associativos

                //7 - Identificar a quantidade de páginas. Pra isso precisamos utilar a função CEIL
                $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_result);

                //8 - Criar uma variável par informar o máximo de links na página
                $maximo_link = 2;

                /*------------Link da primeira página e os links das páginas antes da atual -------------*/
                //Implementar o link da primeira página
                echo "<a href='listar.php?page=1'>Primeira</a> ";

                //For para listar as páginas anteriores a página atual
                for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {

                    if ($pagina_anterior >= 1) {
                        echo "<a href='listar.php?page=$pagina_anterior'>$pagina_anterior</a> ";
                    }
                }
                /*--------------Fim da implementação dos links antes da página atual ----------------*/

                //9 - Mostrando a página atual que o usuário está
                echo "$pagina ";

                /*------------Link das páginas posteriores a atual e da última página-------------*/

                //For para listar as páginas posteriores a página atual
                for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
                    if ($proxima_pagina <= $qnt_pagina) {
                        echo "<a href='listar.php?page=$proxima_pagina'>$proxima_pagina</a> ";
                    }
                }

                //Implementar o link da última página
                echo "<a href='listar.php?page=$qnt_pagina'>Ultima</a>";

                /*--------Fim dos Link das páginas posteriores a atual e da última página-----------*/
            } else { //Listando a mensagem de usuário não encontrado

                echo "<p style='color:red;'>Erro: Usuário não encontrado!</p>";
            }

            /*Neste ponto podemos realizar o primeiro teste*/

?>


</body>

</html>