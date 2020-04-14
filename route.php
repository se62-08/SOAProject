<?php
require_once "./controller/loginService.php";
require_once "./controller/cartService.php";
require_once "./controller/categoryCallService.php";
require_once "./controller/equipmentCallService.php";
switch ($_GET['action']) {
        //index.php
    case "login":
        login($_POST['password']);
        break;
        //cart.php
    case "cartOrder":
        cartOrder();
        break;
    case "category":
        category();
        break;
    case "cart":
        cart();
        break;
        //bill.php
    case "bill":
        bill();
        break;

        //billPhoto.php
    case "photographer":
        photographer();
        break;
    case "billPhoto":
        billPhoto();
        break;
    case "refreshcategory":
        $id = $_GET['data'];
        refreshcategory($id);
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
        $_SESSION['datacategory'] = categoryCallService::getAll();
        $_SESSION['dataequipment'] = equipmentCallService::getAll();
    } else {
        header("Location: index.php?error=กรอกข้อมูลไม่ถูกต้อง!");
    }
}


function cartOrder()
{
    header("Location: views/bill.php");
}
function category()
{
}
function cart()
{
}


function bill()
{
}

function photographer()
{
    header("Location: views/billPhoto.php");
}

function billPhoto()
{
}
function  refreshcategory($id)
{
    if ($id == 0) {
        $data = equipmentCallService::getAll();
    } else {
        $data = equipmentCallService::getEquipmentsbyCategoryId($id);
    }

    $content = "";
    for ($i = 0; $i < count($data); $i++) {
        $content .= "<div class=\"col-3 mx-auto\" style=\"margin-top: 40px\">
            <div class=\"text-center\">
              <div class=\"product-item\">
                <div class=\"product-image\">
                  <img src=\"../{$data[$i]->pathpic}\" width=\"220\" height=\"230\" alt=images>
                </div>
                <div class=\"product-title-footer\">
                  <div class=\"product-title\">{$data[$i]->ename}</div>
                  <div class=\"product-title\">หมวด {$data[$i]->category->cname}</div>
                  <div class=\"product-title\">{$data[$i]->price} บาท</div>
                  <div class=\"cart-action\">
                    <input type=\"number\" class=\"product-quantity\" id=\"numequipment_{$data[$i]->eid}\" min=\"1\" max=\"100\" value=\"1\" size=\"2\">
                    <button class=\"btnaddproduct\" eid=\"{$data[$i]->eid}\">Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>";
    }
    echo $content;
}
