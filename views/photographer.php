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
            <h1 class="h3 mb-0 text-gray-800">"Wedding" & Photographer</h1>
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
            <div class="row">

<div class="col-xl-3 col-12 mb-4">

    <div class="card border-left-primary card-color-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="font-weight-bold  text-uppercase mb-1">รายการเช่า</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">50 รายการ</div>
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
                    <div class="font-weight-bold  text-uppercase mb-1">เพิ่มรายการเช่า</div>
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
              <h6 class="m-0 font-weight-bold text-primary">Product</h6>
            </div>
            <form action="./route.php?action=photographer" method="POST">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="d" width="100%" cellspacing="0">
                    <colgroup>
                      <col width="100">
                      <col width="100">
                      <col width="100">
                      <col width="100">
                      <col width="100">
                      <col width="100">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชุดแต่งงาน</th>
                        <th>ชื่อช่างภาพ</th>
                        <th>รูปแบบการเช่า</th>
                        <th>ราคารวม</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชุดแต่งงาน</th>
                        <th>ชื่อช่างภาพ</th>
                        <th>รูปแบบการเช่า</th>
                        <th>ราคารวม</th>
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



</body>

</html>

<?php
function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
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
}
