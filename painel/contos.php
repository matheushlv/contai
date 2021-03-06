﻿<?php 

include("conexao.php");
session_start();

if( (!isset($_SESSION['usuario']) == true ) )
{
	unset ($_SESSION['login']);
	header('location:login.php');	
}

	
?>
<?php 
session_start();

$sessaousuario = $_SESSION ['usuario']; // Ativando esta variável + 'nome' = inicia a visualização do perfil do usuário//
if($sessaousuario == NULL){
} else {
$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$sessaousuario'");
while($result = mysql_fetch_array($query)){
$idUnidade_U = $result['idUnidade'];
$idUsuario_U = $result['idUsuario'];
$nivel = $result['nivel']; // COMUM/ADMIN
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="img/icon.png" rel="shortcut icon">
    <title>Contaí | Painel Administrativo </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
    
    <!-- HELP // CONTAI -->
	<link href="assets/css/introjs.css" rel="stylesheet">
    <script src="assets/js/intro.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="img/logo.png" style="height:57px" class="img-responsive center-margin"></a>
            </div>

            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <ul class="nav side-menu">
                  <li ><a href="index.php"><i class="fa fa-home"></i> Início </a></li>
                </ul>
                <ul class="nav side-menu">
                 <?php if($nivel == 'ADMIN'){?><li><a href="categorias.php"><i class="fa fa-tags"></i> Categorias </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li  class="active"><a href="contos.php"><i class="fa fa-leanpub"></i> Contos <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_contos;?></span></a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuários </a></li>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="unidades.php"><i class="fa fa-university"></i> Unidades </span></a></li><?php } ?>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="sobre.php"><i class="fa fa-history"></i> Conheç<span style="font-weight:bold; color:#025287">Aí</span> </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="publiqueai.php"><i class="fa fa-pencil"></i> Publique<span style="font-weight:bold; color:#025287">Aí</span> <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_publiqueai;?></span></a></li>
                </ul>
		<ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="forum.php"><i class="fa fa-question"></i> Pergunt<span style="font-weight:bold; color:#025287">Aí</span> </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="sair.php"><i class="fa fa-reply"></i> Sair </a></li>
                </ul>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $sessaousuario;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:void(0);" onclick="javascript:introJs().start();">AJUD<span style="font-weight:bold; color:#025287">AÍ</span></a></li>
                    <li><a href="sair.php"><i class="fa fa-sign-out pull-right"></i>SAIR</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="max-height:10px">
          <div class="">
            <div class="page-title">
              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"  data-step="4" data-intro="Para EXCLUIR basta selecionar o conto que deseja realizar a ação e clicar em '+', após fazer isso pressione na imagem (SÍMBOLO LIXO), sendo assim o conto será excluído.." data-position='center' ></div>
            <div class="row" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"  >
                  <div class="x_title">
                    <h1 class="text-center" data-step="1" data-intro="Nessa página são 3 passos que vão ser ensinados: cadastrar, editar e excluir contos.<br>Aqui aparecerá todos os contos cadastrados por você. Antes de continuar, clique em '+' da tabela abaixo (CASO ESTEJA NO CELULAR/TABLET)<br>, clique em CONTINUAR.." data-position='center'>Contos</h1>
                    <div class="clearfix" data-step="3" data-intro="Para EDITAR basta selecionar o conto que deseja realizar a ação e clicar em '+', após fazer isso pressione na imagem (SÍMBOLO LÁPIS), você irá para uma outra página, lá aperte em AJUDAÍ" data-position='center'></div>
                  </div>
                  <div class="x_content">
                    <p class="btn btn-dark" data-step="2" data-intro="Para incluir um conto em nosso sistema basta clicar nesse botão, e você irá para uma outra página, lá aperte em AJUDAÍ.." data-position='center'>
                        <a href="contos_incluir.php"  style="color: #fff"><i class="fa fa-plus-circle"></i>&nbsp;Adicionar conto</a>
                  </p>
                    <table id="datatable-responsive" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          	<th>Código</th>
                          	<th>Data</th>
                          	<th>Titúlo</th>
                          	<th class="contoth">Unidade</th>
                          	<th>Conto</th>
                          	<th>Categoria</th>
                          	<th>Autor</th>
                          	<th>Usuário</th>
                          	<th>Imagem</th>
                          	<th>Idade</th>
                          	<th>Visualições</th>
                          	<th>Ações</th>
                        </tr>
                      </thead>
<?php
if($nivel == 'ADMIN'){
$consulta = mysql_query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y') as data FROM contos WHERE deletar != '1' ORDER BY idConto DESC ");
} else {
$consulta = mysql_query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y') as data FROM contos WHERE deletar != '1' AND idUnidade = '$idUnidade_U' ORDER BY idConto DESC ");
}
while ($dados = mysql_fetch_array($consulta))
{
	$idUnidade = $dados['idUnidade'];
	$idCategoria = $dados['idCategoria'];
	$idUsuario = $dados['idUsuario'];
?>    
                        <tr>
                        	<th><?php echo $dados['idConto']; ?></th>
							<td><?php echo $dados['data']; ?></td> 
                            <td><?php echo $dados['titulo']; ?></td>
                            <td><?php $query  = mysql_query("SELECT * FROM unidades WHERE idUnidade ='$idUnidade' and deletar != 1");
							while($resultado = mysql_fetch_array($query)){
							echo $resultado['nome'];}?></td>
                            <td class="contotd"><?php echo $dados['conto']; ?></td>
        					<td><?php $queryB  = mysql_query("SELECT * FROM categorias WHERE idCategoria ='$idCategoria' and deletar != 1");
							while($resultadoB = mysql_fetch_array($queryB)){
							echo $resultadoB['nome'];}?></td>
                            <td><?php echo $dados['autor']; ?></td>
        					<td><?php $queryC= mysql_query("SELECT * FROM usuarios WHERE idUsuario ='$idUsuario' and deletar != 1");
							while($resultadoC = mysql_fetch_array($queryC)){
							echo $resultadoC['usuario'];}?></td>
                            <td><img src="<?php echo $dados['imagem'];?>" class="img-responsive" width="100"></td>
                            <td><?php echo $dados['idade'];?></td>
                            <td><?php echo $dados['visualizacoes']; ?></td>
                            <td ><a href="contos_editar.php?id=<?php echo $dados['idConto'];?>"><i  class="fa fa-pencil-square" style="font-size: 20px"></i></a><a href="controlador.php?acao=excluir_contos&id=<?php echo $dados['idConto'];?>"><i class="fa fa-trash-o" style="font-size: 20px"></i></a></td>
                        </tr>
<?php } ?>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/js/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>
    
        <script src="assets/js/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.bootstrap.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/js/dataTables.keyTable.min.js"></script>
    <script src="assets/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/responsive.bootstrap.js"></script>
    <script src="assets/js/datatables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>

  </body>
</html>