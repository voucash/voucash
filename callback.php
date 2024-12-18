<?php
    $raw_post_data = file_get_contents('php://input');
    @file_put_contents('/tmp/voucash.log', $raw_post_data); //for debug

    
    $ret = json_decode($raw_post_data, true); 
    if ($ret["signature"] == "debug") {
        var_dump($ret);
        return;
    }

    // below for production, 
    $ch = curl_init("https://voucash.com/api/payment/verify");

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $raw_post_data);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    // curl_setopt($ch, CURLOPT_CAINFO, $tmpfile);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    $http_code = $info['http_code'];


    if ( ! ($res)) {
        $errno = curl_errno($ch);
        $errstr = curl_error($ch);
        curl_close($ch);
        exit("cURL error: [$errno] $errstr");
    }


    if ($http_code != 200) {
        curl_close($ch);
        exit("server error wrong $http_code");
    }

    curl_close($ch);

    if ($res == "verified") {
        // handle your order
    }

