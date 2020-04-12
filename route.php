<?php
require_once "./controller/loginService.php";
require_once "./controller/cartService.php";

switch ($_GET['action']) {
    case "login":
        login($_POST['password']);
        break;
    case "cart":
        cart();
        break;
    default:
        break;
}


function login($password)
{
    session_start();

    //$_SESSION['token']=loginService::login($password);
    //if($_SESSION['token']->status != 401) {
    $_SESSION['pass'] = loginService::checkLogin($password);
    //}

    if ($_SESSION['pass'] != null) {
        header("Location: views/cart.php");
    } else {
        header("Location: index.php?error=กรอกข้อมูลไม่ถูกต้อง!");
    }
}
function cart()
{
}
