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
                        <li><a class="active" href="inicial.php">Página Inicial</a></li> 
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
      <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="text-contant">
                     <h2>
                        <span class="center"><span class="icon"><img src="images/tooth.png" alt="#" /></span></span>
                        <p style='color:white;' class="typewrite">Bem-Vindo, <?php echo $_SESSION['nome']; ?></p>
                     </h2>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end section -->
      <div id="time-table" class="time-table-section">
         <div class="container">
			
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time one" style="background:#2895f1;">
                     <span class="info-icon"><i class="fa fa-archive" aria-hidden="true"></i></span>
                     <a href='imagensCadastradas.php'><h3>Banco de Registros de Prontuários</h3>
                     <p style='color:white;'><br>Clique aqui para acessar todas as radiografias cadastradas!</p></a>
					 <p><br><input type='submit' class="btn btn-success" value='Entrar!'></p>
                  </div>
               </div>
            </div>
			
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time middle" style="background:#0071d1;">
                     <span class="info-icon"><i class="fa fa-check-square-o" aria-hidden="true"></i></span> 
                     <h3>Comparação de Exames de Imagem</h3>
                     <div class="time-table-section">
                        <p>Selecione uma radiografia para compararmos com as iamgens já cadastradas:</p>
						<form action="gravar.php" method="POST" enctype="multipart/form-data">
							<p><br><input type='file' name='imagem'></p>
							<p><br><input type='submit' class="btn btn-success" value='Comparar'></p>
						</form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time three" style="background:#0060b1;">
				  <form method='POST' action='compararDois.php'>
                     <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                     <h3>Comparação de Exames já Cadastrados</h3>
                     <div class="time-table-section">
                        <br>
						<div class="row">
							<select class="form-control"  name='imagem1'>
								<?php
									$sqlProced = "SELECT * FROM tb_imagem";
									$resultadoProced = mysql_query($sqlProced) or die();
									while($linhaProced = mysql_fetch_array($resultadoProced)){
										$sqlProced2 = "SELECT * FROM tb_paciente WHERE nr_cpf = '".$linhaProced['nr_cpfPaciente']."'";
										$resultadoProced2 = mysql_query($sqlProced2) or die();
										while($linhaProced2 = mysql_fetch_array($resultadoProced2)){
											$nome = $linhaProced2['nm_nome'];
										}
										echo "
											<option value='".$linhaProced['nr_idImagem']."'>".$nome." - ".$linhaProced['dt_dataCadastro']."</option>
										";
									}
								?>
							</select>
							<select class="form-control" name='imagem2'>
									<?php
									$sqlProced = "SELECT * FROM tb_imagem";
									$resultadoProced = mysql_query($sqlProced) or die();
									while($linhaProced = mysql_fetch_array($resultadoProced)){
										$sqlProced2 = "SELECT * FROM tb_paciente WHERE nr_cpf = '".$linhaProced['nr_cpfPaciente']."'";
										$resultadoProced2 = mysql_query($sqlProced2) or die();
										while($linhaProced2 = mysql_fetch_array($resultadoProced2)){
											$nome = $linhaProced2['nm_nome'];
										}
										echo "
											<option value='".$linhaProced['nr_idImagem']."'>".$nome." - ".$linhaProced['dt_dataCadastro']."</option>
										";
									}
									?>
								</select>
							</div>
                        <p><br><input type='submit' class="btn btn-success" value='Comparar'></p>
                     </div>
					</form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <h2>Curiosidades</h2>
            </div>
			<hr class="hr1">
            <div class="row">
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
						<center>
							<h2>
								<?php
									$sqlMedic = "SELECT * FROM tb_medico";
									$resultadoMedic = mysql_query($sqlMedic) or die();
									echo $numMedic = mysql_num_rows($resultadoMedic);
								?>
							</h2>
						</center>
						<h3>Dentistas Cadastrados</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
						<center>
							<h2>
								<?php
									$sqlImg = "SELECT * FROM tb_imagem";
									$resultadoImg = mysql_query($sqlImg) or die();
									echo $numImg = mysql_num_rows($resultadoImg);
								?>
							</h2>
						</center>
						<h3>Radiografias Cadastradas</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
						<center>
							<h2>
								<?php
									$sqlPac = "SELECT * FROM tb_paciente";
									$resultadoPac = mysql_query($sqlPac) or die();
									echo $numPac = mysql_num_rows($resultadoPac);
								?>
							</h2>
						</center>
						<h3>Pacientes Cadastrados</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
						<center>
							<h2>
								<?php
									$sqlComp = "SELECT * FROM tb_comparacoes";
									$resultadoComp = mysql_query($sqlComp) or die();
									echo $numComp = mysql_num_rows($resultadoComp);
								?>
							</h2>
						</center>
						<h3>Comparações Realizadas</h3>
                  </div>
                  <!-- end service -->
               </div>
            </div>
			<hr class="hr1">
			
			
			
			
			
         </div>
         <!-- end container -->
      </div>
	  <!-- doctor -->
	  
	  
	  
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