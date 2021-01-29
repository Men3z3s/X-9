<?php
    require_once('config.php');

    if(isset($_SESSION['key'])) {
        header('location:inicio');
    }
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $cfg['titulo']; ?></title>
        <link rel="icon" type="image/png" href="img/favicon.png">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/smoke.min.css">
        <link rel="stylesheet" href="../css/core.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
        <!--[if lt IE 9]><script src="../js/html5shiv.min.js"></script><script src="../js/respond.min.js"></script><![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <strong>X-9</strong>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign to use</p>
                <form class="form-login">
                    <div class="form-group has-feedback">
                        <input type="text" id="usuario" class="form-control" title="Insert your user" placeholder="User" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="senha" class="form-control" title="Insert your password" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 d-flex justify-content-between">
                            <div class="my-auto">
                                <a class="flag" href="/X-9/">
                                    <img class="flag-img" src="../img/br.png">
                                </a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-flat btn-submit-login">Enter</button>
                            </div>
                        </div><!-- /.col -->
                    </div>
                </form>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <script src="../js/jquery-2.1.4.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/smoke.min.js"></script>
        <script src="../js/apart.min.js"></script>
    </body>
</html>
