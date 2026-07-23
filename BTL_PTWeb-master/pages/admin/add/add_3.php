
<?php
$success = false;
$error = false;
    if (isset($_POST['submit'])) {
        $malop = $_POST['malop'];
        $tenlop = $_POST['tenlop '];
        $nienkhoa = $_POST['nienkhoa '];
        $siso = $_POST['siso'];
        $makhoa = $_POST['makhoa'];

    $sql = "INSERT INTO db_lopchuyennganh VALUES ('$malop','$tenlop','$nienkhoa','$siso','$makhoa')";
    $result = mysqli_query($conn,$sql);
    if($result){
            $success = true;
        }else {
            echo"Lỗi thực thi!";
        }
        if ($success) {
            header("Location: admin_dashboard.php?page=lopchuyennganh&status1=Thêm lớp chuyên ngành thành công!");
        } elseif ($error) {
            header("Location: admin_dashboard.php?page=lopchuyennganh&status2= Lớp chuyên ngành vừa thêm đã có trong danh sách!");
            exit();
    }
    }
    ?>

<div class="card">
    <h2>Quản lí sinh viên </h2>
    <div class="menu">
    <ul class="list_menu">
        <li><a href="admin_dashboard.php?page=sinhvien">Sinh viên</a></li>
        <li><a href="admin_dashboard.php?page=khoa">Khoa</a></li>
        <li><a href="admin_dashboard.php?page=lopchuyennganh">Lớp chuyên ngành</a></li>
        <li><a href="admin_dashboard.php?page=lophocphan">Lớp học phần</a></li>
        <li><a href="admin_dashboard.php?page=hocphan">Học phần</a></li>
    </ul>
    <ul class="list_output">
        <li><a href="">
            <i class='bx bxs-file-export' ></i>
            <span>Nhập dữ liệu từ file CSV</span>     
        </a></li>
        
        <li><a href="">
            <i class='bx bxs-file-import' ></i>
            <span>Xuất DSSV ra tệp PDF</span>
        </a></li>
    </ul>
</div>
<div class="list_tool">
    <div id="search">
        <form action="admin_dashboard.php?page=search" method="post">
            <input type="text" name="txtsearch">
            <input type="submit" name="search" value="Tìm kiếm " >
        </form>
    </div>
    <div class="add_node">
    <li >
        <a href="admin_dashboard.php?page=add_lopchuyennganh">
        <i class='bx bx-plus' ></i>
        <span>Thêm lớp chuyên ngành</span>
        </a>
    </li>
    </div>
</div>

    <div class="add">
        <h2>Thêm lớp chuyên ngành</h2>
        <form method="post">
            <label for="malop">Mã lớp</label>
            <input type="text" id="malop" name="malop" required><br>

            <label for="tenlop">Tên lớp</label>
            <input type="text" id="tenlop" name="tenlop" required><br>

            <label for="nienkhoa">Niên khóa</label>
            <input type="text" id="nienkhoa" name="nienkhoa" required><br>

            <label for="siso">Sĩ số</label>
            <input type="text" id="siso" name="siso" required><br>

            <label for="makhoa">Mã khoa</label>
            <input type="text" id="makhoa" name="makhoa" required><br>

            <input type="submit" name="submit" value="Thêm sinh viên">
        </form>
    </div>
</div>