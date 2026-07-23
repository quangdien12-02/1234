<?php
$success = false;
$error = false;
    if (isset($_POST['submit'])) {
        $malop = $_POST['malop'];
        $mahocphan = $_POST['mahocphan'];
        $nhom = $_POST['nhom '];
        $hocki = $_POST['hocki'];
        $namhoc = $_POST['namhoc'];

    $sql = "INSERT INTO db_lophocphan VALUES ('$malop','$mahocphan','$nhom','$hocki','$namhoc')";
    $result = mysqli_query($conn,$sql);
    if($result){
            $success = true;
        }else {
            echo"Lỗi thực thi!";
        }
        if ($success) {
            header("Location: admin_dashboard.php?page=lophocphan&status1=Thêm lớp học phần thành công!");
        } elseif ($error) {
            header("Location: admin_dashboard.php?page=lophocphan&status2= Lớp học phần vừa thêm đã có trong danh sách!");
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
        <a href="admin_dashboard.php?page=add_lophocphan">
        <i class='bx bx-plus' ></i>
        <span>Thêm lớp học phần</span>
        </a>
    </li>
    </div>
</div>

    <div class="add">
        <h2>Thêm lớp học phần</h2>
        <form method="post">
            <label for="masv">Mã sinh viên</label>
            <input type="text" id="masv" name="masv" required><br>

            <label for="holot">Họ lót</label>
            <input type="text" id="holot" name="holot" required><br>

            <label for="ten">Tên</label>
            <input type="text" id="ten" name="ten" required><br>

            <label for="malop">Mã lớp</label>
            <input type="text" id="malop" name="malop" required><br>

            <label for="dienthoai">Điện thoại</label>
            <input type="text" id="dienthoai" name="dienthoai" required><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" name="submit" value="Thêm sinh viên">
        </form>
    </div>
</div>