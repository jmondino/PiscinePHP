<?php
function check_login($login)
{
	if (!file_exists("../private/passwd"))
		return true;
	$datas = file_get_contents("../private/passwd");
	$datas = unserialize($datas);
	foreach ($datas as $key => $value)
	{
		foreach($value as $key2 => $value2)
		{
			if ($value2 == $login)
				return false;
		}
	}
	return true;
}

if (!$_POST["passwd"] || !$_POST["login"] || $_POST["submit"] != "OK" || !check_login($_POST["login"]))
	echo"ERROR\n";
else
{
	if (!file_exists("../private"))
		mkdir("../private");
	$data = array();
	$data["login"] = $_POST["login"];
	$hash = hash("whirlpool", $_POST["passwd"]);
	$data["passwd"] = $hash;
	if (!file_exists("../private/passwd"))
	{
		$account = array($data);
		$ser = serialize($account);
		file_put_contents("../private/passwd", $ser);
	}
	else
	{
		$file = file_get_contents("../private/passwd");
		$accounts = unserialize($file);
		$i = 0;
		while ($accounts[$i])
			$i++;
		$accounts[$i] = $data;
		$ser = serialize($accounts);
		file_put_contents("../private/passwd", $ser);
	}
	echo"OK\n";
}
?>