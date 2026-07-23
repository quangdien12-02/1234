<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $masv = trim($_POST["masv"] ?? "");
    $holot = trim($_POST["holot"] ?? "");
    $ten = trim($_POST["ten"] ?? "");
    $malop = trim($_POST["malop"] ?? "");
    $dienthoai = trim($_POST["dienthoai"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($masv === "" || $holot === "" || $ten === "" || $malop === "" || $dienthoai === "" || $email === "") {
        header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Vui lòng nhập đầy đủ thông tin sinh viên!"));
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO db_sinhvien (masv, holot, ten, malop, dienthoai, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $masv, $holot, $ten, $malop, $dienthoai, $email);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?page=sinhvien&status1=" . urlencode("Thêm sinh viên thành công!"));
    } else {
        header("Location: admin_dashboard.php?page=sinhvien&status2=" . urlencode("Không thêm được sinh viên. Mã sinh viên có thể đã tồn tại!"));
    }
    exit();
}
?>

<div class="card">
    <h2>Quản lý sinh viên Trường Đại học Mỏ - Địa chất</h2>
    <?php include(__DIR__ . "/../list_menu.php"); ?>

    <div class="add">
        <h2>Thêm sinh viên</h2>
        <form method="post">
            <label for="masv">Mã sinh viên</label>
            <input type="text" id="masv" name="masv" required>

            <label for="holot">Họ lót</label>
            <input type="text" id="holot" name="holot" required>

            <label for="ten">Tên</label>
            <input type="text" id="ten" name="ten" required>

            <label for="malop">Mã lớp</label>
            <input type="text" id="malop" name="malop" required>

            <label for="dienthoai">Điện thoại</label>
            <input type="text" id="dienthoai" name="dienthoai" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" name="submit" value="Thêm sinh viên">
        </form>
    </div>
</div>
