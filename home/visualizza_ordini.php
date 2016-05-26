<script src="script/riepilogo.js"></script>
<script src="script/dettaglio_ordine.js"></script>
<table class="table table-striped" id="tabella_ordini">
    <thead>
    <tr>
        <th>Numero Ordine</th>
        <th>Cliente</th>
        <th>Data</th>
        <th>Totale</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once('../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="http://localhost/SAED/lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->visualizza_ordini();
    foreach ($risposta as $row) {
        ?>
        <tr>
            <td><?php echo $row['idOrdine']; ?></td>
            <td><?php echo $row['Utente']; ?></td>
            <td><?php echo $row['data']; ?> </td>
            <td><?php echo $row['totale']."€"; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div id="modalRiepilogoOrdine" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Riepilogo Ordine</h4>
            </div>
            <div class="modal-body">
                <table id="tabellaRiepilogo" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantit&agrave;</th>
                        <th>Prezzo</th>
                    </tr>
                    </thead>
                    <tbody id="bodyTabellaRiepilogo">

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"><strong>Totale</strong></td>
                        <td id="totaleRiepilogo"><strong></strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-lg">Chiudi</button>
            </div>
        </div>

    </div>
</div>