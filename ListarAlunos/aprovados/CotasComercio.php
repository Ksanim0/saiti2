<?php
include "connectBD.php";
include "funcaoCotas.php";
include "cursos.php";
#Comércio Cotas
$AprovadosDEFSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Comércio' ORDER BY media DESC LIMIT 2;";
$LimitadorCotaDEF = "SELECT COUNT(nome_completo) FROM aluno WHERE curso='Comércio' AND deficiencia!='Nenhuma' LIMIT 2";

$AprovadosComércioAmplaPublicaSQL = "SELECT * FROM aluno WHERE curso ='Comércio' AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPública' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT 24;";
$AprovadosComércioCotaTerritorialSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10";
$AprovadosComércioAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 6;";
$AprovadosComércioCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 3";

$NaoAprovadosComércioAmplaPublicaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 24";
$NaoAprovadosComércioCTPublicaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 10; ";
$NaoAprovadosComércioAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 6";
$NaoAprovadosComércioCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Comércio' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 3";
$NaoAprovadosDEFComércioSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Comércio' ORDER BY media DESC LIMIT 10 OFFSET 2;";
#CONSULTAS
$vagas = 45;
$defCount = mysqli_num_rows(cotasDef($conexao));

$limitAmpla =$defCount  <= 0 ? "26" : ($defCount == 1 ? "25" : "26");
$AprovadosDEF = $conexao->query($AprovadosDEFSQL);
$AprovadosAMPLAPUBLICAENFERM = aprovadosQuery(Cursos::ENFERMAGEM, " AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPública' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT $limitAmpla;" , $conexao);
$AprovadosCOTATERRITORIALENFERM = $conexao->query($AprovadosComércioCotaTerritorialSQL);
$AprovadosAMPLAENFERMPRIVADA = $conexao->query($AprovadosComércioAmplaPrivadaSQL);
$AprovadosCTEnfermagePrivada = $conexao->query($AprovadosComércioCTPrivadaSQL);

$NaoAprovadosAmplaPublicaComércio = $conexao->query($NaoAprovadosComércioAmplaPublicaSQL);
$NaoAprovadosCTPublicaComércio = $conexao->query($NaoAprovadosComércioCTPublicaSQL);
$NaoAprovadosAmplaPrivadaComércio = $conexao->query($NaoAprovadosComércioAmplaPrivadaSQL);
$NaoAprovadosCTPrivadaComércio = $conexao->query($NaoAprovadosComércioCTPrivadaSQL);
$NaoAprovadosDEFComércio = $conexao->query($NaoAprovadosDEFComércioSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotas Comercio</title>
</head>
<body>
    <h1>Comércio</h1>
    <h2>Ampla Concorrência Publica aprovados</h2>
    
    
    
     <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Comércio--> 
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($AprovadosAMPLAPUBLICAENFERM)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>    
        </tr>
    </tbody>
                                                    <?php } ?>
    </table>


    <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Comércio-->
    <h2>Ampla Concorrência Publica não aprovados</h2>
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPublicaComércio)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>    
        </tr>
    </tbody>
                                                    <?php } ?>
    </table> 



<!--TABELA PROS APROVADOS COTA TERRITORAL Comércio-->
<h2>Cota Territorial Publica aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($AprovadosCOTATERRITORIALENFERM)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>                                                                

<!--TABELA PROS APROVADOS COTA TERRITORAL Comércio-->
<h2>Cota Territorial Publica Não aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPublicaComércio)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Comércio--> 
<h2>Ampla Concorrência Privado aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosAMPLAENFERMPRIVADA)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Comércio--> 
<h2>Ampla Concorrência Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPrivadaComércio)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>


<!--TABELA PROS APROVADOS C.T PRIVADA Comércio-->
<h2>Ampla C.T Privado aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosCTEnfermagePrivada)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS APROVADOS NÃO C.T PRIVADA Comércio-->
<h2>Ampla C.T Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPrivadaComércio)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>




<!--TABELA PROS DEF=TRUE Comércio aprovados-->
<h2>Aprovados Comércio DEF=TRUE aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosDEF)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS DEF=TRUE Comércio NÃO aprovados-->
<h2>Aprovados Comércio DEF=TRUE NÃO aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosDEFComércio)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

</body>
</html>