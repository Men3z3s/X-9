<?php
    require_once('config.php');

        if(empty($_SESSION['key'])) {
            header ('location:./');
        }

    $m = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $cfg['titulo']; ?></title>
        <link rel="icon" type="image/png" href="img/favicon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/autocomplete.min.css">
        <link rel="stylesheet" href="css/smoke.min.css">
        <link rel="stylesheet" href="css/datepicker.min.css">
        <link rel="stylesheet" href="css/icheck.min.css">
        <link rel="stylesheet" href="css/skin-blue.min.css">
        <link rel="stylesheet" href="css/core.min.css">
        <!--[if lt IE 9]><script src="js/html5shiv.min.js"></script><script src="js/respond.min.js"></script><![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header"><?php include_once('headerSecretaria.php'); ?></header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar"><?php include_once('sidebarSecretaria.php'); ?></aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <span>In&iacute;cio</span>
                        <span class="pull-right lead">
                            <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#nova-ocorrencia" title="Clique para abrir uma nova ocorr&ecirc;ncia" href="#"><i class="fa fa-file-text"></i> Nova ocorr&ecirc;ncia</a>
                        </span>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                        <!-- carrega o arquivo monitorOcorrencia.php -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Modal -->
            <?php
                include_once('modalNovaOcorrenciaSecretaria.php');
                #include_once('modalNovaNota.php');
                #include_once('modalNovoTecnico.php');
            ?>
            <!-- /.modal -->

            <!-- Main Footer -->
            <footer class="main-footer"><?php include_once('footer.php'); ?></footer>
        </div><!-- ./wrapper -->

        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/autocomplete.min.js"></script>
        <script src="js/smoke.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/icheck.min.js"></script>
        <script src="js/core.min.js"></script>
        <!--<script async src="js/polling.min.js"></script>-->
        <script>
            $(document).ready(function () {
                
                /* REQUEST AJAX ASYNC */
                
                var callPanel = function() {
                    $.ajax({
                        url: 'monitorOcorrenciaSecretaria.php',
                        async: true,
                        beforeSend : function() {
                            //$.smkAlert({text: '<img src="img/rings.svg" style="width: 25px;position: relative;top: 0;"> Carregando', type: 'info', time: 1});
                        }
                    }).done(function(data) {
                       $(".box-body").html(data);
                    });    
                }
                
                setTimeout(callPanel, 100); //executado apenas uma vez
                setInterval(callPanel, 15000); //executado de 15 em 15 segundos
            });
        </script>
    </body>
</html>
<?php unset($cfg,$rnd,$rnd2,$serial,$m); ?>