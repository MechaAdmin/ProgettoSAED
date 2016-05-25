$( document ).ready(function() {
    $("#alert").hide();
    var riepilogoArray = [];
    $("#btnRiepilogo").click(function(e){
        e.preventDefault();

        var num = 0;
        var spesaTotale = 0;
        $("#tabellaProdotti tr").each(function(){
            var nomeP = $(this).find("td:nth-child(2)").text();
            var prezzoP = $(this).find("td:nth-child(4)").text();
            var quantitaP = $(this).find("td:nth-child(5)").children('input').val();
            if(quantitaP > 0){
                num++;
                spesaTotale = spesaTotale + parseFloat(quantitaP)*parseFloat(prezzoP);
                var prodotto = {nome: nomeP, prezzo: prezzoP, quantita: quantitaP};
                riepilogoArray.push(prodotto);
            }
        });
        if(num > 0){
            $("#modalRiepilogo").modal("show");
            for(var i = 0;i< riepilogoArray.length;i++){
                $("#bodyTabellaRiepilogo").append("<tr>"+"<td>"+ riepilogoArray[i]["nome"] +"</td>"+"<td>"+ riepilogoArray[i]["quantita"] +"</td>"+"<td>"+ riepilogoArray[i]["prezzo"] +"</td>"+"</tr>" );
            }
            $("#totaleRiepilogo").children().html(spesaTotale +"€");

        }else{
            $("#alert").show().delay(3000).fadeOut();
        }

    });
});
