<?php
if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
{
	$imgdata = file_get_contents('../img/42.png');
	$imgdata = base64_encode($imgdata);
	echo"<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,$imgdata'>\n</body></html>";
}	
else
{
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('HTTP/1.0 401 Unauthorized');
	echo"<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
}
?>

