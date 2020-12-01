<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Form
    <form class="sidebar-form" method="get" action="#">
        <div class="input-group">
            <input type="search" id="criterio" class="form-control" title="Procurar ocorr&ecirc;ncia" placeholder="Busca">
            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form> /.sidebar-form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
    <?php
        switch($m) {
            case 1:
                echo'
                <li class="active"><a class="load-toggle" href="inicioSecretaria.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li><a class="load-toggle" href="equipamentoSecretaria.php" title="Clique para gerenciar os equipamentos"><i class="fa fa-desktop"></i> <span>Equipamento</span></a></li>
                <!--<li><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <li><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
            case 2:
                echo'
                <li><a class="load-toggle" href="inicioSecretaria.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li class="active"><a class="load-toggle" href="equipamentoSecretaria.php" title="Clique para gerenciar os equipamentos"><i class="fa fa-desktop"></i> <span>Equipamento</span></a></li>
                <!--<li><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li class="active"><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <li><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
            case 3:
                echo'
                <li><a class="load-toggle" href="inicio.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li class="active"><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <!--<li><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
            case 4:
                echo'
                <li><a class="load-toggle" href="inicio.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <!--<li class="active"><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
            case 5:
                echo'
                <li><a class="load-toggle" href="inicio.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li class="active"><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <!--<li><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
            default:
                echo'
                <li><a class="load-toggle" href="inicio.php" title="Clique para gerenciar as ocorr&ecirc;ncias"><i class="fa fa-file-text"></i> <span>In&iacute;cio</span></a></li>
                <li><a class="load-toggle" href="equipamento.php" title="Clique para gerenciar os equipamentos"><i class="fa fa-desktop"></i> <span>Equipamento</span></a></li>
                <!--<li><a class="load-toggle" href="cliente.php" title="Clique para gerenciar os clientes"><i class="fa fa-user"></i> <span>Cliente</span></a></li>
                <li><a class="load-toggle" href="tecnico.php" title="Clique para gerenciar os t&eacute;cnicos"><i class="fa fa-user-md"></i> <span>T&eacute;cnico</span></a></li>
                <li><a class="load-toggle" href="recibo.php" title="Clique para gerenciar os recibos"><i class="fa fa-credit-card"></i> <span>Recibo</span></a></li>
                <li><a class="load-toggle" href="curriculo" title="Clique para gerenciar os curr&iacute;culos"><i class="fa fa-institution"></i> <span>Curr&iacute;culo</span></a></li>-->';
            break;
        }
    ?>
    </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->