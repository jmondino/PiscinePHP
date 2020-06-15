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
    return $split;
}
$arr = ft_split($argv[1]);
$first = array_shift($arr);
foreach ($arr as $key)
{
	echo"$key ";
}
if ($argv[1])
	echo"$first\n";
?>