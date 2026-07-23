<?php
$result = $conn->query("SELECT * FROM db_sinhvien ORDER BY masv ASC");
?>

<div class="card">
    <h2>Quản lý sinh viên Trường Đại học Mỏ - Địa chất</h2>
    <?php include(__DIR__ . "/list_menu.php"); ?>

    <div class="content">
        <div class="status1">
            <?php if (isset($_GET["status1"])) { ?>
                <p><?php echo h($_GET["status1"]); ?></p>
            <?php } ?>
        </div>
        <div class="status2">
            <?php if (isset($_GET["status2"])) { ?>
                <p><?php echo h($_GET["status2"]); ?></p>
            <?php } ?>
        </div>

        <h4>Danh sách sinh viên</h4>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Họ lót</th>
                    <th>Tên</th>
                    <th>Mã lớp</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo h($row["masv"]); ?></td>
                        <td><?php echo h($row["holot"]); ?></td>
                        <td><?php echo h($row["ten"]); ?></td>
                        <td><?php echo h($row["malop"]); ?></td>
                        <td><?php echo h($row["dienthoai"]); ?></td>
                        <td><?php echo h($row["email"]); ?></td>
                        <td class="tool-content">
                            <li><a class="fix-content" href="admin_dashboard.php?page=fix&masv=<?php echo urlencode($row["masv"]); ?>">Sửa</a></li>
                            <li><a class="delete-content" href="admin_dashboard.php?page=delete&masv=<?php echo urlencode($row["masv"]); ?>" onclick="return confirm('Bạn có chắc muốn xoá sinh viên này?');">Xóa</a></li>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
