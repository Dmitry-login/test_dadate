<?php
require __DIR__ . 'vendor/autoload.php';
$token = '7257be4b6caffb899cd7a6456c2797304c1f3b43';
$secret = '89f12874e5bfb5129ffdd7b77335136304abb313';
//$dadata = new \Dadata\DadataClient($token, $secret);
$structure = ["NAME", "ADDRESS", "PHONE"];
$record = [
    "Федотов Алексей", "Москва, Сухонская улица, 11 кв 89", "8 916 823 3454"
];
$result = $dadata->cleanRecord($structure, $record);
var_dump($token);
?>