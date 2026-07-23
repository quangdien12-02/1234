<?php
$page = $_GET["page"] ?? "admin_home";

if ($page == "admin_home") {
    include("admin/admin_home.php");
} elseif ($page == "quanlisv" || $page == "sinhvien") {
    include("admin/sinhvien.php");
} elseif ($page == "thongke") {
    include("admin/diemhocphan.php");
} elseif ($page == "khoa") {
    include("admin/khoa.php");
} elseif ($page == "lopchuyennganh") {
    include("admin/lopchuyennganh.php");
} elseif ($page == "lophocphan") {
    include("admin/lophocphan.php");
} elseif ($page == "hocphan") {
    include("admin/hocphan.php");
} elseif ($page == "diemhocphan") {
    include("admin/diemhocphan.php");
} elseif ($page == "diemhocphan1") {
    include("admin/diemhocphan1.php");
} elseif ($page == "diemhocphan2") {
    include("admin/diemhocphan2.php");
} elseif ($page == "diemhocphan3") {
    include("admin/diemhocphan3.php");
} elseif ($page == "search") {
    include("admin/search.php");
} elseif ($page == "add_sinhvien") {
    include("admin/add/add_1.php");
} elseif ($page == "add_khoa") {
    include("admin/add/add_2.php");
} elseif ($page == "add_lopchuyennganh") {
    include("admin/add/add_3.php");
} elseif ($page == "add_lophocphan") {
    include("admin/add/add_4.php");
} elseif ($page == "add_hocphan") {
    include("admin/add/add_5.php");
} elseif ($page == "add_diemhocphan") {
    include("admin/add/add_6.php");
} elseif ($page == "fix") {
    include("admin/update/update.php");
} elseif ($page == "delete") {
    include("admin/delete.php");
} else {
    include("admin/admin_home.php");
}
?>
