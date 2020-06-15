#!/usr/bin/php
<?php
if ($argc != 2)
	exit;
$arr=explode(" ", $argv[1]);
$split = array();
$i = 0;
while ($i < count($arr))
{
	if (strlen($arr[$i]))
		array_push($split, $arr[$i]);
	$i++;
}
$i = 0;
while ($i < count($split))
{
	echo"$split[$i]";
	if ($i + 1 < count($split))
		echo" ";
	$i++;
}
echo"\n";
?>