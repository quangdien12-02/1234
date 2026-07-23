<?php
ob_start();
session_start();
require_once("../config/connect.php");

if (
    !isset($_SESSION["username"]) ||
    !isset($_SESSION["password"]) ||
    !isset($_SESSION["masv"]) ||
    !isset($_SESSION["role"]) ||
    $_SESSION["role"] !== "admin"
) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/chart1.js"></script>
    <title>HUMG | Admin Dashboard</title>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <nav class="list_sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="bx bx-menu"></i>
                        <span class="nav-item">MENU</span>
                    </a>
                </li>

                <li>
                    <a href="admin_dashboard.php?page=admin_home">
                        <i class="bx bxs-home"></i>
                        <span class="nav-item">Trang chủ</span>
                    </a>
                </li>

                <li>
                    <a href="admin_dashboard.php?page=sinhvien">
                        <i class="bx bx-table"></i>
                        <span class="nav-item">Sinh viên</span>
                    </a>
                </li>

                <li>
                    <a href="admin_dashboard.php?page=thongke">
                        <i class="bx bx-bar-chart-alt-2"></i>
                        <span class="nav-item">Thống kê</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-bell"></i>
                        <span class="nav-item">Thông báo</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-cog"></i>
                        <span class="nav-item">Cài đặt</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-help-circle"></i>
                        <span class="nav-item">Trợ giúp</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php" class="logout">
                        <i class="bx bx-log-out"></i>
                        <span class="nav-item">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <?php include "load_page.php"; ?>
    </div>
</div>
</body>
</html>
