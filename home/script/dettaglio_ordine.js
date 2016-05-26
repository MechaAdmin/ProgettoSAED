
$( document ).ready(function() {
    $("#tabella_ordini tr").click(function(){
        var idOrdine = $(this).find("td:nth-child(1)").text();
        $.ajax({
            url: "php/dettaglio.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: {idOrdine: idOrdine}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            success: function(data)   // A function to be called if request succeeds
            {
                alert(data);
            }
        });
        
    });
});