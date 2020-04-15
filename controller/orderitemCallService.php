<?php
require_once('./model/orderItem.php');
class orderitemCallService
{
    const URL = 'http://localhost:8080/soa/rest/services';
    public  static  function createOrderitem($name, $myDateS, $myDateE, $tel, $email, $total)
    {
        $service_url = self::URL . "/orderitems/create";
        $curl = curl_init($service_url);
        $myDateS = strtotime($myDateS);
        $myDateE = strtotime($myDateE);
        $l = new orderItem();
        $l->nameCustomer = $name;
        $l->dateStart = (int) ($myDateS . "000");
        $l->dateEnd = (int) ($myDateE . "000");
        $l->tel = $tel;
        $l->email = $email;
        $l->oid = null;
        $l->totalprice = $total;
        $l->status = "ยังไม่ได้คืน";
        $l->owner = "SOA_03";
        unset($l->oid);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER,  array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($l, JSON_UNESCAPED_UNICODE));
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
    public  static  function getOrderitembyId($id)
    {
        $curl = curl_init(self::URL . "/orderitems/$id");
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
