<?php
    require_once('config.php');

        if(empty($_SESSION['key'])) {
            header ('location:./');
        }

    $m = 2;
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
        <link rel="stylesheet" href="css/datatables.min.css">
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
                        <span>Equipamentos</span>
                        <span class="pull-right lead">
                            <a href="reportEquipamento.php" class="btn btn-default btn-flat" title="Gerar relat&oacute;rio dos equipamentos"><i class="fa fa-desktop"></i> Relat&oacute;rio dos equipamentos</a>
                            <!--<a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#novo-equipamento" title="Clique para cadastrar um novo equipamento"><i class="fa fa-desktop"></i> Novo equipamento</a>-->
                        </span>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                        <?php
                            include_once('conexao.php');

                            try {
                                //BUSCANDO OS EQUIPAMENTO

                                $mostra = 'T';
                                $sql = $pdo->prepare("SELECT idequipamento,cliente_idcliente AS idcliente,unidade,sala,nome,patrimonio,sistema,serial,placamae,cpu,memoria,disco,lan_1,lan_2,wlan FROM equipamento WHERE mostra = :mostra ORDER BY unidade,sala,nome,patrimonio,sistema");
                                $sql->bindParam(':mostra', $mostra, PDO::PARAM_STR);
                                $sql->execute();
                                $ret = $sql->rowCount();

                                    if($ret > 0) {
                                        $pyidequipamento = md5('idequipamento');

                                        echo'
                                        <table class="table table-striped table-bordered table-hover table-data">
                                            <thead>
                                                <tr>
                                                    <!--<th></th>-->
                                                    <th>Unidade</th>
                                                    <th>Sala</th>
                                                    <th>Nome</th>
                                                    <th>Patrim&ocirc;nio</th>
                                                    <th>Sistema</th>
                                                    <th>CPU</th>
                                                    <th>Mem&oacute;ria</th>
                                                    <th>LAN 1</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                                            while($lin = $sql->fetch(PDO::FETCH_OBJ)) {
                                                switch($lin->unidade) {
                                                    case 'Farmacia MonteAlegre':
                                                        $lin->unidade = 'Farm&aacute;cia Monte Alegre';
                                                    break;
                                                    case 'Manutencao':
                                                        $lin->unidade = 'Manuten&ccedil;&atilde;o';
                                                    break;
                                                    case 'Policlinica':
                                                        $lin->unidade = 'Policl&iacute;nica';
                                                    break;
                                                    case 'UBS JoaoMendes':
                                                        $lin->unidade = 'UBS Jo&atilde;o Mendes';
                                                    break;
                                                    case 'UBS RioPequeno':
                                                        $lin->unidade = 'UBS Rio Pequeno';
                                                    break;
                                                    case 'UBS SantaRegina':
                                                        $lin->unidade = 'UBS Santa Regina';
                                                    break;
                                                    case 'UC Braco':
                                                        $lin->unidade = 'UC Bra&ccedil;o';
                                                    break;
                                                    case 'UC Varzea':
                                                        $lin->unidade = 'UC V&aacute;rzea';
                                                    break;
                                                }

                                                echo'
                                                <tr>
                                                    <!--<td class="td-action">
                                                        <span><a class="delete-equipamento" id="'.$pyidequipamento.'-'.$lin->idequipamento.'" title="Excluir o equipamento" href="#"><i class="fa fa-trash-o"></i></a></span>
                                                        <span><a data-toggle="modal" data-target="#edita-equipamento" title="Editar o equipamento" href="editaEquipamento.php?'.$pyidequipamento.'='.$lin->idequipamento.'"><i class="fa fa-pencil"></i></a></span>
                                                    </td>-->
                                                    <td>'.$lin->unidade.'</td>
                                                    <td>'.$lin->sala.'</td>
                                                    <td>'.$lin->nome.'</td>
                                                    <td>'.$lin->patrimonio.'</td>
                                                    <td>'.$lin->sistema.'</td>
                                                    <td>'.$lin->cpu.'</td>
                                                    <td>'.$lin->memoria.'</td>
                                                    <td>'.$lin->lan_1.'</td>
                                                </tr>';
                                            }

                                        echo'
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <!--<th></th>-->
                                                    <th>Unidade</th>
                                                    <th>Sala</th>
                                                    <th>Nome</th>
                                                    <th>Patrim&ocirc;nio</th>
                                                    <th>Sistema</th>
                                                    <th>CPU</th>
                                                    <th>Mem&oacute;ria</th>
                                                    <th>LAN 1</th>
                                                </tr>
                                            </tfoot>
                                        </table>';

                                        unset($lin,$pyidequipamento);
                                    }
                                    else {
                                        echo'
                                        <div class="callout">
                                            <h4>Nada encontrado</h4>
                                            <p>Nenhum registro foi encontrado. <a class="link-new" data-toggle="modal" data-target="#novo-equipamento" title="Clique para cadastrar um novo equipamento" href="#">Novo equipamento</a></p>
                                        </div>';
                                    }

                                unset($sql,$ret,$mostra);
                            }
                            catch(PDOException $e) {
                                echo 'Erro ao conectar o servidor '.$e->getMessage();
                            }
                        ?>
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

            <div class="modal fade" id="novo-equipamento" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-novo-equipamento">
                            <div class="modal-header">
                                <button type="button" class="close closed" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Novo equipamento <small>(<i class="fa fa-asterisk"></i> Campo obrigat&oacute;rio)</small></h4>
                            </div>
                            <div class="modal-body overing">
                                <div class="col-md-6">
                                    <input type="hidden" name="rand" id="rand" value="<?php echo md5(mt_rand()); ?>">
                                    <input type="hidden" name="idcliente" id="idcliente" value="1673">

                                    <div class="form-group">
                                        <label class="label-unidade" for="unidade-equipamento"><i class="fa fa-asterisk"></i> Unidade</label>
                                        <!--<input type="text" name="unidade-equipamento" id="unidade-equipamento" class="form-control" maxlength="100" title="Digite o nome da unidade" placeholder="Unidade/Setor" required>-->
                                        <select name="unidade-equipamento" id="unidade-equipamento" class="form-control" title="Digite o nome da unidade" required>
                                            <option value="" selected>Selecione a Unidade</option>
                                            <option value="Almoxarifado">Almoxarifado</option>
                                            <option value="CAPS">CAPS</option>
                                            <option value="CEDIT">CEDIT</option>
                                            <option value="Farmacia MonteAlegre">Farm&aacute;cia Monte Alegre</option>
                                            <option value="Garagem">Garagem</option>
                                            <option value="Hospital">Hospital</option>
                                            <option value="Manutencao">Manuten&ccedil;&atilde;o</option>
                                            <option value="Policlinica">Policl&iacute;nica</option>
                                            <option value="UBS Areias">UBS Areias</option>
                                            <option value="UBS Caic">UBS Caic</option>
                                            <option value="UBS Cedro">UBS Cedro</option>
                                            <option value="UBS Centro">UBS Centro</option>
                                            <option value="UBS Conde">UBS Conde</option>
                                            <option value="UBS JoaoMendes">UBS Jo&atilde;o Mendes</option>
                                            <option value="UBS Macacos">UBS Macacos</option>
                                            <option value="UBS RioPequeno">UBS Rio Pequeno</option>
                                            <option value="UBS SantaRegina">UBS Santa Regina</option>
                                            <option value="UBS Taboleiro">UBS Taboleiro</option>
                                            <option value="UC Braco">UC Bra&ccedil;o</option>
                                            <option value="UC Varzea">UC V&aacute;rzea</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-sala" for="sala-equipamento">Sala</label>
                                        <input type="text" name="sala-equipamento" id="sala-equipamento" class="form-control" maxlength="100" title="Digite a sala onde o equipamento se encontra" placeholder="Sala/Setor">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-nome" for="nome-equipamento"><i class="fa fa-asterisk"></i> Nome</label>
                                        <input type="text" name="nome-equipamento" id="nome-equipamento" class="form-control" maxlength="255" title="Digite o nome do equipamento" placeholder="Nome/Host" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-patrimonio" for="patrimonio-equipamento">Patrim&ocirc;nio</label>
                                        <input type="text" name="patrimonio-equipamento" id="patrimonio-equipamento" class="form-control" maxlength="20" title="Digite o patrim&ocirc;nio do equipamento" placeholder="Patrim&ocirc;nio">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-sistema" for="sistema-equipamento"><i class="fa fa-asterisk"></i> Sistema</label>
                                        <input type="text" name="sistema-equipamento" id="sistema-equipamento" class="form-control" maxlength="100" title="Digite o sistema do equipamento" placeholder="Sistema" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-serial" for="serial-equipamento">Serial</label>
                                        <input type="text" name="serial-equipamento" id="serial-equipamento" class="form-control" maxlength="29" title="Digite o serial do equipamento" placeholder="Serial">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-placamae" for="placamae-equipamento"><i class="fa fa-asterisk"></i> Placa m&atilde;e</label>
                                        <input type="text" name="placamae-equipamento" id="placamae-equipamento" class="form-control" maxlength="100" title="Digite a marca e modelo da placa m&atilde;e do equipamento" placeholder="Placa m&atilde;e" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-cpu" for="cpu-equipamento"><i class="fa fa-asterisk"></i> CPU</label>
                                        <input type="text" name="cpu-equipamento" id="cpu-equipamento" class="form-control" maxlength="100" title="Digite a marca e modelo do processador do equipamento" placeholder="Processador" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-memoria" for="memoria-equipamento"><i class="fa fa-asterisk"></i> Mem&oacute;ria</label>
                                        <input type="text" name="memoria-equipamento" id="memoria-equipamento" class="form-control" maxlength="100" title="Digite a marca e o modelo da mem&oacute;ria do equipamento" placeholder="Mem&oacute;ria" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-disco" for="disco-equipamento"><i class="fa fa-asterisk"></i> Disco</label>
                                        <input type="text" name="disco-equipamento" id="disco-equipamento" class="form-control" maxlength="100" title="Digite a marca e modelo do HD/SSD do equipamento" placeholder="Disco" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-lan_1" for="lan_1-equipamento"><i class="fa fa-asterisk"></i> LAN 1</label>
                                        <input type="text" name="lan_1-equipamento" id="lan_1-equipamento" class="form-control" maxlength="17" title="Digite o MAC da LAN 1 do equipamento" placeholder="LAN 1">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-lan_2" for="lan_2-equipamento">LAN 2</label>
                                        <input type="text" name="lan_2-equipamento" id="lan_2-equipamento" class="form-control" maxlength="17" title="Digite o MAC da LAN 2 do equipamento" placeholder="LAN 2">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-wlan" for="wlan-equipamento">WLAN</label>
                                        <input type="text" name="wlan-equipamento" id="wlan-equipamento" class="form-control" maxlength="17" title="Digite o MAC da WLAN do equipamento" placeholder="WLAN">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left closed" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-novo-equipamento">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edita-equipamento" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"></div>
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
        <script src="js/masked.min.js"></script>
        <script src="js/inputmask.bundle.min.js"></script>
        <script src="js/icheck.min.js"></script>
        <script src="js/datatables.min.js"></script>
        <script src="js/datatables.bootstrap.min.js"></script>
        <script src="js/core.min.js"></script>
    </body>
</html>
<?php unset($cfg,$rnd,$rnd2,$serial,$m); ?>