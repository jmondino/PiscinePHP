#!/usr/bin/php
<?php

function custom_replace($matches) 
{
    return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
}

if ($argc < 2 || !file_exists($argv[1])) 
	exit;

$open = fopen($argv[1], 'r');
$line = "";
while (!feof($open))
{
	$line = $line.fgets($open);
}
$line = preg_replace_callback('/<.*?a.*?title="(.*?)".*?>/sim', custom_replace, $line);
$line = preg_replace_callback('/<.*?a.*?>(.*?)</sim', custom_replace, $line);
echo $line;
?>