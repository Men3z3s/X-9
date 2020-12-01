<?php
    require_once('config.php');

        if(empty($_SESSION['key'])) {
            header ('location:./');
        }

    $m = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $cfg['titulo']; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/autocomplete.min.css">
        <link rel="stylesheet" href="css/smoke.min.css">
        <link rel="stylesheet" href="css/datepicker.min.css">
        <link rel="stylesheet" href="css/icheck.min.css">
        <link rel="stylesheet" href="css/datatables.min.css">
        <link rel="stylesheet" href="css/skin-blue.min.css">
        <link rel="stylesheet" href="css/core.min.css">
        <!--[if lt IE 9]><script src="js/html5shiv.min.js"></script><script src="js/respond.min.js"></script><![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header"><?php include_once('header.php'); ?></header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar"><?php include_once('sidebar.php'); ?></aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Erro 404</h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="error-page">
                        <h2 class="headline text-yellow"> 404</h2>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Oops! P&aacute;gina n&atilde;o encontrada.</h3>
                            <p>N&atilde;o encontramos a p&aacute;gina que voc&ecirc; procura, entretanto voc&ecirc; pode <a title="Voltar para o in&iacute;cio" href="inicio">retonar para o in&iacute;cio</a> ou tentar usar o &iacute;cone de busca.</p>
                        </div><!-- /.error-content -->
                    </div><!-- /.error-page -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Modal -->
            <div class="modal fade" id="nova-ocorrencia" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-nova-ocorrencia">
                        <?php
                            //GERANDO O SERIAL

                            $rnd = substr(md5(rand()),0,2);
                            $rnd2 = substr(md5(rand()),2,2);
                            $serial = md5(rand());
                            $serial = base64_encode($serial);
                            $serial = substr($serial,0,2);
                            $rnd = strtoupper($rnd);
                            $rnd2 = strtoupper($rnd2);
                            $serial = strtoupper($serial);
                            $serial = $serial.date('dm').$rnd2.$rnd;
                        ?>
                            <div class="modal-header">
                                <button type="button" class="close closed" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Nova ocorr&ecirc;ncia <small>(<i class="fa fa-asterisk"></i> Campo obrigat&oacute;rio)</small> <span class="pull-right lead"><strong><?php echo $serial; ?></strong></span></h4>
                            </div>
                            <div class="modal-body overing">
                                <div class="col-md-6">
                                    <input type="hidden" id="serial" class="form-control" value="<?php echo $serial; ?>">

                                    <div class="form-group">
                                        <label for="cliente"><i class="fa fa-asterisk"></i> Cliente</label>
                                        <input type="text" id="cliente" class="form-control" maxlength="255" title="Digite o nome do cliente" placeholder="Cliente" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="datado"><i class="fa fa-asterisk"></i> Data</label>
                                        <div class="input-group col-md-6">
                                            <input type="text" id="datado" class="form-control" maxlength="10" value="<?php echo date('d/m/Y'); ?>" title="Digite a data" placeholder="Data" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hora"><i class="fa fa-asterisk"></i> Hora</label>
                                        <div class="input-group col-md-6">
                                            <select id="hora" class="form-control">
                                                <option value="" selected>Selecione a hora</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-icheck">
                                        <div class="form-group">
                                            <label for="entrega"><i class="fa fa-asterisk"></i> Entregar</label>
                                            <div class="input-group">
                                                <span class="form-icheck"><input type="radio" name="entrega" id="onentrega" value="T"> Sim</span>
                                                <span class="form-icheck"><input type="radio" name="entrega" id="offentrega" value="F" checked> N&atilde;o</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fechada"><i class="fa fa-asterisk"></i> Concluir</label>
                                            <div class="input-group">
                                                <span class="form-icheck"><input type="radio" name="fechada" id="onfechada" value="T"> Sim</span>
                                                <span class="form-icheck"><input type="radio" name="fechada" id="offfechada" value="F" checked> N&atilde;o</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="retorno"><i class="fa fa-asterisk"></i> Retorno</label>
                                            <div class="input-group">
                                                <span class="form-icheck"><input type="radio" name="retorno" id="onretorno" value="T"> Sim</span>
                                                <span class="form-icheck"><input type="radio" name="retorno" id="offretorno" value="F" checked> N&atilde;o</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recibo"><i class="fa fa-asterisk"></i> T&eacute;cnico</label>
                                        <div class="input-group col-md-6">
                                            <select id="tecnico" class="form-control" required>
                                                <option value="" selected>Selecione o t&eacute;cnico</option>
                                                <?php
                                                    include_once('conexao.php');

                                                    try {
                                                        $sql = $pdo->prepare("SELECT nome FROM tecnico ORDER BY nome");
                                                        $sql->execute();
                                                        $ret = $sql->rowCount();

                                                            if($ret > 0) {
                                                                while($lin = $sql->fetch(PDO::FETCH_OBJ)) {
                                                                    echo'<option value="'.$lin->nome.'">'.$lin->nome.'</option>';
                                                                }

                                                                unset($lin);
                                                            }

                                                        unset($sql,$ret);
                                                    }
                                                    catch(PDOException $e) {
                                                        echo 'Erro ao conectar o servidor '.$e->getMessage();
                                                    }
                                                ?>
                                            </select>
                                            <span class="input-group-addon">
                                                <a data-toggle="modal" data-target="#novo-tecnico" href="#"><i class="fa fa-plus fa-fw"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="solicitacao"><i class="fa fa-asterisk"></i> Solicita&ccedil;&atilde;o</label>
                                        <textarea id="solicitacao" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="diagnostico">Diagn&oacute;stico</label>
                                        <textarea id="diagnostico" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="procedimento">Procedimento</label>
                                        <textarea id="procedimento" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacao">Observa&ccedil;&atilde;o</label>
                                        <textarea id="observacao" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left closed" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-nova-ocorrencia">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="nova-nota" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-nova-nota">
                            <div class="modal-header">
                                <button type="button" class="close closed" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Nova nota <small>(<i class="fa fa-asterisk"></i> Campo obrigat&oacute;rio)</small></h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="datado"><i class="fa fa-asterisk"></i> Data</label>
                                    <div class="input-group col-md-3">
                                        <input type="text" id="datado-nota" class="form-control" maxlength="10" value="<?php echo date('d/m/Y'); ?>" title="Digite a data" placeholder="Data" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tecnico"><i class="fa fa-asterisk"></i> T&eacute;cnico</label>
                                    <div class="input-group col-md-5">
                                        <select id="tecnico-nota" class="form-control" required>
                                            <option value="" selected>Selecione o t&eacute;cnico</option>
                                            <?php
                                                try {
                                                    $sql = $pdo->prepare("SELECT nome FROM tecnico ORDER BY nome");
                                                    $sql->execute();
                                                    $ret = $sql->rowCount();

                                                        if($ret > 0) {
                                                            while($lin = $sql->fetch(PDO::FETCH_OBJ)) {
                                                                echo'<option value="'.$lin->nome.'">'.$lin->nome.'</option>';
                                                            }

                                                            unset($lin);
                                                        }

                                                    unset($pdo,$sql,$ret);
                                                }
                                                catch(PDOException $e) {
                                                    echo 'Erro ao conectar o servidor '.$e->getMessage();
                                                }
                                            ?>
                                        </select>
                                        <span class="input-group-addon">
                                            <a data-toggle="modal" data-target="#novo-tecnico" href="#"><i class="fa fa-plus fa-fw"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="texto"><i class="fa fa-asterisk"></i> Texto</label>
                                    <textarea id="texto" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left closed" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-nova-nota">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="novo-tecnico" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-novo-tecnico">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Novo t&eacute;cnico <small>(<i class="fa fa-asterisk"></i> Campo obrigat&oacute;rio)</small></h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nome"><i class="fa fa-asterisk"></i> Nome</label>
                                    <input type="text" id="nome" class="form-control" maxlength="255" title="Digite o nome do t&eacute;cnico" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-novo-tecnico">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- ./modal -->

            <!-- Main Footer -->
            <footer class="main-footer"><?php include_once('footer.php'); ?></footer>
        </div><!-- ./wrapper -->

        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/autocomplete.min.js"></script>
        <script src="js/smoke.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/icheck.min.js"></script>
        <script src="js/datatables.min.js"></script>
        <script src="js/datatables.bootstrap.min.js"></script>
        <script src="js/core.min.js"></script>
    </body>
</html>
<?php unset($cfg,$rnd,$rnd2,$serial,$m); ?>
