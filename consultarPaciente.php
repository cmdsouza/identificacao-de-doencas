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
		$sqlProced = "SELECT * FROM tb_paciente WHERE nr_cpf = '".$_GET['cpf']."'";
		$resultadoProced = mysql_query($sqlProced) or die();
		while($linhaProced = mysql_fetch_array($resultadoProced)){
			$nome = $linhaProced['nm_nome'];
			$nascimento = $linhaProced['dt_nascimento'];
			$rg = $linhaProced['nr_rg'];
			$idEndereco = $linhaProced['nr_idEndereco'];
			$sexo = $linhaProced['nm_genero'];
		}
		
		$sqlEnd = "SELECT * FROM tb_endereco WHERE nr_idEndereco = ".$idEndereco;
		$resultadoEnd = mysql_query($sqlEnd) or die();
		while($linhaEnd = mysql_fetch_array($resultadoEnd)){
			$cep = $linhaEnd['nr_cep'];
			$rua = $linhaEnd['nm_rua'];
			$complemento = $linhaEnd['nm_complemento'];
			$estado = $linhaEnd['nm_estado'];
			$cidade = $linhaEnd['nm_cidade'];
			$bairro = $linhaEnd['nm_bairro'];
		}
	?>	  
      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <h2>Informações do Paciente</h2>
            </div>
			<p>Abaixo estão as informações <?php if($sexo == 'Feminino'){echo "da";}else{echo "do";}?> <b><?php echo $nome; ?></b>.</p>
			
			<br>
			
			<div class="row">
			  <div class="col-sm-6">
				<div class="card">
				  <div class="card-body">
					<h3 class="card-title">Informações Pessoais</h3>
					<p>Gênero<input type='text' name='sexo' value='<?php echo $sexo; ?>' class="form-control" disabled></p>
					<p>CPF<input type='text' name='cpf' value='<?php echo $_GET['cpf']; ?>' class="form-control" disabled></p>
					<p>Data de Nascimento<input type='text' name='nascimento' value='<?php echo $nascimento; ?>' class="form-control" disabled></p>
					<p>RG<input type='text' name='rg' value='<?php echo $rg; ?>' class="form-control" disabled></p>
				  </div>
				</div>
			  </div>
			  <div class="col-sm-6">
				<div class="card">
				  <div class="card-body">
					<h3 class="card-title">Endereço</h3>
					<p>CEP, Rua e Complemento<input type='text' name='cep' value='<?php echo $cep.", ".$rua.", ".$complemento; ?>' class="form-control" disabled></p>
					<p>Estado<input type='text' name='estado' value='<?php echo $estado; ?>' class="form-control" disabled></p>
					<p>Cidade<input type='text' name='cidade' value='<?php echo $cidade; ?>' class="form-control" disabled></p>
					<p>Bairro<input type='text' name='bairro' value='<?php echo $bairro; ?>' class="form-control" disabled></p>
				  </div>
				</div>
			  </div>
			</div>
		 </div>
	  
	<div id="about" class="section">
         <div class="container">
            <div class="heading">
               <h2>Histórico do Paciente</h2>
            </div>
			<div class="row">
				
					<?php
						$cont = 0;
						$sqlProcedimento = "SELECT * FROM tb_procedimento WHERE nr_cpfPaciente = '".$_GET['cpf']."' ORDER BY dt_solicitacao";
						$resultadoProcedimento = mysql_query($sqlProcedimento) or die();
						while($linhaProcedimento = mysql_fetch_array($resultadoProcedimento)){
							$idProcedimento = $linhaProcedimento['nr_idProcedimento'];
							$observacoes = $linhaProcedimento['nm_observacoes'];
							$nomeProcedimento = $linhaProcedimento['nm_nomeProcedimento'];
							$dataCadastro = $linhaProcedimento['dt_solicitacao'];
							$cpfMedico = $linhaProcedimento['nr_cpfMedico'];
							
							
							$sqlMedico = "SELECT * FROM tb_medico WHERE nr_cpfMedico = '".$cpfMedico."'";
							$resultadoMedico = mysql_query($sqlMedico) or die();
							while($linhaMedico = mysql_fetch_array($resultadoMedico)){
								$nomeMedico = $linhaMedico['nm_nomeMedico'];
							}
							
							echo "
							<div class='container'>
							  <ul class='nav nav-tabs'>
								<li class='active'><a data-toggle='tab' href='#home".$cont."'>Informações do Procedimento</a></li>
								<li><a data-toggle='tab' href='#menu1".$cont."'>Imagens Radiográficas Associadas</a></li>
								<li><a data-toggle='tab' href='#menu2".$cont."'>Documentos Associados</a></li>
							  </ul>

							  <div class='tab-content'>
								<div id='home".$cont."' class='tab-pane fade in active'>
									<p><b>Procedimento: </b>".$nomeProcedimento."</p>
									<p><b>Observações: </b>".$observacoes."</p>
									<p><b>Data da Imagem: </b>".$dataCadastro."</p>
									<p><b>Dentista Responsável: </b>".$nomeMedico."</p>
								</div>
								<div id='menu1".$cont."' class='tab-pane fade'>
							";	  
								  
							$sqlImagem = "SELECT * FROM tb_imagem WHERE nr_procedimento =".$idProcedimento;
							$resultadoImagem = mysql_query($sqlImagem) or die();
							while($linhaImagem = mysql_fetch_array($resultadoImagem)){
								echo "<br>
									<center>
										<a href='radiografias/".$linhaImagem['nm_imagem']."' target='_blank'>
											<img src='radiografias/".$linhaImagem['nm_imagem']."' width='30%' height='10%'> 
										</a>
									</center>
								";
							}	   
							echo "	  
								</div>
								<div id='menu2".$cont."' class='tab-pane fade'>
							";	  
								  
							$sqlArquivos = "SELECT * FROM tb_arquivos WHERE nr_procedimento =".$idProcedimento;
							$resultadoArquivos = mysql_query($sqlArquivos) or die();
							while($linhaArquivos = mysql_fetch_array($resultadoArquivos)){
								echo "<br>
									<center>
										<a href='arquivos/".$linhaArquivos['nm_arquivo']."' target='_blank'>
											Prontuário ".($cont+1)."
										</a>
									</center>
								";
							}	  
								  
								  
							echo "	  
								</div>
							  </div>
							  </div>
							  <hr class='hr3'>
							";
							
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