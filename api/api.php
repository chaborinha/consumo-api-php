<?php

require 'key.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    $q = $_POST['city'];
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$q&appid=" . API_KEY . "&lang=pt_br";

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response, true);

    $K = (float) $response['main']['temp'];
    $C = $K - 273.15;

    echo "Temperatura em $q: " . round($C, 0);
else:
    echo 'ERRO';
endif;