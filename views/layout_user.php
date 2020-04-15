<style>
    body {
        margin: 0 auto;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 800px;
        margin: 0 auto;
        color: #000;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    span,
    p,
    label,
    div {
        font-family: 'Kanit', sans-serif;

    }

    .fc-content {
        color: white;
    }

    .fc-day-number {
        color: #000000
    }

    #accordionSidebar {
        background-color: #3E49BB;
    }

    #calendar {
        max-width: 700px;
        margin: 0 auto;
    }

    #home {

        background-color: white;
        max-width: 700px;
    }

    #menu1 {
        background-color: white;
        max-width: auto;
    }

    .dot {
        height: 25px;
        width: 25px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .bg-gradient-dangerAAAA {
        background-color: #FF3366;
        background-image: linear-gradient(180deg, #FF3366 10%, #FFA07A 100%);
        background-size: cover;
    }
</style>
<ul class="navbar-nav bg-gradient-dangerAAAA sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-parachute-box"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ร้านเช่าอุปกรณ์ตกแต่ง</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Order -->
    <li class="nav-item active">
        <a class="nav-link" href="home.php">
            <div style="text-align: center">
                <i class="fas fa-home"></i>
                <span>หน้าหลัก</span>
            </div>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Detail order -->
    <li class="nav-item active">
        <a class="nav-link" href="../route.php?action=cart">
            <div style="text-align: center">
                <i class="fas fa-shopping-cart"></i>
                <span>ทำรายการเช่าสินค้า</span>
            </div>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="../route.php?action=history">
            <div style="text-align: center">
                <i class="far fa-list-alt"></i>
                <span>ประวัติการเช่าสินค้า</span>
            </div>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="../route.php?action=category">
            <div style="text-align: center">
                <i class="fas fa-boxes"></i>
                <span>หมวดหมู่สินค้า</span>
            </div>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="stock.php">
            <div style="text-align: center">
                <i class="fas fa-archive"></i>
                <span>รายการสินค้า</span>
            </div>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="photographer.php">
            <div style="text-align: center">
                <i class="fas fa-archive"></i>
                <span>สินค้า&ช่างภาพ</span>
            </div>
        </a>
    </li>
    <hr class="sidebar-divider">
</ul>