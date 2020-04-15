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
    public  static  function createCategory($name)
    {
        $service_url = self::URL . "/categorys/create";
        $curl = curl_init($service_url);
        $array = array();
        $array['cname'] = $name;
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER,  array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($array, JSON_UNESCAPED_UNICODE));
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
