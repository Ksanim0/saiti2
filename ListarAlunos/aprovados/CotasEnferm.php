<?php
include "connectBD.php";





#ENFERMAGEM Cotas
$AprovadosDEFSQL = "SELECT nome_completo, media FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Enfermagem' ORDER BY media DESC LIMIT 2;";
$LimitadorCotaDEF = "SELECT COUNT(nome_completo) FROM aluno WHERE curso='Enfermagem' AND deficiencia!='Nenhuma' LIMIT 2";
$AprovadosEnfermagemAmplaPublicaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPublica' AND bairro!='Príncipe Imperial' OR bairro!='Venâncios' ORDER BY MEDIA DESC LIMIT 24";
$AprovadosEnfermagemCotaTerritorialSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND bairro='Príncipe Imperial' OR bairro='Venâncios' ORDER BY media DESC LIMIT 10";
$AprovadosEnfermagemAmplaPrivadaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND bairro!='Príncipe Imperial' OR bairro!='Venâncios' ORDER BY media DESC LIMIT 6;";
$AprovadosEnfermagemCTPrivadaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND bairro='Príncipe Imperial' OR bairro='Venâncios' ORDER BY media DESC LIMIT 3";

$NaoAprovadosEnfermagemAmplaPublicaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPublica' AND bairro!='Príncipe Imperial' OR bairro!='Venâncios' ORDER BY MEDIA DESC LIMIT 10 OFFSET 24";
$NaoAprovadosEnfermagemCTPublicaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND bairro='Príncipe Imperial' OR bairro='Venâncios' ORDER BY media DESC LIMIT 10 OFFSET 10";
$NaoAprovadosEnfermagemAmplaPrivadaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND bairro!='Príncipe Imperial' OR bairro!='Venâncios' ORDER BY MEDIA DESC LIMIT 10 OFFSET 6";
$NaoAprovadosEnfermagemCTPrivadaSQL = "SELECT nome_completo, media FROM aluno WHERE curso='Enfermagem' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND bairro='Príncipe Imperial' OR bairro='Venâncios' ORDER BY MEDIA DESC LIMIT 10 OFFSET 3";
$NaoAprovadosDEFEnfermagemSQL = "SELECT nome_completo, media FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Enfermagem' ORDER BY media DESC LIMIT 10 OFFSET 2;";
#CONSULTAS
$vagas = 45;

$numDEF = $conexao->query($LimitadorCotaDEF);

$AprovadosDEF = $conexao->query($AprovadosDEFSQL);
$AprovadosAMPLAPUBLICAENFERM = $conexao->query($AprovadosEnfermagemAmplaPublicaSQL);
$AprovadosCOTATERRITORIALENFERM = $conexao->query($AprovadosEnfermagemCotaTerritorialSQL);
$AprovadosAMPLAENFERMPRIVADA = $conexao->query($AprovadosEnfermagemAmplaPrivadaSQL);
$AprovadosCTEnfermagePrivada = $conexao->query($AprovadosEnfermagemCTPrivadaSQL);

$NaoAprovadosAmplaPublicaEnfermagem = $conexao->query($NaoAprovadosEnfermagemAmplaPublicaSQL);
$NaoAprovadosCTPublicaEnfermagem = $conexao->query($NaoAprovadosEnfermagemCTPublicaSQL);
$NaoAprovadosAmplaPrivadaEnfermagem = $conexao->query($NaoAprovadosEnfermagemAmplaPrivadaSQL);
$NaoAprovadosCTPrivadaEnfermagem = $conexao->query($NaoAprovadosEnfermagemCTPrivadaSQL);
$NaoAprovadosDEFEnfermagem = $conexao->query($NaoAprovadosDEFEnfermagemSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cota de Enfermagem</title>
</head>
<body>
    <h1>Enfermagem</h1>
    <h2>Ampla Concorrência Publica aprovados</h2>
    
    
    
     <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA ENFERMAGEM--> 
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


    <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA ENFERMAGEM-->
    <h2>Ampla Concorrência Publica não aprovados</h2>
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPublicaEnfermagem)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>    
        </tr>
    </tbody>
                                                    <?php } ?>
    </table> 



<!--TABELA PROS APROVADOS COTA TERRITORAL ENFERMAGEM-->
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

<!--TABELA PROS APROVADOS COTA TERRITORAL ENFERMAGEM-->
<h2>Cota Territorial Publica Não aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPublicaEnfermagem)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA ENFERMAGEM--> 
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

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA ENFERMAGEM--> 
<h2>Ampla Concorrência Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPrivadaEnfermagem)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>


<!--TABELA PROS APROVADOS C.T PRIVADA ENFERMAGEM-->
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

<!--TABELA PROS APROVADOS NÃO C.T PRIVADA ENFERMAGEM-->
<h2>Ampla C.T Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPrivadaEnfermagem)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>




<!--TABELA PROS DEF=TRUE ENFERMAGEM aprovados-->
<h2>Aprovados Enfermagem DEF=TRUE aprovados</h2>
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

<!--TABELA PROS DEF=TRUE ENFERMAGEM NÃO aprovados-->
<h2>Aprovados Enfermagem DEF=TRUE NÃO aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosDEFEnfermagem)) { ?>
    
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