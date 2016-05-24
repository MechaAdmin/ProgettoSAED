<?php
    
?>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="script/aggiungi_piatti.js"></script>

</head>
<body>
    <form role="form" method="post" id="form_aggiungi_piatti" action="">
        <div class="form-group" >
            <label for="nome">Nome Piatto:</label>
            <input name ="nome" type="text" class="form-control" id="nome" required>
        </div>
        <div class="form-group">
            <label for="descrizione">Descrizione:</label>
            <input name="descrizione"type="text" class="form-control" id="descrizione" required>
        </div>
        <div class="form-group">
            <label for="prezzo">Prezzo:</label>
            <input name="prezzo" type="number" class="form-control" id="prezzo" required>
        </div>
        <div class="form-group">
            <label for="immagine">Immagine:</label>
            <input type="file" name="immagine" id="immagine"  required/>
        </div>

        <button type="submit" class="btn btn-default">Aggiungi</button>
    </form>
    <div class="ris" style="margin-top: 10px">

    </div>
</body>
</html>
