<?php

session_start();
include "conexao.php";
require 'image.compare.class.php';

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
			$class = new compareImages;
			
			$imagem1 = $_POST['imagem1'];
			$sqlImg1 = "SELECT * FROM tb_imagem WHERE nr_idImagem = ".$imagem1;
			$resultadoImg1 = mysql_query($sqlImg1) or die();
			while($linhaImg1 = mysql_fetch_array($resultadoImg1)){
				$nomeImagem1 = $linhaImg1['nm_imagem'];
				$dataCadastro = $linhaImg1['dt_dataCadastro'];
			}
			
			$imagem2 = $_POST['imagem2'];
			$sqlImg2 = "SELECT * FROM tb_imagem WHERE nr_idImagem = ".$imagem2;
			$resultadoImg2 = mysql_query($sqlImg2) or die();
			while($linhaImg2 = mysql_fetch_array($resultadoImg2)){
				$nomeImagem2 = $linhaImg2['nm_imagem'];
			}
			
			$teste1 = $class->compare('radiografias/'.$nomeImagem1,'radiografias/'.$nomeImagem2);
			$porc1 = 100-(3.12*$teste1);
			
			if($porc1 < 0){
				$porc1 = 0;
			}else{
			}
			
			$sql1 = "INSERT INTO tb_comparacoes(nr_idComparacao, nr_imagem1, nr_imagem2, nr_porcentagem) VALUES (NULL, '".$nomeImagem1."', '".$imagem2."', '".$porc1."')";
			$resultado1 = mysql_query($sql1) or die();
			
		?>
	  
	<div id="about" class="section">
         <div class="container">
            <div class="heading">
               <h2>As imagens selecionadas tem  <b><?php echo $porc1; ?>%</b> de semelhança!</h2>
            </div>
			<div class="row">
			<?php
				echo "
								
					<div class='service-widget'>
						<center> 
							<a href='radiografias/".$nomeImagem1."' target='_blank'><img width='30%' height='10%' src='radiografias/".$nomeImagem1."'></a>
							<br><br>
						</center>	
						<center>
							<a data-toggle='collapse' data-target='#collapseExample1' aria-expanded='false' aria-controls='collapseExample'><h3><p> ".$dataCadastro."</p></h3></a>
						</center>
					</div>
					
					<br>
				";
				
				// Imagem 1
							$sqlInfoImg = "SELECT * FROM tb_imagem WHERE nr_idImagem =".$imagem1;
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
								<div class='collapse' id='collapseExample1'>
								  <div class='card card-body'><br>
							";
							
							echo "<a href='consultarPaciente.php?cpf=".$cpf."'><b>Paciente: </b>".$nome." (CPF: ".$cpf.")<br></a>";
							echo "<b>Procedimento: </b>".$nomeProcedimento."<br>";
							echo "<b>Observações: </b>".$obsProcedimento."<br>";
							echo "<b>Dentista Responsável: </b>".$nomeMedico." (CPF: ".$cpfmedicoProcedimento.")";
							
							echo "
								 </div>
								</div>
								<hr class='hr3'>
							";
				
				echo "
					<div class='service-widget'>
						<center> 
							<a href='radiografias/".$nomeImagem2."' target='_blank'><img width='30%' height='10%' src='radiografias/".$nomeImagem2."'></a>
							<br><br>
						</center>	
						<center>
							<a data-toggle='collapse' data-target='#collapseExample2' aria-expanded='false' aria-controls='collapseExample'><h3><p> ".$dataCadastro."</p></h3></a>
						</center>
					</div>
				";
				
							
				
							// Imagem 2
							$sqlInfoImg = "SELECT * FROM tb_imagem WHERE nr_idImagem =".$imagem2;
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
								<div class='collapse' id='collapseExample2'>
								  <div class='card card-body'><br>
							";
							
							echo "<a href='consultarPaciente.php?cpf=".$cpf."'><b>Paciente: </b>".$nome." (CPF: ".$cpf.")<br></a>";
							echo "<b>Procedimento: </b>".$nomeProcedimento."<br>";
							echo "<b>Observações: </b>".$obsProcedimento."<br>";
							echo "<b>Dentista Responsável: </b>".$nomeMedico." (CPF: ".$cpfmedicoProcedimento.")";
							
							echo "
								 </div>
								</div>
							";
				
				?></div>
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