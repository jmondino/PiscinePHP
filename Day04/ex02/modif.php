<?php

function check_data($login, $oldpw)
{
	if (!file_exists("../private/passwd"))
		return false;
	$hash = hash("whirlpool", $oldpw);
	$content = file_get_contents("../private/passwd");
	$unser = unserialize($content);
	foreach ($unser as $key => $value)
	{
		if ($value["login"] == $login && $value["passwd"] == $hash)
			return true;
	}
	return false;
}

if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"] || $_POST["submit"] != "OK" || !check_data($_POST["login"], $_POST["oldpw"]))
{
	echo "ERROR\n";
	exit;
}
$file = file_get_contents("../private/passwd");
$accounts = unserialize($file);
$hash = hash("whirlpool", $_POST["oldpw"]);
foreach ($accounts as $key => $value)
{
	if ($value["login"] == $_POST["login"] && $value["passwd"] == $hash)
	{
		$accounts[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
	}
}
$serialized = serialize($accounts);
if (file_put_contents("../private/passwd", $serialized))
	echo"OK\n";
?>