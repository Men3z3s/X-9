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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/autocomplete.min.css">
        <link rel="stylesheet" href="../css/smoke.min.css">
        <link rel="stylesheet" href="../css/datepicker.min.css">
        <link rel="stylesheet" href="../css/icheck.min.css">
        <!--<link rel="stylesheet" href="../css/datatables.min.css">-->
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../css/dataTables.responsive.bootstrap.min.css">
        <link rel="stylesheet" href="../css/skin-blue.min.css">
        <link rel="stylesheet" href="../css/core.min.css">
        <!--[if lt IE 9]><script src="../js/html5shiv.min.js"></script><script src="../js/respond.min.js"></script><![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header"><?php include_once('headerSaude.php'); ?></header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar"><?php include_once('sidebarSaude.php'); ?></aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <span class="hidden-xs">Equipament</span>
                        <span class="hidden-xs pull-right lead">
                            <a href="reportEquipamento.php" class="btn btn-default btn-flat" title="Create equipament report"><i class="fa fa-desktop"></i> Equipment report</a>
                            <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#novo-equipamento" title="Click to register a new equipment"><i class="fa fa-desktop"></i> New equipament</a>
                        </span>
                        <span class="hidden-sm hidden-md hidden-lg lead">
                            <a href="reportEquipamento.php" class="btn btn-default btn-flat" title=""><i class="fa fa-desktop"></i> 
Generate equipment report</a>
                            <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#novo-equipamento" title="
Click to register a new equipment"><i class="fa fa-desktop"></i> New equipament</a>
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
                                        <table class="table table-striped table-bordered table-hover table-data dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Unit</th>
                                                    <th>Room</th>
                                                    <th>Name</th>
                                                    <th>Patrimony</th>
                                                    <th>Sistem</th>
                                                    <th>CPU</th>
                                                    <th>Memory</th>
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
                                                    <td class="td-action">
                                                        <span><a class="delete-equipamento" id="'.$pyidequipamento.'-'.$lin->idequipamento.'" title="Delete the equipment" href="#"><i class="fa fa-trash-o"></i></a></span>
                                                        <span><a data-toggle="modal" data-target="#edita-equipamento" title="Edit the equipment" href="editaEquipamento.php?'.$pyidequipamento.'='.$lin->idequipamento.'"><i class="fa fa-pencil"></i></a></span>
                                                    </td>
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
                                                    <th></th>
                                                    <th>Unit</th>
                                                    <th>Room</th>
                                                    <th>Name</th>
                                                    <th>Patrimony</th>
                                                    <th>System</th>
                                                    <th>CPU</th>
                                                    <th>Memory</th>
                                                    <th>LAN 1</th>
                                                </tr>
                                            </tfoot>
                                        </table>';

                                        unset($lin,$pyidequipamento);
                                    }
                                    else {
                                        echo'
                                        <div class="callout">
                                            <h4>Nothing found</h4>
                                            <p>No records found. <a class="link-new" data-toggle="modal" data-target="#novo-equipamento" title="Click to register a new equipment" href="#">New equipament</a></p>
                                        </div>';
                                    }

                                unset($sql,$ret,$mostra);
                            }
                            catch(PDOException $e) {
                                echo 'Error connecting to the server '.$e->getMessage();
                            }
                        ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Modal -->
            <?php
                include_once('modalNovaOcorrenciaSaude.php');
                include_once('modalNovaNota.php');
                include_once('modalNovoTecnico.php');
            ?>

            <div class="modal fade" id="novo-equipamento" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-novo-equipamento">
                            <div class="modal-header">
                                <button type="button" class="close closed" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">New equipament <small>(<i class="fa fa-asterisk"></i>Required field)</small></h4>
                            </div>
                            <div class="modal-body overing">
                                <div class="col-md-6">
                                    <input type="hidden" name="rand" id="rand" value="<?php echo md5(mt_rand()); ?>">
                                    <input type="hidden" name="idcliente" id="idcliente" value="1673">

                                    <div class="form-group">
                                        <label class="label-unidade" for="unidade-equipamento"><i class="fa fa-asterisk"></i> Unit</label>
                                        <!--<input type="text" name="unidade-equipamento" id="unidade-equipamento" class="form-control" maxlength="100" title="Digite o nome da unidade" placeholder="Unidade/Setor" required>-->
                                        <select name="unidade-equipamento" id="unidade-equipamento" class="form-control" title="Enter the unit name" required>
                                            <option value="" selected>Select a Unit</option>
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
                                        <label class="label-sala" for="sala-equipamento">Room</label>
                                        <input type="text" name="sala-equipamento" id="sala-equipamento" class="form-control" maxlength="100" title="Enter the room where the equipment is located" placeholder="Room/Sector">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-nome" for="nome-equipamento"><i class="fa fa-asterisk"></i> Name</label>
                                        <input type="text" name="nome-equipamento" id="nome-equipamento" class="form-control" maxlength="255" title="Enter the equipment name" placeholder="Nome/Host" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-patrimonio" for="patrimonio-equipamento">Patrimony</label>
                                        <input type="text" name="patrimonio-equipamento" id="patrimonio-equipamento" class="form-control" maxlength="20" title="Enter the asset number equipment" placeholder="Patrimony">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-sistema" for="sistema-equipamento"><i class="fa fa-asterisk"></i>Operational system</label>
                                        <input type="text" name="sistema-equipamento" id="sistema-equipamento" class="form-control" maxlength="100" title="Enter the operating system of the equipment" placeholder="Sistem" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-serial" for="serial-equipamento">License key</label>
                                        <input type="text" name="serial-equipamento" id="serial-equipamento" class="form-control" maxlength="29" title="Enter the equipment license key" placeholder="key">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-placamae" for="placamae-equipamento"><i class="fa fa-asterisk"></i> Motherboard</label>
                                        <input type="text" name="placamae-equipamento" id="placamae-equipamento" class="form-control" maxlength="100" title="Enter the make and model of the motherboard and the equipment" placeholder="Motherboard" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-cpu" for="cpu-equipamento"><i class="fa fa-asterisk"></i> CPU</label>
                                        <input type="text" name="cpu-equipamento" id="cpu-equipamento" class="form-control" maxlength="100" title="Enter the make and model of the equipment processor" placeholder="Processor" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-memoria" for="memoria-equipamento"><i class="fa fa-asterisk"></i> Memory</label>
                                        <input type="text" name="memoria-equipamento" id="memoria-equipamento" class="form-control" maxlength="100" title="Enter the capacity and generation of installed memory" placeholder="Memory" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-disco" for="disco-equipamento"><i class="fa fa-asterisk"></i> Storage</label>
                                        <input type="text" name="disco-equipamento" id="disco-equipamento" class="form-control" maxlength="100" title="Enter the capacity and model of the installed HD / SSD" placeholder="Storage" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-lan_1" for="lan_1-equipamento"><i class="fa fa-asterisk"></i> LAN 1</label>
                                        <input type="text" name="lan_1-equipamento" id="lan_1-equipamento" class="form-control" maxlength="17" title="Enter the machine's LAN 1 MAC" placeholder="LAN 1">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-lan_2" for="lan_2-equipamento">LAN 2</label>
                                        <input type="text" name="lan_2-equipamento" id="lan_2-equipamento" class="form-control" maxlength="17" title="Enter the machine's LAN 2 MAC" placeholder="LAN 2">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-wlan" for="wlan-equipamento">WLAN</label>
                                        <input type="text" name="wlan-equipamento" id="wlan-equipamento" class="form-control" maxlength="17" title="Enter the machine's WLAN MAC" placeholder="WLAN">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left closed" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-novo-equipamento">Save</button>
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

        <script src="../js/jquery-2.1.4.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/autocomplete.min.js"></script>
        <script src="../js/smoke.min.js"></script>
        <script src="../js/datepicker.min.js"></script>
        <script src="../js/masked.min.js"></script>
        <script src="../js/inputmask.bundle.min.js"></script>
        <script src="../js/icheck.min.js"></script>
        <!--<script src="../js/datatables.min.js"></script>
        <script src="../js/datatables.bootstrap.min.js"></script>-->
        <script src="../js/jquery.dataTables.min.EN.js"></script>
        <script src="../js/dataTables.bootstrap.min.js"></script>
        <script src="../js/dataTables.responsive.min.js"></script>
        <script src="../js/dataTables.responsive.bootstrap.min.js"></script>
        <script src="../js/core.min.EN.js"></script>
    </body>
</html>
<?php unset($cfg,$rnd,$rnd2,$serial,$m); ?>