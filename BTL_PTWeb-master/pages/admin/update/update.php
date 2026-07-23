<?php
$masv = trim($_GET["masv"] ?? "");

if ($masv === "") {
    header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Không tìm thấy mã sinh viên cần sửa!"));
    exit();
}

$query = $conn->prepare("SELECT * FROM db_sinhvien WHERE masv = ?");
$query->bind_param("s", $masv);
$query->execute();
$student = $query->get_result()->fetch_assoc();

if (!$student) {
    header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Sinh viên không tồn tại!"));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $holot = trim($_POST["holot"] ?? "");
    $ten = trim($_POST["ten"] ?? "");
    $malop = trim($_POST["malop"] ?? "");
    $dienthoai = trim($_POST["dienthoai"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($holot === "" || $ten === "" || $malop === "" || $dienthoai === "" || $email === "") {
        header("Location: admin_dashboard.php?page=fix&masv=" . urlencode($masv) . "&status2=" . urlencode("Vui lòng nhập đầy đủ thông tin!"));
        exit();
    }

    $stmt = $conn->prepare("UPDATE db_sinhvien SET holot = ?, ten = ?, malop = ?, dienthoai = ?, email = ? WHERE masv = ?");
    $stmt->bind_param("ssssss", $holot, $ten, $malop, $dienthoai, $email, $masv);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=sinhvien&status1=" . urlencode("Cập nhật thông tin sinh viên thành công!"));
    } else {
        header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Cập nhật thông tin sinh viên thất bại!"));
    }
    exit();
}
?>

<div class="card">
    <h2>Quản lý sinh viên Trường Đại học Mỏ - Địa chất</h2>
    <?php include(__DIR__ . "/../list_menu.php"); ?>

    <div class="update">
        <h2>Sửa thông tin sinh viên</h2>
        <?php if (isset($_GET["status2"])) { ?>
            <div class="status2"><p><?php echo h($_GET["status2"]); ?></p></div>
        <?php } ?>

        <form method="post">
            <label for="masv">Mã sinh viên</label>
            <input type="text" id="masv" name="masv" value="<?php echo h($student["masv"]); ?>" readonly>

            <label for="holot">Họ lót</label>
            <input type="text" id="holot" name="holot" value="<?php echo h($student["holot"]); ?>" required>

            <label for="ten">Tên</label>
            <input type="text" id="ten" name="ten" value="<?php echo h($student["ten"]); ?>" required>

            <label for="malop">Mã lớp</label>
            <input type="text" id="malop" name="malop" value="<?php echo h($student["malop"]); ?>" required>

            <label for="dienthoai">Điện thoại</label>
            <input type="text" id="dienthoai" name="dienthoai" value="<?php echo h($student["dienthoai"]); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo h($student["email"]); ?>" required>

            <input type="submit" name="update" value="Cập nhật">
        </form>
    </div>
</div>
