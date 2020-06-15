#!/usr/bin/php
<?php
function is_alpha($key) 
{
	if ((ord($key[0]) >= ord('a') && ord($key[0]) <= ord('z'))
		|| ((ord($key[0]) >= ord('A') && ord($key[0]) <= ord('Z')))) 
		return true;
	return false;
}
function ft_split($str)
{
    $i = 0;
    $arr = explode(" ", $str);
    $split = array();
    while ($i < count($arr))
    {
        if (strlen($arr[$i]))
            array_push($split, $arr[$i]);
        $i++;
    }
    sort($split);
    return $split;
}
$i = 1;
while ($i < $argc)
{
    $str = $str." ".$argv[$i];
    $i++;
}
$split = ft_split(trim($str));
$char = array();
$num = array();
$other = array();
foreach ($split as $key)
{
	if (is_numeric($key))
		array_push($num, $key);
	else if (is_alpha($key))
		array_push($char, $key);
	else
		array_push($other, $key);
}
natcasesort($char);
sort($num, SORT_STRING);
natcasesort($other);
foreach ($char as $key)
	echo"$key\n";
foreach ($num as $key)
	echo"$key\n";
foreach ($other as $key)
	echo"$key\n";
?>