<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php" ?>

    <?php require_once('query.php'); ?>
    <?php



    ?>

    <title>ร้านเช่าอุปกรณ์ตกแต่ง</title>
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
                <?php include "Topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- เริ่ม -->
                    <div>

                        <div class="row">
                            <div class="col-xl-12 col-8 mb-4">
                                <div class="card">
                                    <form class="user" action="Profile.php" method="post">
                                        <div class="card-body" style="text-align:center;">
                                            <div class=" row mb-4 ">
                                                <div class=" col-12 ">
                                                    <span class=" link-active " style=" font-size: 70px; color:pink;">WELCOME</span>
                                                    <br>
                                                    <img src="./img/ddd1.jpg" width="40%" height="100%">
                                                    <br>
                                                    <br>
                                                    <span style=" font-size: 25px; color:black;">ร้านเช่าอุปกรณ์ตกแต่ง </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- จบ -->

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
<?php include_once("modal.php") ?>

</html>

<script>
    function editfuser() {
        $("#modaladdsub").modal('show');
    }
</script>