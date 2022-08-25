<?php

session_start();
include "conexao.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Stisla</title>

  <link rel="stylesheet" href="../dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="../dist/modules/summernote/summernote-lite.css">
  <link rel="stylesheet" href="../dist/modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../dist/css/demo.css">
  <link rel="stylesheet" href="../dist/css/style.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
	  <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
          </ul>
        </form>
	  </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Comparar</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="../dist/img/avatar/tooth.png">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $_SESSION['nome']; ?></div>
              <div class="user-role">
                <?php echo $_SESSION['tipo']; ?>
              </div>
			  <a href='logout.php'>Sair</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Página Inicial</li>
            <li class="active">
              <a href="inicial.php"><i class="ion ion-monitor"></i><span>Página Inicial</span></a>
            </li>

            <li class="menu-header">Ações</li>
            <li> <a href="novoProcedimento.php"><i class="ion ion-image"></i><span>Novo Procedimento</span></a></li>
            <li> <a href="imagensCadastradas.php"><i class="ion ion-search"></i><span>Imagens Cadastradas</span></a></li>
            <li> <a href="novoMedico.php"><i class="ion ion-person-add"></i><span>Novo Dentista</span></a></li>
            <li> <a href="novaEmpresa.php"><i class="ion ion-briefcase"></i><span>Nova Empresa</span></a></li>
            <li> <a href="novaDoenca.php"><i class="ion ion-medkit"></i><span>Nova Doença</span></a></li>
        </ul>
        </aside>
      </div>
      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Página Inicial</div>
          </h1>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                  <i class="ion ion-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Dentistas Cadastrados </h4>
                  </div>
                  <div class="card-body">
                    <?php
						$sqlMedic = "SELECT * FROM tb_medico";
						$resultadoMedic = mysql_query($sqlMedic) or die();
						echo $numMedic = mysql_num_rows($resultadoMedic);
					?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                  <i class="ion ion-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Radiografias</h4>
                  </div>
                  <div class="card-body">
					<?php
						$sqlImg = "SELECT * FROM tb_imagem";
						$resultadoImg = mysql_query($sqlImg) or die();
						echo $numImg = mysql_num_rows($resultadoImg);
					?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                  <i class="ion ion-person"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pacientes</h4>
                  </div>
                  <div class="card-body">
                    <?php
						$sqlPac = "SELECT * FROM tb_paciente";
						$resultadoPac = mysql_query($sqlPac) or die();
						echo $numPac = mysql_num_rows($resultadoPac);
					?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-success">
                  <i class="ion ion-shuffle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Comparações</h4>
                  </div>
                  <div class="card-body">
					<?php
						$sqlComp = "SELECT * FROM tb_comparacoes";
						$resultadoComp = mysql_query($sqlComp) or die();
						echo $numComp = mysql_num_rows($resultadoComp);
					?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
		</section>
				
	<div class='row'>
		<div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
				<div class="card-header">
                    <div class="float-right">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                    </div>
                    <h4>Comparar Duas Radiografias Já Cadastradas</h4>
                  </div>
				  <form method='POST' action='compararDois.php'>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
						<div class="row">
							<div class="form-group col-6">
								<label>Imagem 1</label>
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
							</div>
							<div class="form-group col-6">
								<label>Imagem 2</label>
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
						</div>
						<input type='submit' class="btn btn-dark" value='Comparar'>
						</form>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
				<div class="card-header">
                    <div class="float-right">
                      <a data-collapse="#mycard-collapse2" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                    </div>
                    <h4>Comparar Uma Imagem com as Radiografias Cadastradas</h4>
                  </div>
                  <div class="collapse show" id="mycard-collapse2">
                    <div class="card-body">
						<form action="gravar.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group col-6">
								<label>Imagem 1</label>
								<input type='file' name='imagem'>
							</div>
						</div><br>
						<input type='submit' class="btn btn-dark" value='Comparar'>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
		
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div>
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <script src="../dist/modules/jquery.min.js"></script>
  <script src="../dist/modules/popper.js"></script>
  <script src="../dist/modules/tooltip.js"></script>
  <script src="../dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="../dist/js/sa-functions.js"></script>
  
  <script src="../dist/modules/chart.min.js"></script>
  <script src="../dist/modules/summernote/summernote-lite.js"></script>

  <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'Statistics',
        data: [460, 458, 330, 502, 430, 610, 488],
        borderWidth: 2,
        backgroundColor: 'rgb(87,75,144)',
        borderColor: 'rgb(87,75,144)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  </script>
  <script src="../dist/js/scripts.js"></script>
  <script src="../dist/js/custom.js"></script>
  <script src="../dist/js/demo.js"></script>
</body>
</html>