<?php
session_start();
$datatypedress = $_SESSION['typedress'];
$datadress = $_SESSION['dress'];

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


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ทำรายการเช่าสินค้า</h6>
                        </div>
                        <form action="./route.php?action=cartOrder" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <center>
                                        <table class="table table-bordered" id="tableOrderAll" style="text-align:center;" width="80%" cellspacing="0">

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
                                        <button type="button" id="btn_green" class="btn btn-success btnconfirm">
                                            ยืนยัน
                                        </button>

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
                            <label for="category" style="font-size: 20px">ชนิดของชุดแต่งงาน : </label>

                            <select id="category">
                                <option value="0">ทั้งหมด</option>
                                <?php
                                for ($i = 0; $i < count($datatypedress); $i++) {
                                    echo " <option value=\"{$datatypedress[$i]->id_type}\">{$datatypedress[$i]->type}</option>";
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
                            for ($i = 0; $i < count($datadress); $i++) {
                                echo  "<div class=\"col-3 mx-auto\" style=\"margin-top: 40px\">
                                            <div class=\"text-center\">
                                            <div class=\"product-item\">
                                                <div class=\"product-image\">
                                                <img src=\"../image/dressPic/{$datadress[$i]->photo}\" width=\"220\" height=\"230\" alt=images>
                                                </div>
                                                <div class=\"product-title-footer\">
                                                <div class=\"product-title\">{$datadress[$i]->design->design} {$datadress[$i]->color->color} </div>
                                                <div class=\"product-title\">หมวด {$datadress[$i]->type->type} ชนิดผ้า {$datadress[$i]->texture->texture}</div>
                                                <div class=\"product-title\">{$datadress[$i]->price} บาท จำนวน {$datadress[$i]->amount}</div>
                                                <div class=\"cart-action\">
                                                    <input type=\"number\" class=\"product-quantity\" id=\"numdess_{$datadress[$i]->id_dress}\" min=\"1\" max=\"100\" value=\"1\" size=\"2\">
                                                    <button class=\"btnaddproduct\" dressid=\"{$datadress[$i]->id_dress}\">Add to cart</button>
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
            var x = $(this).attr('dressid');
            var num = $("#numdess_" + x).val();
            $.ajax('../route.php?action=addDress', {
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
        $(document).on("click", ".btnconfirm", function() {
            var tbl = $('#tableOrderAll tr:has(td)').map(function(i, v) {
                var $td = $('td', this);
                return {
                    id: $td.eq(1).text(),
                    amount: $td.eq(3).text()
                }
            }).get();
            $.ajax('../route.php?action=confirmOrderDress', {
                data: {
                    data: tbl
                },
                success: function(data, status, xhr) { // success callback function
                    window.location.replace('./weddingbill.php');
                },
                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                    alert(errorMessage);
                }
            });

        });
        $("#category").change(function() {
            var x = $(this).val();
            $.ajax('../route.php?action=refreshType', {
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
