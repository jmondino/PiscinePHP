#!/usr/bin/php
<?php
$i = 2;
$tofind = $argv[1];
$keys = array();
$values= array();
$tmp = array();
foreach ($argv as $curr)
{
	if($curr != $argv[0] && $curr != $argv[1])
	{
		$tmp = explode(":" ,$curr);
		array_push($keys, $tmp[0]);
		array_push($values, $tmp[1]);
	}
}
$keys = array_reverse($keys);
$values = array_reverse($values);

foreach ($keys as $i => $value)
{
	if($value == $tofind)
	{
		echo "$values[$i]\n";
		exit(0);
	}
}
?>