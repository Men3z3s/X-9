<?php
    session_start();

    /* CONTROLE DE VARIAVEL */

    $msg = "Mandatory field empty.";

        if(empty($_POST['rand'])) { die("Vari&aacute;vel de controle nula."); }
        if(empty($_POST['usuario'])) { die($msg); } else { $filtro = 1; }
        if(empty($_POST['senha'])) { die($msg); } else { $filtro++; }

        if($filtro == 2) {
            try {
                include_once('conexao.php');

                /* VALIDANDO O LOGIN */

                $sql = $pdo->prepare("SELECT idlogin,usuario,senha FROM login WHERE usuario = :usuario AND senha = :senha");
                $sql->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
                $sql->bindParam(':senha', $_POST['senha'], PDO::PARAM_STR);
                $sql->execute();
                $ret = $sql->rowCount();

                    if($ret > 0) {
                        $lin = $sql->fetch(PDO::FETCH_OBJ);
                        $usuario = base64_decode($lin->usuario);
                        
                            switch($usuario) {
                                case 'saude':
                                    $_SESSION['id'] = $lin->idlogin;
                                    $_SESSION['key'] = $lin->usuario;
                                    echo'saude';
                                break;
                                case 'secretaria':
                                    $_SESSION['id'] = $lin->idlogin;
                                    $_SESSION['key'] = $lin->usuario;
                                    echo'secretaria';
                                break;
                            }

                        unset($lin);
                    }
                    else {
                        die('Invalid login.');
                    }

                unset($pdo,$sql,$ret);
            }
            catch(PDOException $e) {
                echo'Failed to connect the server '.$e->getMessage();
            }
        } //if filtro

    unset($msg,$filtro);
?>
