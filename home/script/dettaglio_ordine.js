
$( document ).ready(function() {
    $("#tabella_ordini tr").click(function(){
        var idOrdine = $(this).find("td:nth-child(1)").text();
        $.ajax({
            url: "php/dettaglio.php?" + idOrdine, // Url to which the request is send
            type: "GET",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                console.log(data.toString());
            }
        });
        
    });
});