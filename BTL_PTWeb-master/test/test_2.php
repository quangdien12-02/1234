<?php
require_once "../../config/connect.php";

if (isset($_GET['masv'])) {
    $masv = $_GET['masv'];
    $query = "SELECT * FROM db_sinhvien WHERE masv='$masv'";
    $result = $conn->query($query);
    $student = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $masv = $_POST['masv'];
    $holot = $_POST['holot'];
    $ten = $_POST['ten'];
    $malop = $_POST['malop'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $c = $_POST['c'];
    $b = $_POST['b'];
    $a = $_POST['a'];

    $query = "UPDATE db_sinhvien SET holot='$holot', ten='$ten', malop='$malop', dienthoai='$dienthoai', email='$email', c='$c', b='$b', a='$a' WHERE masv='$masv'";
    if ($conn->query($query) === TRUE) {
        header("Location: sinhvien.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/test.css">
    <link rel="icon" href="../../image/logo.jpg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <div class="content">
        <div class="card">
            <h2>Sửa thông tin sinh viên</h2>
            <form action="edit_student.php" method="post">
                <input type="hidden" name="masv" value="<?php echo $student['masv']; ?>">
                <label for="holot">Họ lót:</label>
                <input type="text" id="holot" name="holot" value="<?php echo $student['holot']; ?>" required><br>

                <label for="ten">Tên:</label>
                <input type="text" id="ten" name="ten" value="<?php echo $student['ten']; ?>" required><br>

                <label for="malop">Mã lớp:</label>
                <input type="text" id="malop" name="malop" value="<?php echo $student['malop']; ?>" required><br>

                <label for="dienthoai">Điện thoại:</label>
                <input type="text" id="dienthoai" name="dienthoai" value="<?php echo $student['dienthoai']; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required><br>

                <label for="c">Điểm C:</label>
                <input type="text" id="c" name="c" value="<?php echo $student['c']; ?>" required><br>

                <label for="b">Điểm B:</label>
                <input type="text" id="b" name="b" value="<?php echo $student['b']; ?>" required><br>

                <label for="a">Điểm A:</label>
                <input type="text" id="a" name="a" value="<?php echo $student['a']; ?>" required><br>

                <input type="submit" name="update" value="Cập nhật">
            </form>
        </div>
    </div>
</body>
</html>