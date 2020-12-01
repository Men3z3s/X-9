<?php
    try {
        include_once('conexao.php');

        /* BUSCA DADOS DO EQUIPAMENTO */

        $py = md5('idequipamento');
        $sql = $pdo->prepare("SELECT idequipamento,cliente_idcliente AS idcliente,unidade,sala,nome,patrimonio,sistema,serial,placamae,cpu,memoria,disco,lan_1,lan_2,wlan FROM equipamento WHERE idequipamento = :idequipamento");
        $sql->bindParam(':idequipamento', $_GET[''.$py.''], PDO::PARAM_INT);
        $sql->execute();
        $ret = $sql->rowCount();

            if($ret > 0) {
                $lin = $sql->fetch(PDO::FETCH_OBJ);
?>
<form class="form-edita-equipamento">
    <div class="modal-header">
        <button type="button" class="close closed" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar os dados do equipamento <small>(<i class="fa fa-asterisk"></i> Campo obrigat&oacute;rio)</small></h4>
    </div>
    <div class="modal-body overing">
        <div class="col-md-6">
            <input type="hidden" name="rand" id="rand-" value="<?php echo md5(mt_rand()); ?>">
            <input type="hidden" name="idequipamento" id="idequipamento" value="<?php echo $lin->idequipamento; ?>">
            <input type="hidden" name="idcliente" id="idcliente-" value="1673">

            <div class="form-group">
                <label class="label-unidade" for="unidade-equipamento"><i class="fa fa-asterisk"></i> Unidade</label>
                <!--<input type="text" name="unidade-equipamento" id="unidade-equipamento" class="form-control" maxlength="100" title="Digite o nome da unidade" placeholder="Unidade/Setor" required>-->
                <select name="unidade-equipamento" id="unidade-equipamento-" class="form-control" title="Digite o nome da unidade" required>
                <?php
                    if($lin->unidade == 'Almoxarifado') { echo'<option value="Almoxarifado" selected>Almoxarifado</option>'; } else { echo'<option value="Almoxarifado">Almoxarifado</option>'; }
                    if($lin->unidade == 'CAPS') { echo'<option value="CAPS" selected>CAPS</option>'; } else { echo'<option value="CAPS">CAPS</option>'; }
                    if($lin->unidade == 'CEDIT') { echo'<option value="CEDIT" selected>CEDIT</option>'; } else { echo'<option value="CEDIT">CEDIT</option>'; }
                    if($lin->unidade == 'Farmacia MonteAlegre') { echo'<option value="Farmacia MonteAlegre" selected>Farm&aacute;cia Monte Alegre</option>'; } else { echo'<option value="Farmacia MonteAlegre">Farm&aacute;cia Monte Alegre</option>'; }
                    if($lin->unidade == 'Garagem') { echo'<option value="Garagem" selected>Garagem</option>'; } else { echo'<option value="Garagem">Garagem</option>'; }
                    if($lin->unidade == 'Hospital') { echo'<option value="Hospital" selected>Hospital</option>'; } else { echo'<option value="Hospital">Hospital</option>'; }
                    if($lin->unidade == 'Manutencao') { echo'<option value="Manutencao" selected>Manuten&ccedil;&atilde;o</option>'; } else { echo'<option value="Manutencao">Manuten&ccedil;&atilde;o</option>'; }
                    if($lin->unidade == 'Policlinica') { echo'<option value="Policlinica" selected>Policl&iacute;nica</option>'; } else { echo'<option value="Policlinica">Policl&iacute;nica</option>'; }
                    if($lin->unidade == 'UBS Areias') { echo'<option value="UBS Areias" selected>UBS Areias</option>'; } else { echo'<option value="UBS Areias">UBS Areias</option>'; }
                    if($lin->unidade == 'UBS Caic') { echo'<option value="UBS Caic" selected>UBS Caic</option>'; } else { echo'<option value="UBS Caic">UBS Caic</option>'; }
                    if($lin->unidade == 'UBS Cedro') { echo'<option value="UBS Cedro" selected>UBS Cedro</option>'; } else { echo'<option value="UBS Cedro">UBS Cedro</option>'; }
                    if($lin->unidade == 'UBS Centro') { echo'<option value="UBS Centro" selected>UBS Centro</option>'; } else { echo'<option value="UBS Centro">UBS Centro</option>'; }
                    if($lin->unidade == 'UBS Conde') { echo'<option value="UBS Conde" selected>UBS Conde</option>'; } else { echo'<option value="UBS Conde">UBS Conde</option>'; }
                    if($lin->unidade == 'UBS JoaoMendes') { echo'<option value="UBS JoaoMendes" selected>UBS Jo&atilde;o Mendes</option>'; } else { echo'<option value="UBS JoaoMendes">UBS Jo&atilde;o Mendes</option>'; }
                    if($lin->unidade == 'UBS Macacos') { echo'<option value="UBS Macacos" selected>UBS Macacos</option>'; } else { echo'<option value="UBS Macacos">UBS Macacos</option>'; }
                    if($lin->unidade == 'UBS RioPequeno') { echo'<option value="UBS RioPequeno" selected>UBS Rio Pequeno</option>'; } else { echo'<option value="UBS RioPequeno">UBS Rio Pequeno</option>'; }
                    if($lin->unidade == 'UBS SantaRegina') { echo'<option value="UBS SantaRegina" selected>UBS Santa Regina</option>'; } else { echo'<option value="UBS SantaRegina">UBS Santa Regina</option>'; }
                    if($lin->unidade == 'UBS Taboleiro') { echo'<option value="UBS Taboleiro" selected>UBS Taboleiro</option>'; } else { echo'<option value="UBS Taboleiro">UBS Taboleiro</option>'; }
                    if($lin->unidade == 'UC Braco') { echo'<option value="UC Braco" selected>UC Bra&ccedil;o</option>'; } else { echo'<option value="UC Braco">UC Bra&ccedil;o</option>'; }
                    if($lin->unidade == 'UC Varzea') { echo'<option value="UC Varzea" selected>UC V&aacute;rzea</option>'; } else { echo'<option value="UC Varzea">UC V&aacute;rzea</option>'; }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label class="label-sala" for="sala-equipamento">Sala</label>
                <input type="text" name="sala-equipamento" id="sala-equipamento-" class="form-control" value="<?php echo $lin->sala; ?>" maxlength="100" title="Digite a sala onde o equipamento se encontra" placeholder="Sala/Setor">
            </div>
            <div class="form-group">
                <label class="label-nome" for="nome-equipamento"><i class="fa fa-asterisk"></i> Nome</label>
                <input type="text" name="nome-equipamento" id="nome-equipamento-" class="form-control" value="<?php echo $lin->nome; ?>" maxlength="255" title="Digite o nome do equipamento" placeholder="Nome/Host" required>
            </div>
            <div class="form-group">
                <label class="label-patrimonio" for="patrimonio-equipamento">Patrim&ocirc;nio</label>
                <input type="text" name="patrimonio-equipamento" id="patrimonio-equipamento-" class="form-control" value="<?php echo $lin->patrimonio; ?>" maxlength="20" title="Digite o patrim&ocirc;nio do equipamento" placeholder="Patrim&ocirc;nio">
            </div>
            <div class="form-group">
                <label class="label-sistema" for="sistema-equipamento"><i class="fa fa-asterisk"></i> Sistema</label>
                <input type="text" name="sistema-equipamento" id="sistema-equipamento-" class="form-control" value="<?php echo $lin->sistema; ?>" maxlength="100" title="Digite o sistema do equipamento" placeholder="Sistema" required>
            </div>
            <div class="form-group">
                <label class="label-serial" for="serial-equipamento">Serial</label>
                <input type="text" name="serial-equipamento" id="serial-equipamento-" class="form-control" value="<?php echo $lin->serial; ?>" maxlength="29" title="Digite o serial do equipamento" placeholder="Serial">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="label-placamae" for="placamae-equipamento"><i class="fa fa-asterisk"></i> Placa m&atilde;e</label>
                <input type="text" name="placamae-equipamento" id="placamae-equipamento-" class="form-control" value="<?php echo $lin->placamae; ?>" maxlength="100" title="Digite a marca e modelo da placa m&atilde;e do equipamento" placeholder="Placa m&atilde;e" required>
            </div>
            <div class="form-group">
                <label class="label-cpu" for="cpu-equipamento"><i class="fa fa-asterisk"></i> CPU</label>
                <input type="text" name="cpu-equipamento" id="cpu-equipamento-" class="form-control" value="<?php echo $lin->cpu; ?>" maxlength="100" title="Digite a marca e modelo do processador do equipamento" placeholder="Processador" required>
            </div>
            <div class="form-group">
                <label class="label-memoria" for="memoria-equipamento"><i class="fa fa-asterisk"></i> Mem&oacute;ria</label>
                <input type="text" name="memoria-equipamento" id="memoria-equipamento-" class="form-control" value="<?php echo $lin->memoria; ?>" maxlength="100" title="Digite a marca e o modelo da mem&oacute;ria do equipamento" placeholder="Mem&oacute;ria" required>
            </div>
            <div class="form-group">
                <label class="label-disco" for="disco-equipamento"><i class="fa fa-asterisk"></i> Disco</label>
                <input type="text" name="disco-equipamento" id="disco-equipamento" class="form-control" value="<?php echo $lin->disco; ?>" maxlength="100" title="Digite a marca e modelo do HD/SSD do equipamento" placeholder="Disco" required>
            </div>
            <div class="form-group">
                <label class="label-lan_1" for="lan_1-equipamento"><i class="fa fa-asterisk"></i> LAN 1</label>
                <input type="text" name="lan_1-equipamento" id="lan_1-equipamento-" class="form-control" value="<?php echo $lin->lan_1; ?>" maxlength="17" title="Digite o MAC da LAN 1 do equipamento" placeholder="LAN 1">
            </div>
            <div class="form-group">
                <label class="label-lan_2" for="lan_2-equipamento">LAN 2</label>
                <input type="text" name="lan_2-equipamento" id="lan_2-equipamento-" class="form-control" value="<?php echo $lin->lan_2; ?>" maxlength="17" title="Digite o MAC da LAN 2 do equipamento" placeholder="LAN 2">
            </div>
            <div class="form-group">
                <label class="label-wlan" for="wlan-equipamento">WLAN</label>
                <input type="text" name="wlan-equipamento" id="wlan-equipamento-" class="form-control" value="<?php echo $lin->wlan; ?>" maxlength="17" title="Digite o MAC da WLAN do equipamento" placeholder="WLAN">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left closed" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary btn-flat btn-submit-edit-equipamento">Salvar</button>
    </div>
</form>
<script src="js/apart.min.js"></script>
<?php
                unset($lin);
            } //if($ret > 0)
            else {
                echo'
                <div class="callout">
                    <h4>Par&acirc;mentro incorreto</h4>
                </div>';
            }

        unset($pdo,$sql,$ret,$py);
    }
    catch(PDOException $e) {
        echo'Falha ao conectar o servidor '.$e->getMessage();
    }
?>