<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="script/riepilogo.js"></script>
</head>
<body>
<form id="riepilogoForm">
<table id="tabellaRiepilogo" class="table table-striped">
    <thead>
    <tr>
        <th>Immagine</th>
        <th>Nome</th>
        <th>Descrizione</th>
        <th>Prezzo</th>
        <th>Quantit&agrave;</th>
        <th>Seleziona</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once('../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="http://localhost/SAED/lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->visualizza_piatti();

    foreach ($risposta as $row) {
        ?>
        <tr>
            <td><img width="200" height="200" class="img-responsive" src="<?php echo "immagini_prodotti/".$row['immagine']; ?>"></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['descrizione']; ?></td>
            <td><?php echo $row['prezzo']."€"; ?></td>
            <td><input type="number" name="quantita" ></td>
            <td><input type="checkbox" name="seleziona" value="selezionato"></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>
    <button type="submit" >Riepilogo</button>
</form>
</body>
</html>
