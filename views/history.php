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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2 รายการ</div>
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
                                                        <th>วันที่</th>
                                                        <th>หมายเลขคำสั่ง</th>
                                                        <th>ราคา(บาท)</th>
                                                        <th>รายละเอียด</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>วันที่</th>
                                                        <th>หมายเลขคำสั่ง</th>
                                                        <th>ราคา(บาท)</th>
                                                        <th>รายละเอียด</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                    <tr style="text-align:center;">
                                                        <td>1</td>
                                                        <td>14/03/2563</td>
                                                        <td>RD00001</td>
                                                        <td>500</td>
                                                        <td>
                                                            <button type="button" id="detailRent" class="btn btn-info btn-sm tt " title='รายละเอียดการเช่า'>
                                                                <i class="fas fa-file-alt"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" id="editHistory" class="btn btn-warning btn-sm tt " title='แก้ไขรายละเอียด'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="del_btn" class="btn btn-danger btn-sm tt " title='ลบข้อมูลการเช่า'>
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <tr style="text-align:center;">
                                                        <td>2</td>
                                                        <td>10/03/2563</td>
                                                        <td>RD00002</td>
                                                        <td>1000</td>
                                                        <td>
                                                            <button type="button" id="btn_edit" class="btn btn-info btn-sm tt " title='รายละเอียดการเช่า'>
                                                                <i class="fas fa-file-alt"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" id="btn_edit" class="btn btn-warning btn-sm tt " title='แก้ไขรายละเอียด'>
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="btn_alt" class="btn btn-danger btn-sm tt " title='ลบข้อมูลการเช่า'>
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
                        <input type="text" class="form-control" id="dormittel" value="นางสาวเอ มั่นคง" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>วันที่ยืม : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dormittel" value="14/03/2563" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>จำนวนวันที่ยืม : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dormittel" value="7" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>เบอร์โทร : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dormittel" value="0975472542" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4" style="margin:20px;">
                    <div class="col-xl-4 col-12 text-right ">
                        <span>Email : </span>
                    </div>
                    <div class="col-xl-4 col-12">
                        <input type="text" class="form-control" id="dormittel" value="AAA@hotmail.com" maxlength="100" disabled>
                    </div>
                </div>
                <div class="row mb-4 " style=" margin:20px;">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th rowspan="1" colspan="1">ลำดับ</th>
                                    <th rowspan="1" colspan="1">รายการสินค้า</th>
                                    <th rowspan="1" colspan="1">ราคาต่อชิ้น(บาท)</th>
                                    <th rowspan="1" colspan="1">จำนวน</th>
                                    <th rowspan="1" colspan="1">ราคา(บาท)</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr role="row">
                                    <td>1</td>
                                    <td>ดอกมะลิ</td>
                                    <td>5</td>
                                    <td>100
                                    </td>
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
        $('#detailRent').click(function() {
            $("#modelDetail").modal();
        });

        $('#editHistory').click(function() {
            $("#modelEditHistory").modal();
        });
        $('#del_btn').click(function() {
            swal({
                    title: "คุณต้องการลบ",
                    text: "RD00001 หรือไม่ ?",
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