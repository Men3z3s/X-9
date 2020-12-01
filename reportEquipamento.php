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
        <link rel="icon" type="image/png" href="img/favicon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/skin-blue.min.css">
        <link rel="stylesheet" href="css/core.min.css">
        <style media="print">
            * {
                overflow: visible !important;
            }
            
            body {
                font-size: 0.9em;
            }

            h2.page-header {
                font-size: 1.8em;
                vertical-align: middle;
            }

            .logo img {
                width: 100px !important;
            }
        </style>
        <!--[if lt IE 9]><script src="js/html5shiv.min.js"></script><script src="js/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <section class="invoice">
                <div class="row print-head">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <span>Relat&oacute;rio dos equipamentos</span>
                            <!--<span class="logo"><img src="img/logo.png" title="Embracore, Ltda." alt="Embracore, Ltda." style="height: 80px;"></span>-->
                            <div class="pull-right text-right">
                                <small><i class="fa fa-globe"></i> Secretaria da Sa&uacute;de de Cambori&uacute;</small>
                            </div>
                        </h2>
                    </div>
                </div>
                <?php
                    include_once('conexao.php');

                    try {
                        $mostra = 'T';
                        $sql = $pdo->prepare("SELECT idequipamento,cliente_idcliente AS idcliente,unidade,sala,nome,patrimonio,sistema,serial,placamae,cpu,memoria,disco,lan_1,lan_2,wlan FROM equipamento WHERE mostra = :mostra ORDER BY unidade,sala,nome,patrimonio,sistema");
                        $sql->bindParam(':mostra', $mostra, PDO::PARAM_STR);
                        $sql->execute();
                        $ret = $sql->rowCount();

                            if($ret > 0) {
                                $pyidequipamento = md5('idequipamento');

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

                                        if(!empty($lin->lan_2)) {
                                            $lan_2 = '<p><strong>LAN 2:</strong> '.$lin->lan_2.'</p>';
                                        } else {
                                            $lan_2 = '';
                                        }

                                        if(!empty($lin->wlan)) {
                                            $wlan = '<p><strong>WLAN:</strong> '.$lin->wlan.'</p>';
                                        } else {
                                            $wlan = '';
                                        }

                                        echo'
                                        <div class="row invoice-info">
                                            <div class="col-xs-4">
                                                <p><strong>Unidade:</strong> '.$lin->unidade.'</p>
                                                <p><strong>Sala:</strong> '.$lin->sala.'</p>
                                                <p><strong>Nome:</strong> '.$lin->nome.'</p>
                                                <p><strong>Patrim&ocirc;nio:</strong> '.$lin->patrimonio.'</p>
                                                
                                            </div>
                                            <div class="col-xs-4">
                                                <p><strong>Sistema:</strong> '.$lin->sistema.'</p>
                                                <p><strong>Serial:</strong> '.$lin->serial.'</p>
                                                <p><strong>Placa m&atilde;e:</strong> '.$lin->placamae.'</p>
                                                <p><strong>CPU:</strong> '.$lin->cpu.'</p>
                                            </div>
                                            <div class="col-xs-4">
                                                <p><strong>Mem&oacute;ria:</strong> '.$lin->memoria.'</p>
                                                <p><strong>Disco:</strong> '.$lin->disco.'</p>
                                                <p><strong>LAN 1:</strong> '.$lin->lan_1.'</p>
                                                '.$lan_2.'
                                                '.$wlan.'
                                            </div>
                                        </div>
                                        <hr>';
                                    }

                                unset($lin,$pyidequipamento,$lan_2,$wlan);
                            }
                            else {
                                echo'
                                <div class="callout">
                                    <h4>Nada encontrado</h4>
                                    <p>Nenhum registro foi encontrado.</p>
                                </div>';
                            }

                        unset($sql,$mostra);
                    }
                    catch(PDOException $e) {
                        echo 'Erro ao conectar o servidor '.$e->getMessage();
                    }
                ?>
            </section>
        </div>

        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/core.min.js"></script>
        <script>
            $(function() {
                /* PRINT */

                <?php if(!empty($ret)) { ?>
                    $(window).load(function () {
                        window.onafterprint = function(e){
                            $(window).off('mousemove', window.onafterprint);
                            location.href = 'equipamento.php';
                        };

                        window.print();

                        setTimeout(function(){
                            $(window).on('mousemove', window.onafterprint);
                        }, 1);

                        /* Esse método é o correto, mas no Chrome não funciona.
                        print();

                        var beforePrint = function() {
                            console.log('Antes de imprimir...');
                        };

                        var afterPrint = function() {
                            console.log('Depois de imprimir...');
                            location.href = 'inicio.php';
                        };

                        if (window.matchMedia) {
                            var mediaQueryList = window.matchMedia('print');
                            mediaQueryList.addListener(function(mql) {
                                if (mql.matches) {
                                    beforePrint();
                                } else {
                                    afterPrint();
                                }
                            });
                        }

                        window.onbeforeprint = beforePrint;
                        window.onafterprint = afterPrint;*/
                    });
                <?php } ?>
            });
        </script>
    </body>
</html>
<?php unset($cfg,$ret,$m); ?>