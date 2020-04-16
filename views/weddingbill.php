<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include "../link.php";
    require_once("../controller/dressCallService.php");
    $list = $_SESSION['listOrderDress'];
    $listOrder = array();
    $total = 0;
    for ($i = 0; $i < count($list); $i++) {
        $obj = dressCallService::getDressById($list[$i]['id']);
        $obj->amount = $list[$i]['amount'];
        array_push($listOrder, $obj);
        $total += $list[$i]['amount'] * $listOrder[$i]->price;
    }
    $_SESSION['listOrderDress'] = $listOrder;
    ?>
    <title>Bill</title>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- อันนี้ไว้เรียกใช้แท็บข้างๆๆ -->
        <?php include "layout_user.php" ?>
        <?php //include "helper_func.inc.php" 
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- อันนี้ไว้เรียกใช้แท็บบน -->
                <?php include "../Topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <?php
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">โปรดกรอกข้อมูล</h6>
                        </div>
                        <div id="product-grid">
                            <div class="customer-data">
                                <div class="modal-body" id="addModalBody">
                                    <form action="../route.php?action=summitOrderDress" method="post">
                                        <div class="container">
                                            <input type="hidden" name="total" id="total" value="<?= $total ?>">
                                            <div class="row mb-3">
                                                <div class="col-xl-4 col-2 text-right ">
                                                    <label for="name">ชื่อ-สกุล : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input type="text" name="name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-xl-4 col-2 text-right ">
                                                    <label for="day">วันที่เช่าสินค้า : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input type="date" id="myDateS" class="datedata" name="myDateS" value="<?= date("Y-m-d") ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-xl-4 col-2 text-right ">
                                                    <label for="day">วันที่คืนสินค้า : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input type="date" id="myDateE" class="datedata" name="myDateE" value="<?= date("Y-m-d") ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-xl-4 col-2 text-right ">
                                                    <label for="day">เบอร์โทร : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input type="text" name="tel">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-xl-4 col-2 text-right ">
                                                    <label for="day">e-mail : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input type="text" name="email">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-xl-5 col-2 text-right ">
                                                    <span>

                                                        <button type="summit" id="btn_green" class="btn btn-success">
                                                            ยืนยัน
                                                        </button>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ยอดที่ต้องชำระ</h6>
                        </div>
                        <div id="product-grid">
                            <div class="customer-data">
                                <div class="modal-body" id="addModalBody">
                                    <div class="container">
                                        <div class="row mb-3">
                                            <div class="col-xl-4 col-2 text-right ">
                                                <label for="name">ราคารวมทั้งหมด : <span id="totalprice"><?= $total ?></span> บาท</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header card-bg ">
                                <span class="m-0 font-weight-bold text-primary">สรุปรายการ</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="text-align:center;" id="d" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ภาพสินค้า</th>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>
                                            <th>ราคา</th>
                                            <th>ราคารวม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($listOrder); $i++) {
                                            $totalp = $listOrder[$i]->amount * $listOrder[$i]->price;
                                            echo "<tr>
                                  <td><img src=\"../image/dressPic/{$listOrder[$i]->photo}\" width=\"40\" height=\"40\" alt=images></td>
                                  <td>{$listOrder[$i]->design->design} {$listOrder[$i]->color->color}</td>
                                  <td>{$listOrder[$i]->amount}</td>
                                  <td>{$listOrder[$i]->price}</td>
                                  <td>$totalp</td>
                              </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- <img src="./img/a.jpg" width= “30” height=“50”> -->
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        $(".datedata").change(function() {
            var date1 = $('#myDateS').val();
            var date2 = $('#myDateE').val(); //myDateS
            date1 = date1.split("-");
            date2 = date2.split("-");
            sDate = new Date(date1[0], date1[1] - 1, date1[2]);
            eDate = new Date(date2[0], date2[1] - 1, date2[2]);
            var daysDiff = Math.round((eDate - sDate) / 86400000);
            var numday = daysDiff + 1;
            if (numday < 1) {
                $('#totalprice').html('กรุณากรอกวันให้ถูกต้อง');
            } else {

                $('#totalprice').html(<?= $total ?>);
                $('#total').val(<?= $total ?>);
            }
        });
    </script>

</body>

</html>