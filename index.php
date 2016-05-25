<?php
require_once('lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;
if(isset($_SESSION["email"])) {
    header('location: home/index.php');
}
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
    if($risposta[0] == "Login verificato!"){
        session_start();
        $_SESSION['email'] = $risposta[1];
        $_SESSION['superuser'] = $risposta[2];
        header('location: home/index.php');
    }
}

?>

<html>
	<head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="index.css">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img src="logo.jpg" />
                    <form role="form" method="post" action="">
                        <div class="form-group" >
                            <label for="email">Email:</label>
                            <input name ="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input name="password"type="password" class="form-control" id="pwd" required>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                    <div class="risLogin" >
                        <?php
                        if($_POST){
                            echo $risposta[0];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
		</div>

	</body>
</html>