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
        <h4 class="modal-title">Edit equipment data <small>(<i class="fa fa-asterisk"></i> Required field)</small></h4>
    </div>
    <div class="modal-body overing">
        <div class="col-md-6">
            <input type="hidden" name="rand" id="rand-" value="<?php echo md5(mt_rand()); ?>">
            <input type="hidden" name="idequipamento" id="idequipamento" value="<?php echo $lin->idequipamento; ?>">
            <input type="hidden" name="idcliente" id="idcliente-" value="1673">

            <div class="form-group">
                <label class="label-unidade" for="unidade-equipamento"><i class="fa fa-asterisk"></i> Unit</label>
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
        <button type="submit" class="btn btn-primary btn-flat btn-submit-edit-equipamento">Save</button>
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
        echo'Failed to connect the server '.$e->getMessage();
    }
?>