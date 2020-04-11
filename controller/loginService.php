<?php

class loginService
{

    //const service_url = "http://158.108.207.237:8080/soa/rest/services";
    public static function checkLogin($password)
    {
        if($password==1)
        {
            return $password;
        }
        else{
            return null;  
        }  
    }
}


