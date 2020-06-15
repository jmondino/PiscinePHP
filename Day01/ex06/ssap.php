#!/usr/bin/php
<?php
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
$i = 0;
while ($i < count($split))
{
	echo"$split[$i]\n";
	$i++;
}
?>