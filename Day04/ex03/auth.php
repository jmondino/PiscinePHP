<?php

function auth($login, $passwd)
{
	$file = file_get_contents("../private/passwd");
	$accounts = unserialize($file);
	$hashed = hash("whirlpool", $passwd);
	foreach ($accounts as $key => $value)
	{
		if ($login == $value['login'] && $hashed == $value['passwd'])
			return true;
	}
	return false;
}

?>
