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
              <h6 class="m-0 font-weight-bold text-primary">ทำรายการเช่าสินค้า</h6>
            </div>
            <form action="./route.php?action=cartOrder" method="post">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <table class="table table-bordered" id="d" style="text-align:center;" width="80%" cellspacing="0">

                      <thead>
                        <tr>
                          <th>ภาพสินค้า</th>
                          <th>รายการ</th>
                          <th>จำนวน</th>
                          <th>ราคาเช่าต่อชิ้น(บาท)</th>
                          <th>ราคาเช่ารวม(บาท)</th>
                          <th>การจัดการ</th>
                        </tr>
                      </thead>

                      <tbody id="tableOrder">

                      </tbody>
                    </table>
                  </center>
                  <!-- <img src="./img/a.jpg" width= “30” height=“50”> -->
                  <span>

                    <a href=" ./bill.php">
                      <button type="button" id="btn_green" class="btn btn-success">
                        ยืนยัน
                      </button>
                    </a>

                  </span>

                </div>
              </div>
            </form>
          </div>



          <div class="card shadow mb-4">
            <div class="card">
              <div class="card-header card-bg ">
                <span class="m-0 font-weight-bold text-primary">สินค้า</span>
              </div>
              <form action="./route.php?action=category" method="post">
            </div>

            <div class="card-body">
              <label for="category" style="font-size: 20px">หมวดหมู่สินค้า : </label>

              <select id="category">
                <option value="0">ทั้งหมด</option>
                <?php
                for ($i = 0; $i < count($datacategory); $i++) {
                  echo " <option value=\"{$datacategory[$i]->cid}\">{$datacategory[$i]->cname}</option>";
                }
                ?>
              </select>
            </div>

            </form>

            <div id="product-grid">
              <div class="txt-heading">
                <h2>Products<h2>
              </div>
            </div>

            <div class="row" id="tableProduct">
              <!-- <button onclick="refreshproduct(1)">Add to cart</button> -->
              <?php
              for ($i = 0; $i < count($dataequipment); $i++) {
                echo  "<div class=\"col-3 mx-auto\" style=\"margin-top: 40px\">
                    <div class=\"text-center\">
                      <div class=\"product-item\">
                        <div class=\"product-image\">
                          <img src=\"../{$dataequipment[$i]->pathpic}\" width=\"220\" height=\"230\" alt=images>
                        </div>
                        <div class=\"product-title-footer\">
                          <div class=\"product-title\">{$dataequipment[$i]->ename}</div>
                          <div class=\"product-title\">หมวด {$dataequipment[$i]->category->cname}</div>
                          <div class=\"product-title\">{$dataequipment[$i]->price} บาท</div>
                          <div class=\"cart-action\">
                            <input type=\"number\" class=\"product-quantity\" id=\"numequipment_{$dataequipment[$i]->eid}\" min=\"1\" max=\"100\" value=\"1\" size=\"2\">
                            <button class=\"btnaddproduct\" eid=\"{$dataequipment[$i]->eid}\">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";
              }
              ?>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script>
    $(document).on("click", ".btnaddproduct", function() {
      var x = $(this).attr('eid');
      var num = $("#numequipment_" + x).val();
      $.ajax('../route.php?action=addequipment', {
        data: {
          data: x,
          amount: num
        },
        success: function(data, status, xhr) { // success callback function
          $("#tableOrder").append(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          alert(errorMessage);
        }
      });
    });
    $(document).on("click", ".btndel", function() {
      $(this).parent().parent().remove();
    });
    $("#category").change(function() {
      var x = $(this).val();
      $.ajax('../route.php?action=refreshcategory', {
        data: {
          data: x
        },
        success: function(data, status, xhr) { // success callback function
          $('#tableProduct').html(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          alert(errorMessage);
        }
      });
    });
  </script>


</body>

</html>

<?php
function table2(int $column, $border = 1, $cellpadding = 1, $cellspacing = 1)
{
  if ($column == 4) {
?>
    <tr>
      <td><?php echo "1"; ?></td>
      <td><?php echo "<img src=\"../image/a.jpg\" width= \"70\" height=\"80\" >" ?></td>
      <td><?php echo "000123"; ?></td>
      <td><?php echo "แจกัน"; ?></td>
      <td><?php echo "2"; ?></td>
      <td><?php echo "5"; ?></td>
      <td><?php echo "10"; ?></td>
      <td style="text-align:center;">
        <button type="button" onclick="delfunction()" id="delete" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ยกเลิก">
          <i class="far fa-trash-alt"></i>
        </button>

      </td>
    </tr>
<?php
  }
}
