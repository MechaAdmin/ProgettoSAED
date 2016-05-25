<?php
require_once('../../lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;
$wsdl="http://localhost/SAED/lib/cache/server.wsdl";
$soap= new SoapClient($wsdl);
$idOrdine = $_GET["idOrdine"];
$risposta = $soap->visualizza_ordine_dettaglio($idOrdine);
return $risposta;
?>