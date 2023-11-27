<?php
include "connectBD.php";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>EEEP Manoel Mano | Alunos Inscritos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="btn-style.css">
    <!-- Favicon EEEP Manoel Mano -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://eeepmanoelmano.com.br/favicon.svg">


</head>

<body>
    <div class="header">
        <div class="container-main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-0">
                        <a href="https://selecao.eeepmanoelmano.com.br/" target="_self"><img src="logo-mm.svg" alt="Logo do Governo do Ceará"></a>
                        <a href="https://www.ceara.gov.br/" target="_blank"><img src="logo-governo.svg" alt="Logo da EEEP Manoel Mano"></a>
                    </div>
                    <div class="col-0">
                        <h3>Tabela de alunos inscritos</h3>

                        <div class="links-btn">
                            <a class="fcc-btn" href="https://www.freecodecamp.org/">Inicio</a>
                            <a class="fcc-btn" href="https://www.freecodecamp.org/">Cursos</a>
                            <a class="fcc-btn" href="https://www.freecodecamp.org/">Cadastros</a>
                            <a class="fcc-btn" href="https://www.freecodecamp.org/">Relatorios</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-0">

        <a href=".\aprovados\aprovados.php">Gerar Relatório alunos aprovados</a>

        <div class="tabela">

            <div class="row" id="titulo">
            </div>
            <br>
            <div class="container">
                <form action="">
                    <input type="text" name="busca" placeholder="Digite aqui o nome do aluno" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>">
                    <button type="submit"> Pesquisar </button>
                </form>


                <!-- LISTAGEM DE ALUNOS INICIO -->
                <form action="">
                <?php

                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                $qtd_result_pag = 15;
                $inicio = ($qtd_result_pag * $pagina) - $qtd_result_pag;

                $result_aluno = "SELECT * FROM aluno LIMIT $inicio, $qtd_result_pag";
                $resultado_alunos = mysqli_query($conexao, $result_aluno);

                /* IF DE BUSCAR */
                if (!isset($_GET['busca'])) {

                    while ($linha_aluno = mysqli_fetch_assoc($resultado_alunos)) {
                        echo "ID: " . $linha_aluno['id'] . "<br>";
                        echo "Nome completo: " . $linha_aluno['nome_completo'] . "<br>";
                        echo "Curso escolhido: " . $linha_aluno['curso'] . "<br>";
                        echo "<a href='./FormWeb/index.php?id=" . $linha_aluno['id'] . "'>Editar</a><br><hr>";
                        
                        
                    }


                    $result_pg = "SELECT COUNT(id) AS num_result FROM aluno";
                    $resultado_pg = mysqli_query($conexao, $result_pg);
                    $linha_pg = mysqli_fetch_assoc($resultado_pg);
                    //echo $linha_pg['num_result'];

                    $quantidade_pg = ceil($linha_pg['num_result'] / $qtd_result_pag);
                    $max_link = 2;
                    echo " <a href='index.php?pagina=1'> Primeira </a> ";

                    for ($pag_ant = $pagina - $max_link; $pag_ant <= $pagina - 1; $pag_ant++) {
                        if ($pag_ant >= 1) {
                            echo " <a href='index.php?pagina=$pag_ant'> $pag_ant </a> ";
                        }
                    }

                    echo "$pagina";

                    for ($pag_dps = $pagina + 1; $pag_dps <= $pagina + $max_link; $pag_dps++) {
                        if ($pag_dps <= $quantidade_pg) {
                            echo " <a href='index.php?pagina=$pag_dps'> $pag_dps </a> ";
                        }
                    }

                    echo " <a href='index.php?pagina=$quantidade_pg'> Última </a> ";
                } else{
                    $pesquisa = $conexao->real_escape_string($_GET['busca']);
                    $sql_code_search = "SELECT * FROM aluno WHERE nome_completo LIKE '%$pesquisa%' OR curso LIKE '%$pesquisa%'";
                    $sql_query = $conexao->query($sql_code_search) or die ("Erro ao consultar. ".$conexao->error);

                    if($sql_query->num_rows == 0){
                        echo "<h2>Desculpa, não há nenhum aluno cadastrado com esse nome. Verifique se o nome está digitado corretamente e tente novamente.</h2>";
                    } else {
                        while ($linha_aluno = mysqli_fetch_assoc($sql_query)) {
                            echo "ID: " . $linha_aluno['id'] . "<br>";
                            echo "Nome completo: " . $linha_aluno['nome_completo'] . "<br>";
                            echo "Curso escolhido: " . $linha_aluno['curso']. "<br>";
                            echo "<a href='./FormWeb/index.php?id=" . $linha_aluno['id'] . "'>Editar</a><br><hr>";
                        }
    
                    }

                }
                ?>
                </form>
                <!-- LISTAGEM DE ALUNOS FIM -->



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            </div>




            <!-- <footer><img src="./ondas-governo-rodape.png" alt=""></footer> -->
</body>

</html>