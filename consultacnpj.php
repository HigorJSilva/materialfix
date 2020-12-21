<?php

    $cnpj = $_GET["cnpj"];
    $output = preg_replace('/[^0-9]/', '', $cnpj);

    $url ='https://www.receitaws.com.br/v1/cnpj/'.$output;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    $return = curl_exec($curl);
    curl_close($curl);

    $array = (array )  (json_decode($return));
    $response = $array['status'];

    if($response == 'OK'){
        echo (json_encode(true));
    }else{
        echo (json_encode(false));
    }


?>
