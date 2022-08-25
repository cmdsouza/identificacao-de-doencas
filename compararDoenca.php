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
		<br>
      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <h2>Análise das Imagens Cadastradas</h2>
            </div>
			
			<?php
				$fotoDoenca = $_POST['doenca'];
				echo "Imagem do Odontograma cadastrado: <a href='doencas/".$fotoDoenca."'>Clique Aqui</a><br><br><div class='row'>";
				
				require 'image.compare.class.php';
				include "conexao.php";

				$contador = 0;
				
				$class = new compareImages;
				$sqlDoenca = "SELECT * FROM tb_imagem";
				$resultadoDoenca = mysql_query($sqlDoenca) or die();
				while($linhaDoenca = mysql_fetch_array($resultadoDoenca)){
					
					$imagemBanco = $linhaDoenca['nm_imagem'];
					$fotoDoenca = $_POST['doenca'];
					$fator = $class->compare("radiografias/".$imagemBanco,"doencas/".$fotoDoenca);
					$porcentagem = (100 - (2.17*$fator));
								
							echo "
							
							
							  <div class='service-widget'>
									<center>
										<h2>
											<a href='radiografias/".$imagemBanco."' target='_blank'>
												<img width='30%' height='20%' src='radiografias/".$imagemBanco."'>
											</a>
										</h2>
									</center>
									<h3>Comparação ".($contador+1)." - ".$porcentagem."% </h3>
									 
							  </div>
							
							<hr class='hr3'>
							";
							
							$contador = $contador + 1;
						}		
					?>

			
            </div>
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