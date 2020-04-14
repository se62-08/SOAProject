<?php

class categoryCallService
{
    const URL = 'http://localhost:8080/soa/rest/services';
    public  static  function getAll()
    {
        $curl = curl_init(self::URL . "/categorys");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        if (json_decode($curl_response)->status == "400") return null;
        curl_close($curl);
        return json_decode(json_decode($curl_response)->result);
    }
}
