<?php
//	$wsdl="http://localhost/SAED/lib/cache/server.wsdl";
//	$soap= new SoapClient($wsdl,array("trace" => 1, "exception" => 0));
//	$response = $soap->controlla_login("r","r");
//	echo $response;
require_once('lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;

if($_POST){
    controllaLogin();
}
function controllaLogin(){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $wsdl="http://localhost/SAED/lib/cache/server.wsdl";
	$soap= new SoapClient($wsdl);
	global $risposta;
    $risposta = $soap->controlla_login($email,$password);
    if($risposta == "Login verificato!"){
    }
}

?>

<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/index.css">
		<title>Login</title>
	</head>
	<body>
        <div class="container logo">
            <img src="logo.jpg"/>
        </div>
		<div class="container form">
            <form role="form" method="post" action="#">
                <div class="form-group" >
                    <label for="email">Email:</label>
                    <input name ="email" type="email" class="form-control" id="email" required>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="password"type="password" class="form-control" id="pwd" required>
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
		</div>
        <div class="cointainer risLogin" >
            <?php
                if($_POST){
                    echo $risposta;
                }
            ?>
        </div>
	</body>
</html>