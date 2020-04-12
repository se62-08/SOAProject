<?php
require('./query.php');
//session_start();
function checkLogin($password)
{
    header("Location: cart.php");
}

function getProducts(): array
{
    $stmt = DB_ProductStatusON();
    while ($product = $stmt->fetch(PDO::FETCH_OBJ)) {
        $productslist[$product->product_name] = $product->price;
        // $product_name = $my_row->product_name;
        // $price = $my_row->price;
        // $productslist[] = array($product_name,$price);
    }
    return $productslist;
}
function calculateTotalPrice(array $products_list, array $total, array  &$tal): array
{
    $i = 0;
    $all = [];
    $tal['sum'] = 0;
    //print_r($products_list);
    foreach ($products_list as $k => $v) {
        if (isset($total[$k])) {
            $all['money'][$k] = $total[$k] * $v;
            $tal['sum'] += number_format($all['money'][$k], 2);
        }
        //echo $total[$i] * $v."<br>";
        // $all['money'][$i] = $total[$i] * $v;
        // $tal['sum'] += number_format($all['money'][$i], 2);
        // $i++;
    }
    $tal['sumVAT'] = number_format(($tal['sum'] * 7) / 100, 2);
    $tal['pay'] = number_format($tal['sum'] + $tal['sumVAT'], 2);
    return $all;
}

function table(array $products_list, int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
    if ($column == 4) {
        $total[] = [];

        $i = 1;
        //$countTotal = 0;
        foreach ($products_list as $k => $v) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $k; ?></td>
                <td><?php echo $v; ?></td>
                <td>
                    <?php
                    //if($countTotal == 0){ $countTotal++;
                    ?>
                    <!-- <input type="number" name="total[]" value="0" min="0" max="100"> -->
                    <input type="number" name="total[<?php echo $k ?>]" value="0" min="0" max="100">
                    <?php
                    //}else{
                    ?>
                    <!-- <input type="number" name="total[]" value="$_SESSION['total'][i]" min="0" max="100"> -->
                    <?php
                    //} 
                    ?>
                </td>
            </tr>
            <?php $i++;
        }
    }
    if ($column == 5) {
        $total = $_POST['total'];
        $tal = [];
        print_r($total);
        $all = calculateTotalPrice($products_list, $total, $tal);
        $i = 0;
        $j = 1;
        print_r($all);
        foreach ($products_list as $k => $v) {
            if (isset($total[$k])) { ?>
                <tr align="center">
                    <td><?php echo $j; ?></td>
                    <td><?php echo $k; ?></td>
                    <td><?php echo $v; ?></td>
                    <td><?php echo $total[$k]; ?></td>

                    <td><?php echo $all['money'][$k]; ?></td>
                </tr>
        <?php
                $j++;
            }
            $i++;
        }
        $_SESSION['total'] = $total;
        $_SESSION['all'] = $all;
        // print_r($_SESSION['all']);
        $_SESSION['tsum'] = $tal['sum'];
        $_SESSION['tsumvat'] = $tal['sumVAT'];
        $_SESSION['tpay'] = $tal['pay'];
        ?>
        </table>
        <?php
    }
    if ($column == 6) {
        $total = $_POST['total'];
        print_r($total);
        $i = 0;
        $j = 1;
        $test = array();
        foreach ($products_list as $k => $v) {
            if ($total[$k] > 0) { ?>
                <tr align="center">
                    <td><?php echo $j; ?></td>
                    <td><?php echo $k; ?></td>
                    <td><?php echo $v; ?></td>
                    <?php //$test[$j-1] = array($j,$k,$v); 
                    ?>
                    <td><input type="number" name="total[<?php echo $k ?>]" value="<?php echo $total[$k] ?>" min="0" max="100"></td>
                </tr>
        <?php
                $j++;
            }
            $i++;
        }
        // $_SESSION["item"] = $test;
        ?>
        </table>
    <?php
    }
}

function PayDelivery()
{ ?>
    <table>
        <tr align="center">
            <td colspan="4" style="border: 0"> ราคารวมทั้งหมด (excl. VAT) </td>
            <td style="border: 0"><?php echo $_SESSION['tsum']; ?></td>
        </tr>
        <tr align="center">
            <td colspan="4" style="border: 0">VAT (7%) </td>
            <td style="border: 0"><?= $_SESSION['tsumvat']; ?></td>
        </tr>
        <tr align="center">
            <td colspan="4" style="border: 0">ราคารวมทั้งหมด(incl. VAT) </td>
            <td style="border: 0 "><?= $_SESSION['tpay'] + 40; ?></td>
        </tr>
    </table>
<?php }

function PaySelf()
{ ?>
    <table>
        <tr align="center">
            <td colspan="4" style="border: 0"> ราคารวมทั้งหมด (excl. VAT) </td>
            <td style="border: 0"><?php echo $_SESSION['tsum']; ?></td>
        </tr>
        <tr align="center">
            <td colspan="4" style="border: 0">VAT (7%) </td>
            <td style="border: 0"><?= $_SESSION['tsumvat']; ?></td>
        </tr>
        <tr align="center">
            <td colspan="4" style="border: 0">ราคารวมทั้งหมด(incl. VAT) </td>
            <td style="border: 0 "><?= $_SESSION['tpay']; ?></td>
        </tr>
    </table>
    <?php }

//ฟังก์ชันงาน soa

function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
    if ($column == 3) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "<img src=\"./img/a.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000123"; ?></td>
            <td><?php echo "แจกัน"; ?></td>
            <td><?php echo "2"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "10"; ?></td>
        </tr>
    <?php
    }
    if ($column == 4) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "<img src=\"./img/a.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000123"; ?></td>
            <td><?php echo "แจกัน"; ?></td>
            <td><?php echo "2"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "10"; ?></td>
            <td style="text-align:center;">
                <button type="button" onclick="delfunction()" id="delete" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ยกเลิก">
                    <i class="far fa-trash-alt"></i>
                </button>

            </td>
        </tr>
    <?php
    }
    if ($column == 5) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 6) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "นายคาเดี้ยน คาเมร่า"; ?></td>
            <td><?php echo "ครึ่งวัน 1200</br>" . "เต็มวัน 2000</br>"; ?></td>
            <td><select id="photographerprice">
                    <option value="a">ครึ่งวัน</option>
                    <option value="b">เต็มวัน</option>
                </select></td>
            <td><input type="date" id="myDate" name="myDate" value=""></td>
        </tr>
    <?php
    }
    if ($column == 7) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 8) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "ต้มยำกุ้ง"; ?></td>
            <td><?php echo "350"; ?></td>
            <td><input type="number" class="product-quantity" id="quantity" name="quantity" min="0" max="100" name="quantity" value="0" size="2"></td>
            <td><input type="text" name="note"><br /></td>
        </tr>
    <?php
    }
    if ($column == 9) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "1"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "ต้องการดอกไม้สีขาว"; ?></td>
        </tr>
    <?php
    }
    if ($column == 10) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "นายคาเดี้ยน คาเมร่า"; ?></td>
            <td><?php echo "1200"; ?></td>
            <td><?php echo "ครึ่งวัน"; ?></td>
            <td><input type="date" id="myDate" name="myDate" value="2020-03-12"></td>
        </tr>
    <?php
    }
    if ($column == 11) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "แจกัน</br>" . "ดอกไม้</br>" . "ผ้าม่าน</br>"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "1"; ?></td>
            <td><?php echo "1050"; ?></td>
            <td><?php echo "ต้องการดอกไม้สีแดง"; ?></td>
        </tr>
    <?php
    }
    if ($column == 12) {
    ?>
        <tr>
            <td><?php echo "1"; ?></td>
            <td><?php echo "000001"; ?></td>
            <td><?php echo "ต้มยำกุ้ง"; ?></td>
            <td><?php echo "350"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "1750"; ?></td>
            <td><?php echo "รสชาติจัดจ้าน"; ?></td>
        </tr>
    <?php
    }
    if ($column == 13) {
    ?>
        <tr>
            <td><?php echo "2"; ?></td>
            <td><?php echo "<img src=\"./img/q62ir9.jpg\" width= \"70\" height=\"80\" >" ?></td>
            <td><?php echo "000124"; ?></td>
            <td><?php echo "ดอกไม้"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "5"; ?></td>
            <td><?php echo "25"; ?></td>
            <td style="text-align:center;">
                <button type="button" onclick="delfunction()" id="delete" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ยกเลิก">
                    <i class="far fa-trash-alt"></i>
                </button>

            </td>
        </tr>
<?php
    }
}
