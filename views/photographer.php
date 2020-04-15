<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../link.php" ?>
  <title>Photographer</title>
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
            <h1 class="h3 mb-0 text-gray-800">Wedding & Photographer</h1>
          </div>
          <div class="row">
            <div class="col-xl-3 col-12 mb-4">

              <div class="card border-left-primary card-color-info shadow h-100 py-2" style=cursor:pointer;>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold  text-uppercase mb-1">จำนวนรายการเช่า</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">5 รายการ </div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-plus-square fa-2x"></i>
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
                      <div class="font-weight-bold  text-uppercase mb-1">เพิ่มรายการเช่า</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">+1 รายการ</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-plus-square fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ตัวอย่างและตำแหน่งของ card -->
        <!-- <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

        <!-- Content Row -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Prewedding & Photographer</h6>
          </div>
          <form action="./route.php?action=photographer" method="POST">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="d" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ผู้เช่าบริการ</th>
                      <th>ชุดแต่งงาน</th>
                      <th>ช่างภาพ</th>
                      <th>รูปแบบการเช่า</th>
                      <th>ราคา</th>
                      <th>วันที่เช่า</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ผู้เช่าบริการ</th>
                      <th>ชุดแต่งงาน</th>
                      <th>ช่างภาพ</th>
                      <th>รูปแบบการเช่า</th>
                      <th>ราคา</th>
                      <th>วันที่เช่า</th>
                      <th>จัดการ</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    table2(5);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <br /><br />

        </div>
      </div>

      <br /><br />

    </div>

    <br /><br />

    </form>



  </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->


  </div>
  <!-- End of Content Wrapper -->
  <div id="modalAddStock" class="modal fade">
    <form class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#3E49BB">
          <h4 class="modal-title" style="color:white">เพิ่มสินค้า</h4>
        </div>
        <div class="modal-body" id="addModalBody">

          <div class="row">

            <div class="col-xl-12 col-12 mb-4">
              <div class="card">

                <div class="card-body">

                  <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                      <div class="col-xl-3 col-12 text-right">
                        <span>ผู้เช่ารายการ</span>
                      </div>
                      <div class="col-xl-8 col-12">
                        <input type="text" class="form-control" id="" name="cname" value="" placeholder="กรุณาชื่อผู้เช่า" maxlength="100">
                      </div>
                    </div>

                  </div>
                  <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                      <span>ชุดแต่งงาน</span>
                    </div>
                    <div class="col-xl-9 col-12">
                      <select class="form-control" id="cars">
                        <option value="volvo">เลือกชุดแต่งงาน</option>
                        <option value="volvo">ชุด A ราคา 500 บาท</option>
                        <option value="saab">ชุด B ราคา 300 บาท</option>
                      </select>
                    </div>
                  </div>


                  <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                      <span>ช่างภาพ</span>
                    </div>
                    <div class="col-xl-9 col-12">
                      <select class="form-control" id="cars">
                        <option value="volvo">เลือกช่างภาพ</option>
                        <option value="volvo">นายคาเดี้ยน คาเมร่า </option>
                        <option value="saab">นางสาวมั่งมี ศรีสุข</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                  <div class="col-xl-3 col-12 text-right">
                      <span>รูปแบบการเช่า</span>
                    </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                  <div class="col-xl-3 col-12 text-right">
                      <span>วันที่ทำการเช่า</span>
                    </div>
                    <div class="col-xl-6 col-6 ">
                            <input type="date" id="myDate" name="myDate" value="">
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

  </div>

  <div id="modalEditStock" class="modal fade">
    <form class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#3E49BB">
          <h4 class="modal-title" style="color:white">เพิ่มสินค้า</h4>
        </div>
        <div class="modal-body" id="addModalBody">

          <div class="row">

            <div class="col-xl-12 col-12 mb-4">
              <div class="card">

                <div class="card-body">

                  <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                      <div class="col-xl-3 col-12 text-right">
                        <span>ผู้เช่ารายการ</span>
                      </div>
                      <div class="col-xl-8 col-12">
                        <input type="text" class="form-control" id="" name="cname" value="" placeholder="นายโปแมน แสนดี" maxlength="100">
                      </div>
                    </div>

                  </div>
                  <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                      <span>ชุดแต่งงาน</span>
                    </div>
                    <div class="col-xl-9 col-12">
                      <select class="form-control" id="cars">
                        <option value="volvo">เลือกชุดแต่งงาน</option>
                        <option value="volvo">ชุด A ราคา 500 บาท</option>
                        <option value="saab">ชุด B ราคา 300 บาท</option>
                      </select>
                    </div>
                  </div>


                  <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                      <span>ช่างภาพ</span>
                    </div>
                    <div class="col-xl-9 col-12">
                      <select class="form-control" id="cars">
                        <option value="volvo">เลือกช่างภาพ</option>
                        <option value="volvo">นายคาเดี้ยน คาเมร่า </option>
                        <option value="saab">นางสาวมั่งมี ศรีสุข</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-4">
                  <div class="col-xl-3 col-12 text-right">
                      <span>รูปแบบการเช่า</span>
                    </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"checkdate="true">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" >
                        <label class="form-check-label" for="inlineCheckbox2">2 </label>
                      </div>
                    </div>
                    <div class="row mb-4">
                  <div class="col-xl-3 col-12 text-right">
                      <span>วันที่ทำการเช่า</span>
                    </div>
                    <div class="col-xl-6 col-6 ">
                            <input type="date" id="myDate" name="myDate" value="">
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

  </div>
  <!-- End of Page Wrapper -->

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
      $("#modalEditStock").modal();
    });
    console.log("ready!");
    $("#addStock").on('click', function() {
      $("#modalAddStock").modal('show');
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('#del_btn').click(function() {
      swal({
          title: "คุณต้องการลบ",
          text: "รายการนี้หรือไม่ ?",
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
<?php
function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
  if ($column == 5) {
?>
    <tr>
      <td><?php echo "1"; ?></td>
      <td><?php echo "นายโปแมน แสนดี"; ?></td>
      <td>
        <div class="product-image">
          <img src="../image/pre1.jpg" width="100" height="100" alt=images>
        </div>
      </td>
      <td><?php echo "นายคาเดี้ยน คาเมร่า"; ?></td>
      <td><?php echo "ครึ่งวัน"; ?></td>
      <td><?php echo "6500"; ?></td>
      <td><?php echo "03/04/2020"; ?></td>
      <td style="text-align:center;">
        <button type="button" id="editStock" class="btn btn-warning btn-sm tt " title='แก้ไขรายการ'>
          <i class="fas fa-edit"></i>
        </button>
        <button type="button" id="del_btn" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ลบรายการ">
          <i class="far fa-trash-alt"></i>
        </button>
      </td>
    </tr>
<?php
  }
}
