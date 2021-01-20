#!/usr/bin/php
<?php
$autologin = file_get_contents('./autologin');
$ActualYears = date('Y');
$ActualMonth = date('m');
$LastMonday = date('d', strtotime("Monday this week"));
$NextSunday = date('d', strtotime("Sunday this week"));

$Start = "$ActualYears-$ActualMonth-$LastMonday";
$End = "$ActualYears-$ActualMonth-$NextSunday";

$CompleteAutologin = "https://intra.epitech.eu/$autologin/planning/load?format=json&start=$Start&end=$End";
echo $CompleteAutologin;
?>