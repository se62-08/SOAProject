<?php

class typeCallService
{
    const URL = 'http://localhost:8080';
    public  static  function getAll()
    {
        $curl = curl_init(self::URL . "/types");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        return json_decode($curl_response);
    }
}
