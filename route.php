<?php
require_once "./controller/loginService.php";
require_once "./controller/cartService.php";
require_once "./controller/categoryCallService.php";
require_once "./controller/equipmentCallService.php";
require_once "./controller/orderitemCallService.php";
require_once "./controller/deteilOrderItemCallService.php";
date_default_timezone_set("Asia/Bangkok");
session_start();
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
    case "history":
        history();
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
        break;
    case "addequipment":
        $id = $_GET['data'];
        $num = $_GET['amount'];
        addequipment($id, $num);
        break;
    case "confirmOrder":
        $data = $_GET['data'];
        $_SESSION['listOrder'] = $data;
        break;
    case "summitOrder":
        summitOrder();
        break;
    case "tabeldetail":
        $id = $_GET['oid'];
        tabeldetail($id);
        break;
    case "returnOrder":
        $id = $_GET['oid'];
        returnOrder($id);
        break;
    case "deleteOrder":
        $id = $_GET['oid'];
        deleteOrder($id);
        break;
    case "addcategory":
        $cname = $_POST['cname'];
        addcategory($cname);
        break;
    default:
        break;
}


function login($password)
{

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
}
function category()
{
    header("Location: views/categoryStock.php");
    $_SESSION['datacategory'] = categoryCallService::getAll();
}
function cart()
{
}


function history()
{
    header("Location: views/history.php");
    $_SESSION['dataOrderitem'] = orderitemCallService::getAllOrderitem();
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
function  addequipment($id, $num)
{
    $data = equipmentCallService::getEquipmentsbyId($id, $num);
    $total = $num * $data[0]->price;
    $content = "<tr>
                    <td><img src=\"../{$data[0]->pathpic}\" width=\"40\" height=\"40\" alt=images></td>
                    <td style=\"display:none;\">{$data[0]->eid}</td>
                    <td>{$data[0]->ename}</td>
                    <td>$num</td>
                    <td>{$data[0]->price}</td>
                    <td>$total</td>
                    <td style=\"text-align:center;\">
                    <button type=\"button\" id=\"delete\" class=\"btn btn-danger btn-sm btndel\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"ยกเลิก\">
                        <i class=\"far fa-trash-alt\"></i>
                    </button>
                    </td>
                </tr>";
    echo $content;
}
function  summitOrder()
{
    $listOrder = $_SESSION['listOrder'];
    $name = $_POST['name'];
    $myDateS = $_POST['myDateS'];
    $myDateE = $_POST['myDateE'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    $objOrderNew = orderitemCallService::createOrderitem($name, $myDateS, $myDateE, $tel, $email, $total);
    $data = array();
    for ($i = 0; $i < count($listOrder); $i++) {
        $amount = $listOrder[$i]->amount;
        $data['amount'] = $amount;
        unset($listOrder[$i]->amount);
        $data['equipment'] = $listOrder[$i];
        $data['orderitem'] = $objOrderNew[0];

        $response = deteilOrderItemCallService::createdeteilOrderItem($data);
    }
    header("Location: views/history.php");
}
function  tabeldetail($id)
{
    $obj = orderitemCallService::getOrderitembyId($id);
    $obj[0]->dateStart = date("d/m/Y", substr($obj[0]->dateStart, 0, -3));
    $obj[0]->dateEnd = date("d/m/Y", substr($obj[0]->dateEnd, 0, -3));
    $objDetailOrder = deteilOrderItemCallService::getDeteilOrderItembyOrderId($id);
    $content = "";
    for ($i = 0; $i < count($objDetailOrder); $i++) {
        $num = $i + 1;
        $total = $objDetailOrder[$i]->equipment->price * $objDetailOrder[$i]->amount;
        $content .= "<tr style=\"text-align:center;\">
                        <td>$num</td>
                        <td><img src=\"../{$objDetailOrder[$i]->equipment->pathpic}\" width=\"40\" height=\"40\" alt=images></td>
                        <td>{$objDetailOrder[$i]->equipment->ename}</td>
                        <td>{$objDetailOrder[$i]->equipment->price}</td>
                        <td>{$objDetailOrder[$i]->amount}</td>
                        <td> $total</td>
                    </tr>";
    }
    $obj[0]->objDetailOrder =  $content;
    echo json_encode($obj);
}
function  returnOrder($id)
{
    $obj = orderitemCallService::getOrderitembyId($id);
    $obj[0]->status = "คืนแล้ว";
    orderitemCallService::updateOrderitem($obj[0]);
}
function   deleteOrder($id)
{
    $objOrder = orderitemCallService::getOrderitembyId($id);
    $objDetailOrder = deteilOrderItemCallService::getDeteilOrderItembyOrderId($id);
    for ($i = 0; $i < count($objDetailOrder); $i++) {
        deteilOrderItemCallService::deleteDeteilOrderItem($objDetailOrder[$i]);
    }
    orderitemCallService::deleteOrderitem($objOrder[0]);
}
function   addcategory($cname)
{
    categoryCallService::createCategory($cname);
    category();
}
