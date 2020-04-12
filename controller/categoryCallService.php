<?php

class categoryCallService
{

    public  static  function getAll()
    {
        $curl = curl_init("http://localhost:8080/soa/rest/services/categorys");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        return json_decode(json_decode($curl_response)->result);
    }
}
