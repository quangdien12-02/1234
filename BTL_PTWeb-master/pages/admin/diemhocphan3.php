<?php
$result = $conn->query("SELECT * FROM db_diemhocphan3");
?>
<div class="card">
    <h2>Biểu đồ thống kê điểm học phần</h2>
    <?php
        include("list_char.php");
        ?>
    <h4> Thống kê môn cấu trúc dữ liệu & giải thuật (7080206)</h4>
    <div class="chart-info">
        
        <div class="table-chart">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã sinh viên</th>
                        <th>Mã học phần</th>
                        <th>Điểm A</th>
                        <th>Điểm B</th>
                        <th>Điểm C</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                    $i = 1;
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['masv']; ?></td>
                        <td><?php echo $row['mahocphan3']; ?></td>
                        <td><?php echo $row['a']; ?></td>
                        <td><?php echo $row['b']; ?></td>
                        <td><?php echo $row['c']; ?></td>
                        <td> note</td>
                        <td class="tool-content">
                            <li ><a class="fix-content" href="admin_dashboard.php?page=fix&masv=<?php echo $row['masv'] ?>">Sửa</a>
                            <li ><a class="delete-content" href="admin_dashboard.php?page=delete&masv=<?php echo $row['masv'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
            <canvas id="myPieChart"></canvas>
        </div>  
    </div>
</div>