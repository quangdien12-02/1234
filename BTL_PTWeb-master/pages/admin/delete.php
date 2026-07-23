<?php
if (isset($_GET["masv"])) {
    $masv = trim($_GET["masv"]);
    $stmt = $conn->prepare("DELETE FROM db_sinhvien WHERE masv = ?");
    $stmt->bind_param("s", $masv);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=sinhvien&status1=" . urlencode("Xóa sinh viên thành công!"));
    } else {
        header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Xóa sinh viên thất bại!"));
    }
    exit();
}

if (isset($_GET["makhoa"])) {
    $makhoa = trim($_GET["makhoa"]);
    $stmt = $conn->prepare("DELETE FROM db_khoa WHERE makhoa = ?");
    $stmt->bind_param("s", $makhoa);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=khoa&status1=" . urlencode("Xóa khoa thành công!"));
    } else {
        header("Location: admin_dashboard.php?page=khoa&status2=" . urlencode("Xóa khoa thất bại!"));
    }
    exit();
}

if (isset($_GET["mahocphan"])) {
    $mahocphan = trim($_GET["mahocphan"]);
    $stmt = $conn->prepare("DELETE FROM db_hocphan WHERE mahocphan = ?");
    $stmt->bind_param("s", $mahocphan);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=hocphan&status1=" . urlencode("Xóa học phần thành công!"));
    } else {
        header("Location: admin_dashboard.php?page=hocphan&status2=" . urlencode("Xóa học phần thất bại!"));
    }
    exit();
}

header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Không tìm thấy dữ liệu cần xóa!"));
exit();
?>
