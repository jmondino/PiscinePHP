#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Paris');

$month = array(
	"janvier", 
	"fevrier", 
	"mars", 
	"avril", 
	"mai", 
	"juin", 
	"juillet", 
	"aout", 
	"septembre", 
	"octobre", 
	"novembre", 
	"decembre" );

$split = explode(" ", $argv[1]);
if (count($split) != 5)
{
	echo"Wrong Input\n";
	exit;
}
$succes = preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) (\d\d?) ([Jj]anvier|[Ff]evrier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre|[Dd]écembre) (\d{4}) (\d\d:\d\d:\d\d)/", $argv[1], $matches);
if (!$succes)
{
	echo"Wrong Input\n";
	exit;
}
$time = explode(":", $matches[5]);

if ($matches[3] == "Décembre" || $matches[3] == "décembre")
	$matches[3] = "Decembre";
if ($matches[3] == "Février" || $matches[3] == "février")
	$matches[3] = "Fevrier";
if ($matches[3] == "Août" || $matches[3] == "août")
	$matches[3] = "Aout";

$matches[3] = strtolower($matches[3]);
$i = 0;
while ($i < count($month))
{
	if ($matches[3] == $month[$i])
		break;
	$i++;
}
$i++;

$time_spe = mktime((int)$time[0], (int)$time[1], (int)$time[2], $i, (int)$matches[2], (int)$matches[4]);
echo"$time_spe\n";
?>