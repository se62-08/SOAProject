<?php
require_once "./controller/loginService.php";
require_once "./controller/cartService.php";
require_once "./controller/categoryCallService.php";
require_once "./controller/equipmentCallService.php";
require_once "./controller/orderitemCallService.php";
require_once "./controller/deteilOrderItemCallService.php";
require_once "./controller/typeCallService.php";
require_once "./controller/dressCallService.php";
require_once "./controller/userCallService.php";
require_once "./controller/rentCallService.php";
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
    case "historydress":
        historydress();
        break;
    case "stock":
        stock();
        break;
    case "wedding":
        wedding();
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
    case "refreshType":
        $id = $_GET['data'];
        refreshType($id);
        break;
    case "addequipment":
        $id = $_GET['data'];
        $num = $_GET['amount'];
        addequipment($id, $num);
        break;
    case "addDress":
        $id = $_GET['data'];
        $num = $_GET['amount'];
        addDress($id, $num);
        break;
    case "addequipment2":
        $ename = $_POST['ename'];
        $categoryid = $_POST['category'];
        $price = $_POST['price'];
        $upload_image = $_FILES['file']["name"];
        $file = $_FILES['file'];
        $fileName = basename($upload_image);
        move_uploaded_file($_FILES["file"]["tmp_name"], "./image/product/" . $_FILES["file"]["name"]);
        $path = "image/product/" . $fileName;
        addequipment2($ename, $categoryid, $price, $path);
        break;
    case "confirmOrder":
        $data = $_GET['data'];
        $_SESSION['listOrder'] = $data;
        break;
    case "confirmOrderDress":
        $data = $_GET['data'];
        $_SESSION['listOrderDress'] = $data;
        break;
    case "summitOrder":
        summitOrder();
        break;
    case "summitOrderDress":
        summitOrderDress();
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
    case "editcategory":
        $cname = $_POST['ename'];
        $ecid = $_POST['ecid'];
        editcategory($ecid, $cname);
        break;
    case "deletecategory":
        $cid = $_GET['cid'];
        deletecategory($cid);
        break;
    case "getinfoeditStock":
        $eid = $_GET['eid'];
        getinfoeditStock($eid);
        break;
    case "deleteStock":
        $eid = $_GET['eid'];
        deleteStock($eid);
        break;
    case "tabeldetailDress":
        $rid = $_GET['rid'];
        tabeldetailDress($rid);
        break;
    case "updateEquipment":
        $eid = $_POST['eid'];
        $ename = $_POST['ename'];
        $categoryid = $_POST['category'];
        $price = $_POST['price'];
        $path = null;
        if (!empty($_FILES["file"]["name"])) {
            $upload_image = $_FILES['file']["name"];
            $file = $_FILES['file'];
            $fileName = basename($upload_image);
            move_uploaded_file($_FILES["file"]["tmp_name"], "./image/product/" . $_FILES["file"]["name"]);
            $path = "image/product/" . $fileName;
        }

        updateEquipment($eid, $ename, $categoryid, $price, $path);
        break;
    case "deleteOrderDress":
        $rid = $_GET['rid'];
        deleteOrderDress($rid);
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
    header("Location: views/cart.php");
    $_SESSION['datacategory'] = categoryCallService::getAll();
    $_SESSION['dataequipment'] = equipmentCallService::getAll();
}
function stock()
{
    header("Location: views/stock.php");
    $_SESSION['datacategory'] = categoryCallService::getAll();
    $_SESSION['dataequipment'] = equipmentCallService::getAll();
}

function history()
{
    header("Location: views/history.php");
    $_SESSION['dataOrderitem'] = orderitemCallService::getAllOrderitem();
}
function historydress()
{
    header("Location: views/historyDress.php");
    $myfile = fopen("jsonOrderDress.txt", "r") or die("Unable to open file!");
    $array = json_decode(fread($myfile, filesize("jsonOrderDress.txt")), true);
    fclose($myfile);
    foreach ($array as $key => $value) {
        $array[$key]["rent"] = rentCallService::getRentBayid($key);
    }
    print_r($array);
    $_SESSION['arrayDress'] = $array;
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
function  refreshType($id)
{
    if ($id == 0) {
        $data = dressCallService::getAll();
    } else {
        $data = dressCallService::getAllDressByTypeId($id);
    }

    $content = "";
    for ($i = 0; $i < count($data); $i++) {
        $content .=   " <div class=\"col-3 mx-auto\" style=\"margin-top: 40px\">
                            <div class=\"text-center\">
                            <div class=\"product-item\">
                                <div class=\"product-image\">
                                <img src=\"../image/dressPic/{$data[$i]->photo}\" width=\"220\" height=\"230\" alt=images>
                                </div>
                                <div class=\"product-title-footer\">
                                <div class=\"product-title\">{$data[$i]->design->design} {$data[$i]->color->color} </div>
                                <div class=\"product-title\">หมวด {$data[$i]->type->type} ชนิดผ้า {$data[$i]->texture->texture}</div>
                                <div class=\"product-title\">{$data[$i]->price} บาท จำนวน {$data[$i]->amount}</div>
                                <div class=\"cart-action\">
                                    <input type=\"number\" class=\"product-quantity\" id=\"numdess_{$data[$i]->id_dress}\" min=\"1\" max=\"100\" value=\"1\" size=\"2\">
                                    <button class=\"btnaddproduct\" dressid=\"{$data[$i]->id_dress}\">Add to cart</button>
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
function  addDress($id, $num)
{
    $data = dressCallService::getDressById($id);
    $total = $num * $data->price;
    $content = "<tr>
                    <td><img src=\"../image/dressPic/{$data->photo}\" width=\"40\" height=\"40\" alt=images></td>
                    <td style=\"display:none;\">{$data->id_dress}</td>
                    <td>{$data->design->design} {$data->color->color}</td>
                    <td>$num</td>
                    <td>{$data->price}</td>
                    <td>$total</td>
                    <td style=\"text-align:center;\">
                    <button type=\"button\" id=\"delete\" class=\"btn btn-danger btn-sm btndel\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"ยกเลิก\">
                        <i class=\"far fa-trash-alt\"></i>
                    </button>
                    </td>
                </tr>";
    echo $content;
}
function  addequipment2($ename, $cid, $price, $path)
{
    $obj = categoryCallService::getCategoryById($cid);
    $array = array();
    $array['ename'] = $ename;
    $array['category'] = $obj[0];
    $array['price'] = (int) $price;
    $array['pathpic'] = $path;
    echo json_encode($array);
    equipmentCallService::createEquipment($array);
    stock();
}
function  summitOrderDress()
{

    $listOrder = $_SESSION['listOrderDress'];
    $name = $_POST['name'];
    $myDateS = $_POST['myDateS'];
    $myDateE = $_POST['myDateE'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    $objuser = userCallService::getUerBayid(11);
    $data = array();
    $data['user'] = $objuser;
    $data['date_time_rent'] = date(DATE_ISO8601);
    $data['date_recieve'] = $myDateS;
    $data['date_return'] =  $myDateE;

    $objnew = rentCallService::createrent($data);
    $detaillist = array();
    for ($i = 0; $i < count($listOrder); $i++) {
        $amount = $listOrder[$i]->amount;
        $detaillist['number'] = $amount;
        unset($listOrder[$i]->amount);
        $detaillist['dress'] = $listOrder[$i];
        $detaillist['rent'] = $objnew;
        $response = rentCallService::createDetailrent($detaillist);
    }
    $myfile = fopen("jsonOrderDress.txt", "r") or die("Unable to open file!");
    $OrderDress = json_decode(fread($myfile, filesize("jsonOrderDress.txt")), true);
    print_r($OrderDress);
    echo "<br>";
    fclose($myfile);
    $OrderDress["{$objnew->id_rent}"]['rid'] = $objnew->id_rent;
    $OrderDress["{$objnew->id_rent}"]['name'] = $name;
    $OrderDress["{$objnew->id_rent}"]['tel'] = $tel;
    $OrderDress["{$objnew->id_rent}"]['email'] = $email;
    $OrderDress["{$objnew->id_rent}"]['total'] = $total;
    $myfile = fopen("jsonOrderDress.txt", "w");
    $array = array();
    fwrite($myfile, json_encode($OrderDress));
    fclose($myfile);
    print_r($OrderDress);
    wedding();
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
    history();
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
function   editcategory($ecid, $cname)
{
    $array = array();
    $array['cid'] = $ecid;
    $array['cname'] = $cname;
    categoryCallService::updateCategory($array);
    category();
}
function   deletecategory($cid)
{
    $obj = categoryCallService::getCategoryById($cid);
    categoryCallService::deleteCategory($obj[0]);
}
function   getinfoeditStock($eid)
{
    $obj = equipmentCallService::getEquipmentsbyId($eid);
    echo json_encode($obj);
}
function   updateEquipment($eid, $ename, $categoryid, $price, $path)
{
    echo $eid . $ename . $categoryid . $price . $path;
    $obj = equipmentCallService::getEquipmentsbyId($eid);
    //print_r($obj);
    $objCategory = categoryCallService::getCategoryById($categoryid);
    $obj[0]->category = $objCategory[0];
    $obj[0]->ename = $ename;
    $obj[0]->price = (int) $price;
    if ($path != null) {
        $obj[0]->pathpic = $path;
    }
    equipmentCallService::updateEquipment($obj[0]);
    stock();
}
function   deleteStock($eid)
{
    $obj = equipmentCallService::getEquipmentsbyId($eid);
    equipmentCallService::deleteEquipment($obj[0]);
}
function   wedding()
{

    $objtype = typeCallService::getAll();
    $objdress = dressCallService::getAll();
    header("Location: views/wedding.php");
    $_SESSION['typedress'] = $objtype;
    $_SESSION['dress'] = $objdress;
}
function   tabeldetailDress($rid)
{
    $objDetail = rentCallService::getAllDetailrent();
    $objArray  = array();
    $obj = new stdClass;
    for ($i = 0; $i < count($objDetail); $i++) {

        if ($objDetail[$i]->rent->id_rent == (int) $rid) {
            array_push($objArray, $objDetail[$i]);
        }
    }
    $content = "";
    for ($i = 0; $i < count($objArray); $i++) {
        $num = $i + 1;
        $total = $objArray[$i]->dress->price * $objArray[$i]->number;
        $content .= "<tr style=\"text-align:center;\">
                        <td>$num</td>
                        <td><img src=\"../image/dressPic/{$objArray[$i]->dress->photo}\" width=\"40\" height=\"40\" alt=images></td>
                        <td>{$objArray[$i]->dress->design->design} {$objArray[$i]->dress->color->color}</td>
                        <td>{$objArray[$i]->dress->price}</td>
                        <td>{$objArray[$i]->number}</td>
                        <td> $total</td>
                    </tr>";
    }
    $array = array();
    $array['content'] = $content;
    echo json_encode($array);
}

function   deleteOrderDress($rid)
{

    $objDetail = rentCallService::getAllDetailrent();
    $objArray  = array();
    $objrent = json_encode(rentCallService::getRentBayid($rid));
    $obj = new stdClass;
    for ($i = 0; $i < count($objDetail); $i++) {

        if ($objDetail[$i]->rent->id_rent == (int) $rid) {
            array_push($objArray, $objDetail[$i]);
        }
    }
    for ($i = 0; $i < count($objArray); $i++) {
        rentCallService::deleteDetailrent($objArray[$i], $objArray[$i]->id_detailrent);
    }
    rentCallService::deleteRest($objrent, $rid);
    $myfile = fopen("jsonOrderDress.txt", "r") or die("Unable to open file!");
    $array = json_decode(fread($myfile, filesize("jsonOrderDress.txt")), true);
    fclose($myfile);
    unset($array["$rid"]);
    $myfile = fopen("jsonOrderDress.txt", "w");
    fwrite($myfile, json_encode($array));
    fclose($myfile);
}
