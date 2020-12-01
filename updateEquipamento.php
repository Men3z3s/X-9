<?php
    /* CONTROLE DE VARIAVEL */

    $msg = "Campo obrigat&oacute;rio vazio.";

        if(empty($_POST['rand'])) {die("Vari&aacute;vel de controle nula."); }
        if(empty($_POST['idequipamento'])) {die("Vari&aacute;vel de controle nula."); }
        if(empty($_POST['idcliente'])) {die("Vari&aacute;vel de controle nula."); }
        if(empty($_POST['unidade-equipamento'])) { die($msg); } else {
            $filtro = 1;
        }
        if(!empty($_POST['sala-equipamento'])) {
            $_POST['sala-equipamento'] = str_replace("'","&#39;",$_POST['sala-equipamento']);
            $_POST['sala-equipamento'] = str_replace('"','&#34;',$_POST['sala-equipamento']);
            $_POST['sala-equipamento'] = str_replace('%','&#37;',$_POST['sala-equipamento']);
        }
        if(empty($_POST['nome-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['nome-equipamento'] = str_replace("'","&#39;",$_POST['nome-equipamento']);
            $_POST['nome-equipamento'] = str_replace('"','&#34;',$_POST['nome-equipamento']);
            $_POST['nome-equipamento'] = str_replace('%','&#37;',$_POST['nome-equipamento']);
        }
        if(!empty($_POST['patrimonio-equipamento'])) {
            $_POST['patrimonio-equipamento'] = str_replace("'","&#39;",$_POST['patrimonio-equipamento']);
            $_POST['patrimonio-equipamento'] = str_replace('"','&#34;',$_POST['patrimonio-equipamento']);
            $_POST['patrimonio-equipamento'] = str_replace('%','&#37;',$_POST['patrimonio-equipamento']);
        }
        if(empty($_POST['sistema-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['sistema-equipamento'] = str_replace("'","&#39;",$_POST['sistema-equipamento']);
            $_POST['sistema-equipamento'] = str_replace('"','&#34;',$_POST['sistema-equipamento']);
            $_POST['sistema-equipamento'] = str_replace('%','&#37;',$_POST['sistema-equipamento']);
        }
        if(!empty($_POST['serial-equipamento'])) {
            $_POST['serial-equipamento'] = str_replace("'","&#39;",$_POST['serial-equipamento']);
            $_POST['serial-equipamento'] = str_replace('"','&#34;',$_POST['serial-equipamento']);
            $_POST['serial-equipamento'] = str_replace('%','&#37;',$_POST['serial-equipamento']);
            $_POST['serial-equipamento'] = strtoupper($_POST['serial-equipamento']);
        }
        if(empty($_POST['placamae-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['placamae-equipamento'] = str_replace("'","&#39;",$_POST['placamae-equipamento']);
            $_POST['placamae-equipamento'] = str_replace('"','&#34;',$_POST['placamae-equipamento']);
            $_POST['placamae-equipamento'] = str_replace('%','&#37;',$_POST['placamae-equipamento']);
        }
        if(empty($_POST['cpu-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['cpu-equipamento'] = str_replace("'","&#39;",$_POST['cpu-equipamento']);
            $_POST['cpu-equipamento'] = str_replace('"','&#34;',$_POST['cpu-equipamento']);
            $_POST['cpu-equipamento'] = str_replace('%','&#37;',$_POST['cpu-equipamento']);
        }
        if(empty($_POST['memoria-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['memoria-equipamento'] = str_replace("'","&#39;",$_POST['memoria-equipamento']);
            $_POST['memoria-equipamento'] = str_replace('"','&#34;',$_POST['memoria-equipamento']);
            $_POST['memoria-equipamento'] = str_replace('%','&#37;',$_POST['memoria-equipamento']);
        }
        if(empty($_POST['disco-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['disco-equipamento'] = str_replace("'","&#39;",$_POST['disco-equipamento']);
            $_POST['disco-equipamento'] = str_replace('"','&#34;',$_POST['disco-equipamento']);
            $_POST['disco-equipamento'] = str_replace('%','&#37;',$_POST['disco-equipamento']);
        }
        if(empty($_POST['lan_1-equipamento'])) { die($msg); } else {
            $filtro++;

            $_POST['lan_1-equipamento'] = str_replace("'","&#39;",$_POST['lan_1-equipamento']);
            $_POST['lan_1-equipamento'] = str_replace('"','&#34;',$_POST['lan_1-equipamento']);
            $_POST['lan_1-equipamento'] = str_replace('%','&#37;',$_POST['lan_1-equipamento']);
        }
        if(!empty($_POST['lan_2-equipamento'])) {
            $_POST['lan_2-equipamento'] = str_replace("'","&#39;",$_POST['lan_2-equipamento']);
            $_POST['lan_2-equipamento'] = str_replace('"','&#34;',$_POST['lan_2-equipamento']);
            $_POST['lan_2-equipamento'] = str_replace('%','&#37;',$_POST['lan_2-equipamento']);
        }
        if(!empty($_POST['wlan-equipamento'])) {
            $_POST['wlan-equipamento'] = str_replace("'","&#39;",$_POST['wlan-equipamento']);
            $_POST['wlan-equipamento'] = str_replace('"','&#34;',$_POST['wlan-equipamento']);
            $_POST['wlan-equipamento'] = str_replace('%','&#37;',$_POST['wlan-equipamento']);
        }

        if($filtro == 8) {
            try {
                include_once('conexao.php');

                /* CONTROLE DE DUPLICATAS */

                $sql = $pdo->prepare("SELECT idequipamento,mostra FROM equipamento WHERE lan_1 = :lan_1 AND idequipamento <> :idequipamento");
                $sql->bindParam(':lan_1', $_POST['lan_1-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':idequipamento', $_POST['idequipamento'], PDO::PARAM_INT);
                $sql->execute();
                $ret = $sql->rowCount();

                    if($ret > 0) {
                        #die('Esse equipamento j&aacute; est&aacute; cadastrado.');
                        $lin = $sql->fetch(PDO::FETCH_OBJ);
                        $py = md5('idequipamento');
                        
                            if($lin->mostra == 'T') {
                                die('Esse equipamento j&aacute; est&aacute; cadastrado.');    
                            }
                            
                            if($lin->mostra == 'F') {
                                die('Esse equipamento j&aacute; est&aacute; cadastrado, mas est&aacute; desativado. <a href="activateEquipamento.php?'.$py.'='.$lin->idequipamento.'" title="Ativar o cadastro do equipamento">Clique para ativar.</a>');    
                            }
                    }

                unset($sql,$ret,$lin);

                /* TENTA ATUALIZAR NO BANCO */

                $sql = $pdo->prepare("UPDATE equipamento SET unidade = :unidade,sala = :sala,nome = :nome,patrimonio = :patrimonio,sistema = :sistema,serial = :serial,placamae = :placamae,cpu = :cpu,memoria = :memoria,disco = :disco,lan_1 = :lan_1,lan_2 = :lan_2,wlan = :wlan WHERE idequipamento = :idequipamento");
                $sql->bindParam(':unidade', $_POST['unidade-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':sala', $_POST['sala-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':nome', $_POST['nome-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':patrimonio', $_POST['patrimonio-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':sistema', $_POST['sistema-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':serial', $_POST['serial-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':placamae', $_POST['placamae-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':cpu', $_POST['cpu-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':memoria', $_POST['memoria-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':disco', $_POST['disco-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':lan_1', $_POST['lan_1-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':lan_2', $_POST['lan_2-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':wlan', $_POST['wlan-equipamento'], PDO::PARAM_STR);
                $sql->bindParam(':idequipamento', $_POST['idequipamento'], PDO::PARAM_INT);
                $res = $sql->execute();

                    if(!$res) {
                        var_dump($sql->errorInfo());
                        exit;
                    }
                    else {
                        echo'true';
                    }

                unset($pdo,$sql,$res,$mostra);
            }
            catch(PDOException $e) {
                echo'Falha ao conectar o servidor '.$e->getMessage();
            }
        } //if filtro

    unset($msg,$filtro);
?>