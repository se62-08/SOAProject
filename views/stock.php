<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php" ?>
    <title>Sweet Home</title>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- อันนี้ไว้เรียกใช้แท็บข้างๆๆ -->
        <?php include "layout_user.php" ?>
        <?php include "helper_func.inc.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- อันนี้ไว้เรียกใช้แท็บบน -->
                <?php include "Topbar.php" ?>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5000 ชิ้น</div>
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
                                            <table class="table table-bordered" id="d" width="100%" cellspacing="0">

                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <td>ภาพสินค้า</td>
                                                        <th>หมวดหมู่</th>
                                                        <th>รหัสสินค้า</th>
                                                        <th>รายการ</th>

                                                        <th>ราคาชิ้นละ(บาท)ต่อวัน</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <td>ภาพสินค้า</td>
                                                        <th>หมวดหมู่</th>
                                                        <th>รหัสสินค้า</th>
                                                        <th>รายการ</th>

                                                        <th>ราคาชิ้นละ(บาท)ต่อวัน</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                    <tr style="text-align:center;">
                                                        <td>1</td>
                                                        <td>
                                                            <div class="product-image">
                                                                <img src="./img/mali.jpg" width="100" height="100" alt=images>
                                                            </div>
                                                        </td>
                                                        <td>ดอกไม้</td>
                                                        <td>001233</td>
                                                        <td>ดอกมะลิ</td>

                                                        <td>5</td>
                                                        <td style="text-align:center;">
                                                            <button type="button" id="editStock" class="btn btn-warning btn-sm tt " title='แก้ไขสินค้า'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="del_btn" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ลบสินค้า">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <tr style="text-align:center;">
                                                        <td>2</td>
                                                        <td>
                                                            <div class="product-image">
                                                                <img src="./img/Princess.jpg" width="100" height="100" alt=images>
                                                            </div>
                                                        </td>
                                                        <td>ธงลายการ์ตูน</td>
                                                        <td>00223</td>
                                                        <td>ธงลายเจ้าหญิง</td>

                                                        <td>15</td>
                                                        <td style="text-align:center;">
                                                            <button type="button" id="editStock" class="btn btn-warning btn-sm tt " title='แก้ไขสินค้า'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="btn_alt" class="btn btn-danger btn-sm tt " title='ลบสินค้า'>
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>

                                                        </td>
                                                    </tr>

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
        <form class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3E49BB">
                    <h4 class="modal-title" style="color:white">เพิ่มสินค้า</h4>
                </div>
                <div class="modal-body" id="addModalBody">

                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            รูปสินค้า
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <img src="./img/Add_Image.png" alt="images" style="width:100%;max-width:500px">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-12 col-12">
                                                    <!-- <input type="file" id="input_upload" style="display:none" /> -->
                                                    <button type="button" id="edit_photo" class="btn btn-primary btn-sm form-control mb-3">เพิ่มรูปสินค้า</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12 mb-4">
                            <div class="card">
                                <div class="card-header card-bg">
                                    รายละเอียดสินค้า
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>รหัสสินค้า</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>รายการ</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>หมวดหมู่</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <select class="form-control" id="cars">
                                                <option value="volvo">เลือกหมวดหมู่</option>
                                                <option value="volvo">ดอกไม้</option>
                                                <option value="saab">ธงลายการ์ตูน</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ราคาสินค้า(บาท)</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="">
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
        <form class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#eecc0b">
                    <h4 class="modal-title" style="color:white">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <div class="modal-body" id="addModalBody">

                    <div class="row">
                        <div class="col-xl-4 col-12 mb-4">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            รูปสินค้า
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <img src="./img/mali.jpg" alt="images" style="width:100%;max-width:500px">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-12 col-12">
                                                    <!-- <input type="file" id="input_upload" style="display:none" /> -->
                                                    <button type="button" id="edit_photo" class="btn btn-primary btn-sm form-control mb-3">เปลี่ยนรูปสินค้า</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12 mb-4">
                            <div class="card">
                                <div class="card-header card-bg">
                                    รายละเอียดสินค้า
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>รหัสสินค้า</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="" value="001233">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>รายการ</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="ดอกมะลิ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>หมวดหมู่</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <select class="form-control" id="cars">

                                                <option value="volvo">ดอกไม้</option>
                                                <option value="saab">ธงลายการ์ตูน</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ราคาสินค้า(บาท)</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="" value="5">
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
        $('#editStock').click(function() {
            $("#modelEditStock").modal();
        });
        $('#del_btn').click(function() {
            swal({
                    title: "คุณต้องการลบ",
                    text: "ดอกมะลิ หรือไม่ ?",
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
                            location.reload();
                        }, 1500);
                    } else {
                        swal("การลบไม่สำเร็จ");
                    }
                });
        });
    });
    $(document).ready(function() {
        console.log("ready!");
        $("#addStock").on('click', function() {
            $("#modalAddStock").modal('show');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
    // $(document).ready(function() {
    //     console.log("ready!");
    //     $("#editStock").on('click', function() {
    //         $("#modalEditStock").modal('show');
    //     });
    //     $('[data-toggle="tooltip"]').tooltip();
    // });
</script>