<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "link.php" ?>
  <title>Bill</title>
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
          <!-- <div bgcolor=“green” class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">สินค้าทั้งหมดที่ลูกค้าต้องการ</h1>
          </div> -->

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
            <form action="billPhoto.php.php" method="POST">
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
            </form>

            <form action="billPhoto.php" method="POST">
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
            </form>
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