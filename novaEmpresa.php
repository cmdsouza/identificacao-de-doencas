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
                        <li><a class="active" href="novaEmpresa.php">Nova Empresa</a></li> 
                        <li><a href="novaDoenca.php">Gerenciar Doença</a></li> 
                        <li><a href="logout.php">Sair</a></li> 
                     </ul>
                  </div>
				  
               </nav>
            </div>
         </div>
      </header>
	  <br><br>
	  
      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <h2>Cadastrar Nova Empresa</h2>
            </div>
		
		<div class="container">

		  <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Dados da Empresa</a></li>
			<li><a data-toggle="tab" href="#menu1">Endereço da Empresa</a></li>
		  </ul>

		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			  
				<form method='POST' action='cadastrarEmpresa.php'>
				<input type='hidden' name='quemCadastrou' value='<?php echo $_SESSION['cpf'] ?>'>
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Nome</span>
							</div>
							<input type='text' name='Nome' placeholder='Nome da Empresa' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">CNPJ</span>
							</div>
							<input type='text' name='CNPJ' placeholder='Com pontuação' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">E-mail</span>
							</div>
							<input type='email' name='email' placeholder='E-mail Corporativo' class="form-control">	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Telefone</span>
							</div>
							<input type='text' name='telefone' placeholder='Lembre-se do DDD' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Senha</span>
							</div>
							<input type='password' name='senha'  placeholder='Senha de Acesso' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				</div>  
			</div>
			<div id="menu1" class="tab-pane fade">
				  <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">CEP</span>
							</div>
							<input type='text' name='cep' placeholder='Com pontuação' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Rua</span>
							</div>
							<input type='text' name='rua' placeholder='Nome da Rua' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Complemento</span>
							</div>
							<input type='text' name='complemento' placeholder='Casa? Andar? Bloco?' class="form-control">	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Estado</span>
							</div>
							<input type='text' name='estado' placeholder='Qual o estado?' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-6 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Cidade</span>
							</div>
							<input type='text' name='cidade' placeholder='Qual a cidade?' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-6 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Bairro</span>
							</div>
							<input type='text' name='bairro' placeholder='Qual bairro?' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				</div>
			</div>
		  </div>
		</div>
		<br>
		<center><input type='submit' class='btn btn-success' value='Cadastrar'></center>
		</form>
      </div>
      <!-- end container --> 	  
	  
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