#!/usr/bin/php
<?php
////STEP2////
$autologin = file_get_contents('./autologin');
$ActualYears = date('Y');
$ActualMonth = date('m');
$LastMonday = date('d', strtotime("Monday this week"));
$NextSunday = date('d', strtotime("Sunday this week"));
$Start = "$ActualYears-$ActualMonth-$LastMonday";
$End = "$ActualYears-$ActualMonth-$NextSunday";
$CompleteAutologin = "https://intra.epitech.eu/$autologin/planning/load?format=json&start=$Start&end=$End";
////STEP2////


/////STEP3////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $CompleteAutologin);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$JSONAsString = curl_exec($ch);
curl_close($ch);
/////STEP3////

/////STEP4////
$data = json_decode($JSONAsString, true);
$ConfigAsSTring = file_get_contents('./config.json');
$model = json_decode($ConfigAsSTring, true);
$myconfig = $model["SOMETHING"];

for ($i = 0; $i != sizeof($data); $i++) {
    echo $data[$i][$myconfig], "\n";
}
/////STEP4/////

?>