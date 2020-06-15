#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo"Incorrect Parameters\n";
	return;
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

if (!is_numeric(trim($argv[1])) || !check_operator(trim($argv[2])) || !is_numeric(trim($argv[3])))
{
	echo"Incorrect Parameters\n";
	return;
}
$res = do_op(trim($argv[1]), trim($argv[2]), trim($argv[3])); 
echo "$res\n";
?>