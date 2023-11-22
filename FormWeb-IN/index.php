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

    

    <div class="container-0">
        <div class="area-formulario">
            <div class="formulario">
                <form action="" method="get">
                    <div class="col-0-vdc" >
                    Dados Pessoais:
                 </div>

                    <div class="mb-3">
                        <input type="text" class="col-01" placeholder="Nome completo" required>
                        <input type="text" class="col-01" placeholder="Nome Social">
                    </div>
                    <div class="row">
                        <div class="col">
                        <input type="text" placeholder="Endereço" aria-label="Endereço" name="rua" id="rua" required>
                        </div>
                        <div class="col">
                        <input type="text" placeholder="Bairro" aria-label="Bairro" name="bairro" id="bairro">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <input type="text" placeholder="Município" aria-label="Município" name="localidade" id="localidade" required>
                        </div>
                        <div class="col">
                        <input type="text" placeholder="Estado" aria-label="Estado" name="uf" id="uf" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <input type="text"  placeholder="CPF: 000.000.000-00" maxlength="11" id="cpf"
                        oninput="mascaraCpf('cpf')" onkeyup="cpfCheck(this)" required >
                    </div>
                    <div class="col">
                        <input type="text"  placeholder="CEP: 00000-00" maxlength="8" name="cep" id="cep"
                         onblur="buscaCep(this.value)"    >
                    </div>
                    </div>
                    <div class="row">
                        <div class="DataNasc">
                        <input type="date" name="" id="">
                    </div>
                    <div class="col-gen">
                        <select name="" id="Gen">
              
                          <option value="1">Masculino</option>
                          <option value="2">Feminino</option>
                          <option value="3">Outros</option>
                          <option value="4" selected>Gênero</option>
                        </select>
                      </div>
                      <div class="col-cur">
                        <select name="" id="Cur">
              
                          <option value="enfrm">Enfermagem</option>
                          <option value="info">Informática</option>
                          <option value="com">Comércio</option>
                          <option value="adm" >Administração</option>
                          <option value="5" selected>Curso</option>
                        </select>
                      </div>
                    </div>
                 <div class="row">
                   <div class="col">
                    <select name="" id="Def">
                        <option value="1">Baixa visão</option>
                        <option value="2">Cegueira</option>
                        <option value="3">Deficiêcia auditiva</option>
                        <option value="4" >Deficiêcia física</option>
                        <option value="5" >Deficiêcia intelectual</option>
                        <option value="6" >Surdez</option>
                        <option value="7" >Surdocegueira</option>
                        <option value="4" >Deficiêcia múltipla</option>
                        <option value="4" >Transtorno de espectro autista</option>
                        <option value="5" selected>Deficiências</option>
                    </select>
                   </div> 
                   <div class="col">
                    <select name="" id="Concorrencia">
              
                        <option value="1">Escola pública</option>
                        <option value="2">Escola privada</option>
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
