<?php
session_start();
$arrayDress = $_SESSION['arrayDress'];
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../link.php" ?>
    <title>Sweet Home</title>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- อันนี้ไว้เรียกใช้แท็บข้างๆๆ -->
        <?php include "layout_user.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- อันนี้ไว้เรียกใช้แท็บบน -->
                <?php include "../Topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div bgcolor=“green” class="d-sm-flex align-items-center justify-content-between mb-4">

                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-12 mb-4">

                            <div class="card border-left-primary card-color-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold  text-uppercase mb-1">รายการการเช่าทั้งหมด
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($arrayDress) ?> รายการ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายการทั้งหมด</h6>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row center">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered" id="d" width="100%" cellspacing="0">

                                                <thead>
                                                    <tr>
                                                        <th>ชื่อผู้เช่า</th>
                                                        <th>วันที่เช่า</th>
                                                        <th>วันที่คืน</th>
                                                        <th>email</th>
                                                        <th>เบอร์ติดต่อ</th>
                                                        <th>จำนวนเงิน</th>
                                                        <th>การจัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($arrayDress as $key => $value) {
                                                        echo " <tr style=\"text-align:center;\">
                                                        <td>{$arrayDress[$key]['name']}</td>
                                                        <td>" . date("d/m/Y", strtotime($arrayDress[$key]['rent']['date_recieve'])) . "</td>
                                                        <td>" . date("d/m/Y", strtotime($arrayDress[$key]['rent']['date_return'])) . "</td>
                                                        <td>{$arrayDress[$key]['email']}</td>
                                                        <td>{$arrayDress[$key]['tel']}</td>
                                                        <td>{$arrayDress[$key]['total']}</td>
                                                        <td>
                                                            <button type=\"button\"  class=\"btn btn-info btn-sm tt detailRent\"  rid=\"$key\" title='รายละเอียดการเช่า'>
                                                                <i class=\"fas fa-file-alt\"></i>
                                                            </button>
                                                            <button type=\"button\"  class=\"btn btn-danger btn-sm tt del_btn\" rid=\"$key\"  nameCus=\"{$arrayDress[$key]['name']}\" title='ลบข้อมูลการเช่า'>
                                                                <i class=\"far fa-trash-alt\"></i>
                                                            </button>

                                                        </td>
                                                    </tr>";
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <div id="modelDetail" class="modal fade">
        <form class="modal-dialog modal-lg" method="POST" action='manage.php'>
            <div class="modal-content">

                <div class="row mb-4 " style=" margin:20px;">
                    <div class="col-sm-12">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th rowspan="1" colspan="1">ลำดับ</th>
                                    <th rowspan="1" colspan="1">รูป</th>
                                    <th rowspan="1" colspan="1">ชื่อรายการสินค้า</th>
                                    <th rowspan="1" colspan="1">ราคาต่อชิ้น(บาท)</th>
                                    <th rowspan="1" colspan="1">จำนวน</th>
                                    <th rowspan="1" colspan="1">ราคารวม(บาท)</th>
                                </tr>
                            </thead>

                            <tbody id="tableDetailOrder">
                                <tr role="row">
                                    <td>1</td>
                                    <td>ดอกมะลิ</td>
                                    <td>5</td>
                                    <td>100</td>
                                    <td>500</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {

        $('.tt').tooltip({
            trigger: "hover"
        });
        $('.detailRent').click(function() {
            var id = $(this).attr('rid');

            $.ajax('../route.php?action=tabeldetailDress', {
                data: {
                    rid: id
                },
                success: function(data, status, xhr) { // success callback function
                    var objOrder = JSON.parse(data);
                    $('#tableDetailOrder').html(objOrder.content);
                    //console.log(data);
                    $("#modelDetail").modal();
                },
                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                    alert(errorMessage);
                }
            });

        });
        $('.returnOrder').click(function() {
            var id = $(this).attr('oid');
            var nameCus = $(this).attr('nameCus');
            swal({
                    title: "ยืนยันนการคืนอุปกรณ์",
                    text: "ของคุณ " + nameCus + " หรือไม่ ?",
                    icon: "success",
                    buttons: true,

                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("คืนรายการสำเร็จเรียบร้อยแล้ว", {
                            icon: "success",
                            buttons: false
                        });
                        setTimeout(function() {
                            $.ajax('../route.php?action=returnOrder', {
                                data: {
                                    oid: id
                                },
                                success: function(data, status, xhr) { // success callback function
                                    window.location.replace('../route.php?action=history');
                                },
                                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                                    alert(errorMessage);
                                }
                            });
                        }, 1500);
                    } else {
                        swal("การลบไม่สำเร็จ");
                        setTimeout(function() {
                            swal.close()
                        }, 1500);
                    }
                });

        });
        $('.del_btn').click(function() {
            var id = $(this).attr('rid');
            var nameCus = $(this).attr('nameCus');
            swal({
                    title: "คุณต้องการลบ",
                    text: "รายการของ " + nameCus + " หรือไม่ ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                            icon: "success",
                            buttons: false
                        });

                        setTimeout(function() {
                            $.ajax('../route.php?action=deleteOrderDress', {
                                data: {
                                    rid: id
                                },
                                success: function(data, status, xhr) { // success callback function
                                    window.location.replace('../route.php?action=historydress');
                                },
                                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                                    alert(errorMessage);
                                }
                            });
                        }, 1500);
                    } else {
                        swal("การลบไม่สำเร็จ");
                    }
                });
        });
    });
</script>