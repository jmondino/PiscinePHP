#!/usr/bin/php
<?php

if ($argc == 1)
	exit;

$str = $argv[1];
$str = trim($str);
$str = preg_replace("/\s+/", " ", $str);
echo"$str\n";
?>