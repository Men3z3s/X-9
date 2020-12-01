<?php
    try {
        include_once('conexao.php');

        /* TENTA ATUALIZAR NO BANCO */

        $py = md5('idequipamento');
        $mostra = 'T';
        $sql = $pdo->prepare("UPDATE equipamento SET mostra = :mostra WHERE idequipamento = :idequipamento");
        $sql->bindParam(':mostra', $mostra, PDO::PARAM_STR);
        $sql->bindParam(':idequipamento', $_GET[''.$py.''], PDO::PARAM_INT);
        $res = $sql->execute();

            if(!$res) {
                var_dump($sql->errorInfo());
                exit;
            }
            else {
                header('location:equipamento.php');
            }

        unset($pdo,$sql,$res,$py,$mostra);
    }
    catch(PDOException $e) {
        echo'Falha ao conectar o servidor '.$e->getMessage();
    }
?>