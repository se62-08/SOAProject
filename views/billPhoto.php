<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../link.php" ?>
  <title>Bill</title>
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

          <form action="./route.php?action=billPhoto" method="POST">
          <!-- Content Row -->
          
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">โปรดกรอกข้อมูล</h6>
                </div>
                
                <div id="product-grid">
                
                  <!-- <div class="txt-heading"><h3>ข้อมูลการเช่าสินค้า<h3></div><br/> -->
                  <div class="customer-data">

                    <!-- <div class="customer-title">โปรดกรอกข้อมูล</div><br/> -->
                    <div class="modal-body" id="addModalBody">
                      <div class="container">
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
                            <input type="date" id="myDate" name="myDate" value="">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-xl-4 col-2 text-right ">
                            <label for="day">ระยะเวลาการเช่าสินค้า : </label>
                          </div>
                          <div class="col-xl-6 col-6 ">
                            <input type="number" class="customer-day" id="day" name="day" min="1" max="30" name="quantity" value="1" size="2">
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
                            <input type="text" name="e-mail">
                          </div>
                        </div>
                    
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ยอดที่ต้องชำระ</h6>
                </div>
                <div id="product-grid">
                  <!-- <div class="txt-heading"><h3>ข้อมูลการเช่าสินค้า<h3></div><br/> -->
                  <div class="customer-data">

                    <!-- <div class="customer-title">โปรดกรอกข้อมูล</div><br/> -->
                    <div class="modal-body" id="addModalBody">
                      <div class="container">
                        <div class="row mb-3">
                          <div class="col-xl-4 col-2 text-right ">
                            <label for="name">ราคารวมทั้งหมด : 2250 บาท</label>
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
                          <table class="table table-bordered" id="d" width="100%" cellspacing="0">
                          <colgroup>
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                          </colgroup>
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสสินค้า</th>
                              <th>สินค้า</th>
                              <th>ราคา/set</th>
                              <th>จำนวน (set)</th>
                              <th>ราคารวม</th>
                              <th>หมายเหตุ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            table2(9);
                            ?>
                          </tbody>
                          </table>
                          <!-- <img src="./img/a.jpg" width= “30” height=“50”> -->
                        </div>
                      </div>

                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="d" width="100%" cellspacing="0">
                          <colgroup>
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                                <col  width="100">
                          </colgroup>
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสช่างภาพ</th>
                              <th>ช่างภาพ</th>
                              <th>เรทราคา</th>
                              <th>ระยะเวลาการจ้างงาน</th>
                              <th>วันที่ต้องการถ่ายภาพ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            table2(10);
                            ?>
                          </tbody>
                          </table>
                          <!-- <img src="./img/a.jpg" width= “30” height=“50”> -->
                        </div>
                      </div>
                      <div class="row mb-3">
                              <div class="col-xl-5 col-2 text-right ">
                                <span>
                                  <a href=" ./photographer.php">
                                    <button type="button" id="btn_green" class="btn btn-success">
                                      ยืนยัน
                                    </button>
                                  </a>
                                </span>
                              </div>
                      </div>
              </div>
            </form> 
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
}