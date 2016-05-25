<?php

/**
 * 
 * @service servizio
 */
class servizio
{
    /**
     * controlla_login
     *
     * @param string $email
     * @param string $password
     * @return Array Response string
     */
    public function controlla_login($email, $password)
    {
        include_once("../home/php/connessione.php");
        $sql = "SELECT * FROM Utente WHERE email ='$email' AND password='$password'";
        $check = mysqli_fetch_array(mysqli_query($con, $sql));
        if(isset($check)) {
            $stato = array("Login verificato!",$check["email"],$check["superuser"]);
        } else {
            $stato = array("Email o password errati!","","");
        }

        mysqli_close($con);
        return $stato;
    }
    /**
     * info_utente
     *
     * @param string $email
     * @return Array Response string
     */
    public function info_utente($email)
    {
        include_once("../home/php/connessione.php");
        $sql = "SELECT * FROM Utente WHERE email ='$email'";
        $check = mysqli_fetch_array(mysqli_query($con, $sql));
        $info = array($check["email"],$check["nome"],$check["cognome"],$check["indirizzo"],$check["citta"],$check["cap"],$check["superuser"]);

        mysqli_close($con);
        return $info;
    }
    /**
     * aggiungi_piatto
     *
     * @param string $email
     * @param string $descrizione
     * @param string $prezzo
     * @param string $immagine
     * @return string Response string
     */
    public function aggiungi_piatto($nome,$descrizione,$prezzo,$immagine)
    {
        include_once("../home/php/connessione.php");
        $sql = "INSERT INTO Prodotto (nome, descrizione, immagine,prezzo)VALUES ('$nome', '$descrizione','$immagine' ,'$prezzo')";
        $res = mysqli_query($con,$sql);
        mysqli_close($con);
        return $res;
    }
    /**
     * visualizza_piatti
     *
     * @return string Response string
     */
    public function visualizza_piatti()
    {
        include_once("../home/php/connessione.php");
        $sql = "SELECT * FROM Prodotto";

        if (mysqli_query($con, $sql)) {
            $info = "Prodotto aggiunto correttamente";
        } else {
            $info =  "Errore: " . $sql . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
        return $info;
    }

}

require_once('class.phpwsdl.php');
$soap = PhpWsdl::CreateInstance(
                null, // Set this to your namespace or let PhpWsdl find one
                null, // Set this to your SOAP endpoint or let PhpWsdl determine it
                null, // Set this to a writeable folder to enable caching
                null, // Set this to the filename or an array of filenames of your 
                null, // webservice handler class(es) (be sure to add the file that 
                // contains the handler class as first class definition at 
                // first)
                null, // Set this to the webservice handler class name or let 
                // PhpWsdl determine it
                null, // If you want to define some methods from code, give an array 
                // of PhpWsdlMethod here
                null, // If you want to define some types from code, give an array of 
                // PhpWsdlComplex here
                false, // Set this to TRUE to output WSDL on request and exit after 
                // WSDL has been sent
                false   // Set this to TRUE to run the SOAP server and exit
);
PhpWsdl::$CacheTime=0;
ini_set("soap.wsdl_cache_enabled", "0");
    //PhpWsdl::RunQuickMode ( );
    $wsdl = $soap->CreateWsdl();
    $wsdl = $soap->GetCacheFileName();
    rename($wsdl, "cache/server.wsdl");
    $server = new SoapServer("http://localhost/SAED/lib/cache/server.wsdl");
    $server->setClass("servizio");
    $server->handle();
?>