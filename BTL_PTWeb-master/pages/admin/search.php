<?php
$search = trim($_POST["txtsearch"] ?? $_GET["txtsearch"] ?? "");

if ($search !== "") {
    // Hạ chữ thường bằng LOWER() rồi so sánh theo collation utf8mb4_bin
    // để tìm kiếm KHÔNG phân biệt hoa/thường nhưng VẪN phân biệt dấu tiếng Việt.
    // (Nếu dùng LIKE mặc định với collation utf8mb4_unicode_ci, MySQL/MariaDB sẽ
    // coi "an" và "ần" là giống nhau nên tìm "An" ra luôn cả "Trần" -> gây lỗi như ảnh)
    $keyword = "%" . mb_strtolower($search, "UTF-8") . "%";
    $stmt = $conn->prepare(
        "SELECT * FROM db_sinhvien
         WHERE LOWER(masv) COLLATE utf8mb4_bin LIKE ?
            OR LOWER(holot) COLLATE utf8mb4_bin LIKE ?
            OR LOWER(ten) COLLATE utf8mb4_bin LIKE ?
            OR LOWER(malop) COLLATE utf8mb4_bin LIKE ?
            OR LOWER(dienthoai) COLLATE utf8mb4_bin LIKE ?
            OR LOWER(email) COLLATE utf8mb4_bin LIKE ?
         ORDER BY masv ASC"
    );
    $stmt->bind_param("ssssss", $keyword, $keyword, $keyword, $keyword, $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM db_sinhvien ORDER BY masv ASC");
}
?>

<div class="card">
    <h2>Quản lý sinh viên Trường Đại học Mỏ - Địa chất</h2>
    <?php include(__DIR__ . "/list_menu.php"); ?>

    <div class="content">
        <h4>Kết quả tìm kiếm<?php echo $search !== "" ? ": " . h($search) : ""; ?></h4>
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
