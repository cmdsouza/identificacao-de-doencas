<?php

session_start();
include "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Life Care - Responsive HTML5 Multi Page Template</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
   </head>
   <body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
      </div>
      <!-- END LOADER -->
      <header>
         <div class="header-top wow fadeIn">
            <div class="container">
               <div class="right-header">
               </div>
            </div>
         </div>
         <div class="header-bottom wow fadeIn">
            <div class="container">
               <nav class="main-menu">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  </div>
				  
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a href="inicial.php">Página Inicial</a></li> 
                        <li><a href="novoProcedimento.php">Novo Procedimento</a></li> 
                        <li><a href="novoMedico.php">Novo Dentista</a></li> 
                        <li><a href="novaEmpresa.php">Nova Empresa</a></li> 
                        <li><a href="novaDoenca.php">Gerenciar Doença</a></li> 
                        <li><a href="logout.php">Sair</a></li> 
                     </ul>
                  </div>
				  
               </nav>
            </div>
         </div>
      </header>
	  <br><br>
	  
	  <?php
			$maior = 0;
			$sqlMaior = "SELECT * FROM tb_comparacoes WHERE nr_imagem1 = '".$_SESSION['imagemPesquisada']."' ORDER BY nr_porcentagem DESC LIMIT 1";
			$resultadoMaior = mysql_query($sqlMaior) or die();
			while($linhaMaior = mysql_fetch_array($resultadoMaior)){
				$tbComparacao = $linhaMaior['nr_idComparacao'];// id da tabela Comparação que tem a maior %
				$idImagem2 = $linhaMaior['nr_imagem2'];// id da tabela Imagem que tem a maior %
			}

			$sqlComp = "SELECT * FROM tb_comparacoes WHERE nr_idComparacao = ".$tbComparacao." ORDER BY nr_idComparacao DESC";
			$resultadoComp = mysql_query($sqlComp) or die();
			while($linhaComp = mysql_fetch_array($resultadoComp)){
				$imagem1 = $linhaComp['nr_imagem1'];
				$idImagem2 = $linhaComp['nr_imagem2'];
				$porcentagem = $linhaComp['nr_porcentagem'];
			}
			
			$sqlIMG2 = "SELECT * FROM tb_imagem WHERE nr_idImagem = ".$idImagem2;
			$resultadoIMG2 = mysql_query($sqlIMG2) or die();
			while($linhaIMG2 = mysql_fetch_array($resultadoIMG2)){
				$imagem2 = $linhaIMG2['nm_imagem'];
			}
		?>
	  
	<div id="about" class="section">
         <div class="container">
            <div class="heading">
               <h2>Imagem Mais Parecida <b><?php echo $porcentagem; ?>%</b></h2>
            </div>
			<div class="row">
			<?php
				echo "
								
					<div class='service-widget'>
						<center> 
							<a href='radiografias/".$imagem1."' target='_blank'><img width='30%' height='10%' src='radiografias/".$imagem1."'></a>
							<a href='radiografias/".$imagem2."' target='_blank'><img width='30%' height='10%' src='radiografias/".$imagem2."'></a>
							<br><br>
						</center>	
						<center>
							<a data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'><h3><p>Informações da Imagem</p></h3></a>
						</center>
					</div>
				";
				
							$sqlInfoImg = "SELECT * FROM tb_imagem WHERE nr_idImagem =".$idImagem2;
							$resultadoInfoImg = mysql_query($sqlInfoImg) or die();
							while($linhaInfoImg = mysql_fetch_array($resultadoInfoImg)){
								$cpf = $linhaInfoImg['nr_cpfPaciente'];
								$procedimento = $linhaInfoImg['nr_procedimento'];
								$dataCadastro = $linhaInfoImg['dt_dataCadastro'];
							}
							
							$sqlPaciente = "SELECT * FROM tb_paciente WHERE nr_cpf = '".$cpf."'";
							$resultadoPaciente = mysql_query($sqlPaciente) or die();
							while($linhaPaciente = mysql_fetch_array($resultadoPaciente)){
								$nome = $linhaPaciente['nm_nome'];
							}
							
							$sqlProcedimento = "SELECT * FROM tb_procedimento WHERE nr_idProcedimento = ".$procedimento;
							$resultadoProcedimento = mysql_query($sqlProcedimento) or die();
							while($linhaProcedimento = mysql_fetch_array($resultadoProcedimento)){
								$nomeProcedimento = $linhaProcedimento['nm_nomeProcedimento'];
								$obsProcedimento = $linhaProcedimento['nm_observacoes'];
								$cpfmedicoProcedimento = $linhaProcedimento['nr_cpfMedico'];
							}
							
							$sqlMedico = "SELECT * FROM tb_medico WHERE nr_cpfMedico = '".$cpfmedicoProcedimento."'";
							$resultadoMedico = mysql_query($sqlMedico) or die();
							while($linhaMedico = mysql_fetch_array($resultadoMedico)){
								$nomeMedico = $linhaMedico['nm_nomeMedico'];
							}
							
							echo "
							
							<div class='collapse' id='collapseExample'>
							  <div class='card card-body'><br>
							";
							
							echo "<b>Data de Cadastro da Imagem: </b>".$dataCadastro."<br>";
							echo "<a href='consultarPaciente.php?cpf=".$cpf."'><b>Paciente: </b>".$nome." (CPF: ".$cpf.")<br></a>";
							echo "<b>Procedimento: </b>".$nomeProcedimento."<br>";
							echo "<b>Observações: </b>".$obsProcedimento."<br>";
							echo "<b>Dentista Responsável: </b>".$nomeMedico." (CPF: ".$cpfmedicoProcedimento.")<br>";
							
							echo "
							  </div>
							</div>
							";
				
				echo "
					<hr class='hr3'>
					</div>
					<div class='heading'>
					   <h2>Outras Comparações Realizadas</h2>
					</div>
				";
				
				$sqlOutros = "SELECT * FROM tb_comparacoes WHERE nr_imagem1 = '".$imagem1."' ORDER BY nr_porcentagem DESC";
				$resultadoOutros = mysql_query($sqlOutros) or die();
				$cont = 0;
				while($linhaOutros = mysql_fetch_array($resultadoOutros)){
					if($linhaOutros['nr_idComparacao'] == $tbComparacao){
						
					}else{
						
						$sqlIMG = "SELECT * FROM tb_imagem WHERE nr_idImagem = ".$linhaOutros['nr_imagem2'];
						$resultadoIMG = mysql_query($sqlIMG) or die();
						while($linhaIMG = mysql_fetch_array($resultadoIMG)){
							$imagem2 = $linhaIMG['nm_imagem'];
						}
				
				echo "
				
				<div class='service-widget'>
						<center> 
							<a href='radiografias/".$linhaOutros['nr_imagem1']."' target='_blank'><img width='30%' height='10%' src='radiografias/".$linhaOutros['nr_imagem1']."'></a>
							<a href='radiografias/".$imagem2."' target='_blank'><img width='30%' height='10%' src='radiografias/".$imagem2."'></a>
							<br><br>
						</center>	
						<center>
							<a data-toggle='collapse' data-target='#collapseExample".$cont."' aria-expanded='false' aria-controls='collapseExample'><h3><p><b>".$linhaOutros['nr_porcentagem']."%</b></p></h3></a>
						</center>
				</div>
				
				";

				
							$sqlInfoImg = "SELECT * FROM tb_imagem WHERE nr_idImagem ='".$linhaOutros['nr_imagem2']."'";
							$resultadoInfoImg = mysql_query($sqlInfoImg) or die();
							while($linhaInfoImg = mysql_fetch_array($resultadoInfoImg)){
								$cpf = $linhaInfoImg['nr_cpfPaciente'];
								$procedimento = $linhaInfoImg['nr_procedimento'];
								$dataCadastro = $linhaInfoImg['dt_dataCadastro'];
							}
							
							$sqlPaciente = "SELECT * FROM tb_paciente WHERE nr_cpf = '".$cpf."'";
							$resultadoPaciente = mysql_query($sqlPaciente) or die();
							while($linhaPaciente = mysql_fetch_array($resultadoPaciente)){
								$nome = $linhaPaciente['nm_nome'];
							}
							
							$sqlProcedimento = "SELECT * FROM tb_procedimento WHERE nr_idProcedimento = ".$procedimento;
							$resultadoProcedimento = mysql_query($sqlProcedimento) or die();
							while($linhaProcedimento = mysql_fetch_array($resultadoProcedimento)){
								$nomeProcedimento = $linhaProcedimento['nm_nomeProcedimento'];
								$obsProcedimento = $linhaProcedimento['nm_observacoes'];
								$cpfmedicoProcedimento = $linhaProcedimento['nr_cpfMedico'];
							}
							
							$sqlMedico = "SELECT * FROM tb_medico WHERE nr_cpfMedico = '".$cpfmedicoProcedimento."'";
							$resultadoMedico = mysql_query($sqlMedico) or die();
							while($linhaMedico = mysql_fetch_array($resultadoMedico)){
								$nomeMedico = $linhaMedico['nm_nomeMedico'];
							}
							
							echo "
							
							<div class='collapse' id='collapseExample".$cont."'>
							  <div class='card card-body'><br>
							";
							
							echo "<b>Data de Cadastro da Imagem: </b>".$dataCadastro."<br>";
							echo "<a href='consultarPaciente.php?cpf=".$cpf."'><b>Paciente: </b>".$nome." (CPF: ".$cpf.")<br></a>";
							echo "<b>Procedimento: </b>".$nomeProcedimento."<br>";
							echo "<b>Observações: </b>".$obsProcedimento."<br>";
							echo "<b>Dentista Responsável: </b>".$nomeMedico." (CPF: ".$cpfmedicoProcedimento.")<br>";
						
							echo "
							  </div>
							</div>
							<hr class='hr3'>
							";
		
				}
				$cont = $cont + 1;
			}	
				
			?>	
			</div>
		 </div>
	  </div> 

	  
      </div>
      <!-- end section -->
      <div class="copyright-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="footer-text">
                     <p>© 2019.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="social">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end copyrights -->
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- all js files -->
      <script src="js/all.js"></script>
      <!-- all plugins -->
      <script src="js/custom.js"></script>
      <!-- map -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>
   </body>
</html>