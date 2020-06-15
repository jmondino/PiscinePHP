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
?>