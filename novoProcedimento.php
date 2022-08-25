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
                        <li><a class="active" href="novoProcedimento.php">Novo Procedimento</a></li> 
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
	  
      <div id="about" class="section wow fadeIn">
	  
		<?php
					if(isset($_POST["tipoCadastro"])){
						switch($_POST["tipoCadastro"]){
							case 'novo':
		?>
	  
         <div class="container">
            <div class="heading">
               <h2>Cadastrar Novo Procedimento</h2>
            </div>
			
		<div class="container">

		  <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Dados Pessoais do Paciente</a></li>
			<li><a data-toggle="tab" href="#menu1">Endereço do Paciente</a></li>
			<li><a data-toggle="tab" href="#menu2">Documentos</a></li>
			<li><a data-toggle="tab" href="#menu3">Procedimento que Será Realizado</a></li>
		  </ul>

		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<form method='POST' action='cadastrarProcedimento.php' enctype="multipart/form-data">
				<input type='hidden' name='quemCadastrou' value='<?php echo $_SESSION['cpf']; ?>'>
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Nome Completo</span>
							</div>
							<input type='text' name='nome' placeholder='Nome Completo' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">CPF</span>
							</div>
							<input type='text' name='cpf' placeholder='Com pontuação' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Gênero</span>
							</div>
							<select name='sexo' class='form-control'>
								<option value='Feminino'>Feminino</option>
								<option value='Masculino'>Masculino</option>
							<select>	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Data de Nascimento</span>
							</div>
							<input type='date' name='nascimento' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">RG</span>
							</div>
							<input type='text' name='rg' placeholder='Com pontuação' class="form-control">
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
			<div id="menu2" class="tab-pane fade">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 1</span>
							</div>
							<input type='file' name='imagem1' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 1</span>
							</div>
							<select name='tipo1' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 2</span>
							</div>
							<input type='file' name='imagem2' class='form-control'>	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 2</span>
							</div>
							<select name='tipo2' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 3</span>
							</div>
							<input type='file' name='imagem3' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 3</span>
							</div>
							<select name='tipo3' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 4</span>
							</div>
							<input type='file' name='imagem4' class='form-control'>	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 4</span>
							</div>
							<select name='tipo4' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 5</span>
							</div>
							<input type='file' name='imagem5' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 5</span>
							</div>
							<select name='tipo5' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 6</span>
							</div>
							<input type='file' name='imagem6' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 6</span>
							</div>
							<select name='tipo6' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				</div>     
			</div>
			<div id="menu3" class="tab-pane fade">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Nome do Procedimento</span>
							</div>
							<input type='text' name='procedimento' placeholder='Nome do Procedimento' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Observações</span>
							</div>
							<textarea name='observacoes' class="form-control"></textarea>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Data da Radiografia</span>
							</div>
							<input type='date' name='solicitacao' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Médico Responsável</span>
							</div>
							<select name='medico' class="form-control">
										<?php
												$sqlMedico = "SELECT * FROM tb_medico";
												$resultadoMedico = mysql_query($sqlMedico) or die();
												while($linhaMedico = mysql_fetch_array($resultadoMedico)){
													echo "<option value=".$linhaMedico['nr_cpfMedico'].">".$linhaMedico['nm_nomeMedico']."</option>";
												}
										?>
									</select>
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
	  
	  	<?php	
				break;
				
				case 'antigo':
				
		?>
	  
	  <div class="container">
            <div class="heading">
               <h2>Cadastrar Novo Procedimento</h2>
            </div>
			
		
		<div class="container">

		  <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Paciente</a></li>
			<li><a data-toggle="tab" href="#menu1">Documentos</a></li>
			<li><a data-toggle="tab" href="#menu2">Procedimento que Será Realizado</a></li>
		  </ul>

		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			 
				<form method='POST' action='cadastrarProcedimentoAntigo.php' enctype="multipart/form-data">
				<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="service-widget">
								<select name='paciente' class="form-control">
												<?php
													$sqlMedico = "SELECT * FROM tb_paciente";
													$resultadoMedico = mysql_query($sqlMedico) or die();
													while($linhaMedico = mysql_fetch_array($resultadoMedico)){
														echo "<option value=".$linhaMedico['nr_cpf'].">".$linhaMedico['nm_nome']."</option>";
													}
												?>
											</select>
						  </div><br>
						  <!-- end service -->
					   </div>
				</div> 
			 
			</div>
			<div id="menu1" class="tab-pane fade">
			  
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 1</span>
							</div>
							<input type='file' name='imagem1' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 1</span>
							</div>
							<select name='tipo1' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 2</span>
							</div>
							<input type='file' name='imagem2' class='form-control'>	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 2</span>
							</div>
							<select name='tipo2' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 3</span>
							</div>
							<input type='file' name='imagem3' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 3</span>
							</div>
							<select name='tipo3' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 4</span>
							</div>
							<input type='file' name='imagem4' class='form-control'>	
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 4</span>
							</div>
							<select name='tipo4' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 5</span>
							</div>
							<input type='file' name='imagem5' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 5</span>
							</div>
							<select name='tipo5' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Arquivo 6</span>
							</div>
							<input type='file' name='imagem6' class='form-control'>
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Tipo de Arquivo 6</span>
							</div>
							<select name='tipo6' class='form-control'>
								<option value='radiografia'>Radiografia</option>
								<option value='prontuario'>Prontuário</option>
							<select>
					  </div>
					  <!-- end service -->
				   </div>
				</div>   
			  
			</div>
			<div id="menu2" class="tab-pane fade">
			  
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Nome do Procedimento</span>
							</div>
							<input type='text' name='procedimento' placeholder='Nome do Procedimento' class="form-control">
					  </div><br>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Observações</span>
							</div>
							<textarea name='observacoes' class="form-control"></textarea>
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Data da Radiografia</span>
							</div>
							<input type='date' name='solicitacao' class="form-control">
					  </div>
					  <!-- end service -->
				   </div>
				   <div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="service-widget">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">Médico Responsável</span>
							</div>
							<select name='medico' class="form-control">
										<?php
												$sqlMedico = "SELECT * FROM tb_medico";
												$resultadoMedico = mysql_query($sqlMedico) or die();
												while($linhaMedico = mysql_fetch_array($resultadoMedico)){
													echo "<option value=".$linhaMedico['nr_cpfMedico'].">".$linhaMedico['nm_nomeMedico']."</option>";
												}
										?>
									</select>
					  </div>
					  <!-- end service -->
				   </div>
				</div>  
			</div>
		  </div>
		</div>


		<br><input type='hidden' name='quemCadastrou' value='<?php echo $_SESSION['cpf']; ?>'>
		<center><input type='submit' class='btn btn-success' value='Cadastrar'></center>
		</form>
		</div>
		
		<?php
				
				break;
			}

		}else{
			echo "
				<div class='row'>
					<div class='col-md-12 col-sm-6 col-xs-12'>
						<div class='service-widget'>
							<form method='POST' action='novoProcedimento.php'>
								<center>
									<input type='radio' name='tipoCadastro' value='antigo' checked> Procedimento de um Paciente Já Cadastrado <br>
									<input type='radio' name='tipoCadastro' value='novo' > Procedimento de um Paciente Novo <br><br>
									<input type='submit' class='btn btn-success' value='Atualizar Formulário'>
								</center>
							</form>
						</div>
					</div>
				</div>
			";
		}
		
	
	?>
		
	  
	  
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