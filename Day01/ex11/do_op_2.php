#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo"Incorrect Parameters\n";
	exit;
}
function check_operator($op)
{
    if ($op == "*" || $op == "-" || $op == "+" || $op == "/" || $op == "%")
        return true;
    else
        return false;
}
function do_op($a, $op, $b)
{
    if ($op == "-")
        return ($a - $b);
    if ($op == "+")
        return ($a + $b);
    if ($op == "*")
        return ($a * $b);
    if ($op == "/")
        return ($a / $b);
    if ($op == "%")
        return ($a % $b);
    else
        return 0;
}
function split_with_op($str)
{
	$i = 1;
	$j = 0;
	while ($i < strlen($str))
	{
		if (check_operator($str[$i]))
		{
			if ($str[$i] == '-')
				$str[$i] = '$';
			break;
		}
		$i++;
	}
	$op = $str[$i];
	if (!$op)
	{
		echo "Syntax Error\n";
		exit;
	}
	$arr = $op == "$" ? explode("$", $str) : explode($op, $str);
	$final = $op == "$" ? array($arr[0], "-", $arr[1]) : array($arr[0], $op, $arr[1]);
	return $final;
}
function parse($str)
{
	$split = array();
	$str = trim($str);
	if (strpos($str, " "))
	{
		$arr = explode(" ", $str);
		foreach($arr as $key)
		{
			if ($key != "")
				array_push($split, $key);
		}
	}
	else
		$split = split_with_op($str);
	return ($split);
}
$calcul = parse($argv[1]);
if (!is_numeric($calcul[0]) || !check_operator($calcul[1]) || !is_numeric($calcul[2]) || $calcul[3])
{
	echo "Syntax Error\n";
	exit;
}
$res = do_op($calcul[0] , $calcul[1], $calcul[2]);
echo"$res\n";
?>