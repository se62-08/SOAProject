<?php
session_start();
$dataOrderitem = $_SESSION['dataOrderitem'];
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataOrderitem) ?> รายการ</div>
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
                                                        <th>ลำดับ</th>
                                                        <th>รหัสธุรกิจ</th>
                                                        <th>ชื่อผู้เช่า</th>
                                                        <th>วันที่เช่า</th>
                                                        <th>วันที่คืน</th>
                                                        <th>ราคา(บาท)</th>
                                                        <th>สถานะ</th>
                                                        <th>การจัดการ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($dataOrderitem); $i++) {
                                                        $num = $i + 1;
                                                        echo " <tr style=\"text-align:center;\">
                                                                    <td>$num</td>
                                                                    <td>{$dataOrderitem[$i]->owner}</td>
                                                                    <td>{$dataOrderitem[$i]->nameCustomer}</td>
                                                                    <td>" . date("d/m/Y", substr($dataOrderitem[$i]->dateStart, 0, -3)) . "</td>
                                                                    <td>" . date("d/m/Y", substr($dataOrderitem[$i]->dateEnd, 0, -3)) . "</td>
                                                                    <td>{$dataOrderitem[$i]->totalprice}</td>
                                                                    <td>{$dataOrderitem[$i]->status}</td>
                                                                    <td>";
                                                        if ($dataOrderitem[$i]->status != "คืนแล้ว") {
                                                            echo "<button type=\"button\"  class=\"btn btn-success btn-sm tt returnOrder\" oid=\"{$dataOrderitem[$i]->oid}\" nameCus=\"{$dataOrderitem[$i]->nameCustomer}\" title='คืนอุปกรณ์'>
                                                                           <i class=\"fas fa-check\"></i>
                                                                            </button>";
                                                        }
                                                        echo "
                                                                        <button type=\"button\"  class=\"btn btn-info btn-sm tt detailRent\"  oid=\"{$dataOrderitem[$i]->oid}\" title='รายละเอียดการเช่า'>
                                                                            <i class=\"fas fa-file-alt\"></i>
                                                                        </button>
                                                                        <button type=\"button\"  class=\"btn btn-danger btn-sm tt del_btn\" oid=\"{$dataOrderitem[$i]->oid}\"  nameCus=\"{$dataOrderitem[$i]->nameCustomer}\" title='ลบข้อมูลการเช่า'>
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
                <div class="modal-header" style="background-color:#3E49BB">
                    <h4 class="modal-title" style="color:white">รายละเอียดการเช่า</h4>
                </div>

                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>ผู้เช่า : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="nameCustomer" value="นางสาวเอ มั่นคง" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>วันที่ยืม : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dateS" value="14/03/2563" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>วันที่คืน : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dateE" value="7" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>เบอร์โทร : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="Tel" value="0975472542" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>Email : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="Email" value="AAA@hotmail.com" maxlength="100" disabled>
                    </div>
                </div>
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

    <div id="modelEditHistory" class="modal fade">
        <form class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#eecc0b">
                    <h4 class="modal-title" style="color:white">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <div class="modal-body" id="addModalBody">

                    <div class="row mb-4" style="margin:20px;">
                        <div class="col-xl-4 col-12 text-right ">
                            <span>ผู้เช่า : </span>
                        </div>
                        <div class="col-xl-4 col-12">
                            <input type="text" class="form-control" id="dormittel" placeholder="นางสาวเอ มั่นคง" maxlength="100">
                        </div>
                    </div>
                    <div class="row mb-4" style="margin:20px;">
                        <div class="col-xl-4 col-12 text-right ">
                            <span>วันที่ยืม : </span>
                        </div>
                        <div class="col-xl-4 col-12">
                            <input type="text" class="form-control" id="dormittel" placeholder="14/03/2563" maxlength="100">
                        </div>
                    </div>
                    <div class="row mb-4" style="margin:20px;">
                        <div class="col-xl-4 col-12 text-right ">
                            <span>จำนวนวันที่ยืม : </span>
                        </div>
                        <div class="col-xl-4 col-12">
                            <input type="text" class="form-control" id="dormittel" placeholder="7" maxlength="100">
                        </div>
                    </div>
                    <div class="row mb-4" style="margin:20px;">
                        <div class="col-xl-4 col-12 text-right ">
                            <span>เบอร์โทร : </span>
                        </div>
                        <div class="col-xl-4 col-12">
                            <input type="text" class="form-control" id="dormittel" placeholder="0975472542" maxlength="100">
                        </div>
                    </div>
                    <div class="row mb-4" style="margin:20px;">
                        <div class="col-xl-4 col-12 text-right ">
                            <span>Email : </span>
                        </div>
                        <div class="col-xl-4 col-12">
                            <input type="text" class="form-control" id="dormittel" placeholder="AAA@hotmail.com" maxlength="100">
                        </div>
                    </div>


                    <input type="hidden" name="add">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">บันทึก</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
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
            var id = $(this).attr('oid');
            $.ajax('../route.php?action=tabeldetail', {
                data: {
                    oid: id
                },
                success: function(data, status, xhr) { // success callback function
                    var objOrder = JSON.parse(data);
                    $('#nameCustomer').val(objOrder[0].nameCustomer);
                    $('#dateS').val(objOrder[0].dateStart);
                    $('#dateE').val(objOrder[0].dateEnd);
                    $('#Tel').val(objOrder[0].tel);
                    $('#Email').val(objOrder[0].email);
                    $('#tableDetailOrder').html(objOrder[0].objDetailOrder);
                    console.log(objOrder);
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
            var id = $(this).attr('oid');
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
                            $.ajax('../route.php?action=deleteOrder', {
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
                    }
                });
        });
    });
</script>