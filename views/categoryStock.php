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
                                            <div class="font-weight-bold  text-uppercase mb-1">หมวดหมู่สินค้า
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10 หมวดหมู่</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-12 mb-4">
                            <div class="card border-left-primary card-color-info shadow h-100 py-2" style=cursor:pointer; id="addCategory">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold  text-uppercase mb-1">เพิ่มหมวดหมู่สินค้า</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">+1 หมวดหมู่</div>
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
                            <h6 class="m-0 font-weight-bold text-primary">หมวดหมู่ทั้งหมด</h6>

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
                                                        <th>หมวดหมู่</th>
                                                        <th>จำนวนที่มี</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>จำนวนที่มี</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                    <tr style="text-align:center;">
                                                        <td>1</td>
                                                        <td>ดอกไม้</td>
                                                        <td>20</td>
                                                        <td>
                                                            <button type="button" id="editCategory" class="btn btn-warning btn-sm tt " title='แก้ไขหมวดหมู่'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="del_btn" class="btn btn-danger btn-sm tt " title='ลบหมวดหมู่'>
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <tr style="text-align:center;">
                                                        <td>2</td>
                                                        <td>ธงลายการ์ตูน</td>
                                                        <td>10</td>
                                                        <td>
                                                            <button type="button" id="btn_edit" class="btn btn-warning btn-sm tt " title='แก้ไขหมวดหมู่'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="btn_alt" class="btn btn-danger btn-sm tt " title='ลบหมวดหมู่'>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <div id="modalAddCategory" class="modal fade">
        <form class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3E49BB">
                    <h4 class="modal-title" style="color:white">เพิ่มหมวดหมู่</h4>
                </div>





                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>หมวดหมู่ :</span>
                        </div>
                        <div class="col-xl-8 col-12">
                            <input type="text" class="form-control" id="" name="" value="" placeholder="กรุณากรอกหมวดหมู่" maxlength="100">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">บันทึก</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
    <div id="modalEditCategory" class="modal fade">
        <form class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#eecc0b">
                    <h4 class="modal-title" style="color:white">แก้ไขหมวดหมู่</h4>
                </div>





                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>หมวดหมู่ :</span>
                        </div>
                        <div class="col-xl-8 col-12">
                            <input type="text" class="form-control" id="" name="" value="" placeholder="ดอกไม้" maxlength="100">
                        </div>
                    </div>









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
        $('#editCategory').click(function() {
            $("#modalEditCategory").modal();
        });
        console.log("ready!");
        $("#addCategory").on('click', function() {
            $("#modalAddCategory").modal('show');
        });
        $('[data-toggle="tooltip"]').tooltip();
        $('#del_btn').click(function() {
            swal({
                    title: "คุณต้องการลบ",
                    text: "ดอกไม้หรือไม่ ?",
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
</script>