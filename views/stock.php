<?php
session_start();
$datacategory = $_SESSION['datacategory'];
$dataequipment = $_SESSION['dataequipment'];
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
                                            <div class="font-weight-bold  text-uppercase mb-1">รายการสินค้า</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataequipment) ?> ชิ้น</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-12 mb-4">

                            <div class="card border-left-primary card-color-info shadow h-100 py-2" style=cursor:pointer; id="addStock">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold  text-uppercase mb-1">เพิ่มสินค้า</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">+1 รายการ </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-plus-square fa-2x"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">สินค้าทั้งหมด</h6>
                        </div>



                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row center">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered myTable" id="d" width="100%" cellspacing="0">

                                                <thead>
                                                    <tr style="text-align:center;">
                                                        <th>ลำดับ</th>
                                                        <td>ภาพสินค้า</td>
                                                        <th>ชื่ออุปกรณ์</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>ราคาเช่าต่อวัน</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($dataequipment); $i++) {
                                                        $num = $i + 1;
                                                        echo " <tr style=\"text-align:center;\">
                                                                    <td>$num</td>
                                                                    <td>
                                                                        <div class=\"product-image\">
                                                                            <img src=\"../{$dataequipment[$i]->pathpic}\" width=\"100\" height=\"100\" alt=images>
                                                                        </div>
                                                                    </td>
                                                                    <td>{$dataequipment[$i]->ename}</td>
                                                                    <td>{$dataequipment[$i]->category->cname}</td>

                                                                    <td>{$dataequipment[$i]->price}</td>
                                                                    <td style=\"text-align:center;\">
                                                                        <button type=\"button\"  class=\"btn btn-warning btn-sm tt editStock\" eid=\"{$dataequipment[$i]->eid}\" title='แก้ไขสินค้า'>
                                                                            <i class=\"fas fa-edit\"></i>
                                                                        </button>
                                                                        <button type=\"button\"  class=\"btn btn-danger btn-sm btndel del_btn\" eid=\"{$dataequipment[$i]->eid}\" ename=\"{$dataequipment[$i]->ename}\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"ลบสินค้า\">
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
            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <div id="modalAddStock" class="modal fade">
        <form class="modal-dialog modal-lg " action="../route.php?action=addequipment2" enctype="multipart/form-data" method="post">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3E49BB">
                    <h4 class="modal-title" style="color:white">เพิ่มสินค้า</h4>
                </div>
                <div class="modal-body" id="addModalBody">
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>ชื่อ</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <input type="text" class="form-control" name="ename">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>หมวดหมู่</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <select class="form-control" name="category">
                                        <?php
                                        for ($i = 0; $i < count($datacategory); $i++) {
                                            echo " <option value=\"{$datacategory[$i]->cid}\">{$datacategory[$i]->cname}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>ราคาสินค้า(บาท)</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>เพิ่มรูปอุปกรณ์ :</span>
                                </div>
                                <div class="col-xl-8 col-12">
                                    <div class=" upload-content">
                                        <div class="main-section">
                                            <div class="file-loading">
                                                <input id="file" type="file" name="file" multiple="" class="file" data-overwrite-initial="false" data-min-file-count="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <div id="modelEditStock" class="modal fade">
        <form class="modal-dialog modal-lg " action="../route.php?action=updateEquipment" enctype="multipart/form-data" method="post">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#eecc0b">
                    <h4 class="modal-title" style="color:white">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <div class="modal-body" id="addModalBody">

                    <div class="row">

                        <div class="col-xl-12 col-12 mb-4">
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>ชื่อ</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <input type="text" class="form-control" id="ename" name="ename">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>หมวดหมู่</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <select class="form-control" id="category" name="category">
                                        <?php
                                        for ($i = 0; $i < count($datacategory); $i++) {
                                            echo " <option value=\"{$datacategory[$i]->cid}\">{$datacategory[$i]->cname}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>ราคาสินค้า(บาท)</span>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <input type="text" class="form-control" id="price" name="price">
                                    <input type="hidden" class="form-control" id="eid" name="eid" value="">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-12 text-right">
                                    <span>เพิ่มรูปอุปกรณ์ :</span>
                                </div>
                                <div class="col-xl-8 col-12">
                                    <div class=" upload-content">
                                        <div class="main-section">
                                            <div class="file-loading">
                                                <input type="file" name="file" multiple="" class="file" data-overwrite-initial="false" data-min-file-count="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
        $(document).on("click", ".editStock", function() {
            var id = $(this).attr('eid');
            $.ajax('../route.php?action=getinfoeditStock', {
                data: {
                    eid: id
                },
                success: function(data, status, xhr) { // success callback function
                    var obj = JSON.parse(data);
                    $('#ename').val(obj[0].ename);
                    $('#category').val(obj[0].category.cid);
                    $('#price').val(obj[0].price);
                    $('#eid').val(obj[0].eid);
                    $("#modelEditStock").modal();
                },
                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                    alert(errorMessage);
                }
            });

        });
        $(document).on("click", ".del_btn", function() {
            var id = $(this).attr('eid');
            var ename = $(this).attr('ename');
            swal({
                    title: "คุณต้องการลบ",
                    text: ename + " หรือไม่ ?",
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
                        // delete_1(uid);
                        setTimeout(function() {
                            $.ajax('../route.php?action=deleteStock', {
                                data: {
                                    eid: id
                                },
                                success: function(data, status, xhr) { // success callback function
                                    window.location.replace('../route.php?action=stock');
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
    $(document).ready(function() {

        $("#addStock").on('click', function() {
            $("#modalAddStock").modal('show');
        });
        $('[data-toggle="tooltip"]').tooltip();

    });
</script>