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
     * @return string Response string
     */
    public function controlla_login($email, $password)
    {
        include_once("../php/connessione.php");
        //$con = mysqli_connect("localhost", "root", "", "Saed");
        $sql = "SELECT * FROM Utente WHERE email ='$email' AND password='$password'";
        $check = mysqli_fetch_array(mysqli_query($con, $sql));
        if (isset($check)) {
            $stato = "Login verificato!";
        } else {
            $stato = 'Email o password errati!';
        }

        mysqli_close($con);
        return $stato;
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