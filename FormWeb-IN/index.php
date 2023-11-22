 <?php
include "connectBD.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>EEEP Manoel Mano | Cadastro Alunos</title>
    <link rel="stylesheet" href="styleIN.css">
    <link rel="stylesheet" href="btn-style.css">
    <meta name="google-site-verification" content="ezTnfxOAOeXB6FaEOsqR0fcf63u74YI3CQX8biM0w7I" />
    <!-- Script para as Mascaras --> 
    <script src="js/MaskInput.js"></script>

    
    <script src="js/ValidarCEP.js"></script>
<!--     <script src="js/MaskNotas.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquer y/2.1.1/jquery.min.js"></script>
    <!-- Favicon EEEP Manoel Mano -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://eeepmanoelmano.com.br/favicon.svg">
   
  
</head>
<body>
    <div class="header">
        <div class="container-main-menu">
            <div class="container">
                <div class="row-1">
                    <div class="col-0">
                        <a href="https://www.ceara.gov.br/"target="_blank"><img src="logo-governo.svg" alt="Logo do Governo do Ceará"></a>
                        <a href="https://selecao.eeepmanoelmano.com.br/"target="_self"><img src="logo-mm.svg" alt="Logo da EEEP Manoel Mano"></a>
                    </div>
                    <div class="col-0" id="Titulo"  >
                        <h3>formulario</h3>

<div class="links-btn">
        <a class="fcc-btn" href="#">Inicio</a>
        <a class="fcc-btn" href="#">Cursos</a>
        <a class="fcc-btn" href="#">Cadastros</a>
        <a class="fcc-btn" href="#">Relatorios</a>
       
    </div>
</div>

</div>
        </div>
    </div>
    </div>

    <script>
    PureMask.format('mask', true);
  </script>
    

    <div class="container-0">
        <div class="area-formulario">
            <div class="formulario">
                <form action="" method="get">
                    <div class="col-0-vdc" >
                    Dados Pessoais:
                 </div>

                    <div class="mb-3">
                        <input type="text" class="col-01" placeholder="Nome completo" name="nome_completo" required>
                        <input type="text" class="col-01" placeholder="Nome Social" name="nome_social">
                        <input type="text" class="col-01" placeholder="Nome Mãe" name="nome_mae">
                        <input type="text" class="col-01" placeholder="Nome Pai" name="nome_pai>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                        <input type="text"  placeholder="Telefone 1" maxlength="14" id="telefone"
                        oninput="mascaraTel('telefoneInput')" onkeyup="mascara('(##) ####-####',this,event,true)" name="telefone1" required >
                    </div>

                    <div class="col">
                        <input type="text"  placeholder="Telefone 2" maxlength="8" name="telefone2" id="cep"
                         onblur="buscaCep(this.value)" >
                    </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                        <input type="text"  placeholder="CPF: 000.000.000-00" maxlength="11" id="cpf"
                        oninput="mascaraCpf('cpf')" onkeyup="cpfCheck(this)" name= "cpf" required >
                    </div>

                    <div class="col">
                        <input type="text"  placeholder="CEP: 0000-00" maxlength="8" name="cep" id="cep"
                         onblur="buscaCep(this.value)" >
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Endereço" aria-label="Endereço" name="rua" id="rua">
                        </div>
                        <div class="col">
                        <input type="text" placeholder="Bairro" aria-label="Bairro" name="bairro" id="bairro">
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Município" aria-label="Município" name="municipio" id="municipio">
                        </div>
                    <div class="col">
                    <input type="text" placeholder="Estado" aria-label="Estado" name="estado" id="estado">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="DataNasc">
                        <input type="date" name="data_nasc" id="">
                    </div>
                    <div class="col-gen">
                        <select name="genero" id="Gen">
              
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                          <option value="Outro">Outros</option>
                          <option value="4" selected>Gênero</option>
                        </select>
                      </div>
                      <div class="col-cur">
                        <select name="curso" id="Cur">
              
                          <option value="Enfermagem">Enfermagem</option>
                          <option value="Informatica">Informática</option>
                          <option value="Comercio">Comércio</option>
                          <option value="Administracao" >Administração</option>
                          <option value="5" selected>Curso</option>
                        </select>
                      </div>
                    </div>
                 <div class="row">
                   <div class="col">
                    <select name="deficiencia" id="Def">
                        <option value="BaixaVisao">Baixa visão</option>
                        <option value="Cegueira">Cegueira</option>
                        <option value="DeficienciaAuditiva">Deficiêcia auditiva</option>
                        <option value="DeficienciaFisica" >Deficiêcia física</option>
                        <option value="DeficienciaIntelectual" >Deficiêcia intelectual</option>
                        <option value="Surdez" >Surdez</option>
                        <option value="Surdocegueira" >Surdocegueira</option>
                        <option value="DeficienciaMultipla" >Deficiêcia múltipla</option>
                        <option value="TranstornoDoEspectroAutista" >Transtorno de espectro autista</option>
                        <option value="5" selected>Deficiências</option>
                    </select>
                   </div> 
                   <div class="col">
                    <select name="concorrencia" id="Concorrencia">
              
                        <option value="EscolaPublica">Escola pública</option>
                        <option value="EscolaPrivada">Escola privada</option>
                        <option value="4" selected>Concorrência</option>
                      </select>
                   </div>
                  </div>
               

                   
          
            </div>
        </div>


     
    </div>

  

    </div>

    <div class="btn-container">
        <button type="submit" class="enviar" >Salvar</button>
        </div>
    </form>


    <form>
        
    </form>
    
     
 
    
        <footer><img src="./ondas-governo-rodape.png" alt=""></footer>
        
</body>
</html>
