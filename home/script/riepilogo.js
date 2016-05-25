$( document ).ready(function() {
    $("#riepilogoForm").on('submit',(function(e) {
        e.preventDefault();
        var riepilogoArray = [];
        $("#tabellaRiepilogo tr").each(function(){
            var nomeP = $(this).find("td:nth-child(2)").text();
            var prezzoP = $(this).find("td:nth-child(4)").text();
            var quantitaP = $(this).find("td:nth-child(5)").text();
            if ($(this).find("td:nth-child(6)").checked()) {
                var prodotto = {nome: nomeP, prezzo: prezzoP, quantita: quantitaP};
                riepilogoArray.push(prodotto);
            }
        });
        $(".contenitore").load( "riepilogo.php" );


    }));
});
