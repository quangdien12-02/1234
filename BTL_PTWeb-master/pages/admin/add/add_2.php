<?php
$success = false;
$error = false;
    if (isset($_POST['submit'])) {
        $makhoa = $_POST['makhoa'];
        $tenkhoa = $_POST['tenkhoa'];
        $dienthoai = $_POST['dienthoai'];

    $sql = "INSERT INTO db_khoa VALUES ('$makhoa','$tenkhoa','$makhoa')";
    $result = mysqli_query($conn,$sql);
    if($result){
            $success = true;
        }else {
            echo"Lỗi thực thi!";
        }
        if ($success) {
            header("Location: admin_dashboard.php?page=khoa&status1=Thêm Khoa thành công!");
        } elseif ($error) {
            header("Location: admin_dashboard.php?page=khoa&status2= Khoa vừa thêm đã có trong danh sách!");
            exit();
        } else  {
            header("Location: admin_dashboard.php?page=sinhvien&status2=Mã khoa của bạn nhập sai quy định!");
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
        <a href="admin_dashboard.php?page=add_khoa">
        <i class='bx bx-plus' ></i>
        <span>Thêm Khoa</span>
        </a>
    </li>
    </div>
</div>

    <div class="add">
        <h2>Thêm Khoa</h2>
        <form method="post">
            <label for="makhoa">Mã Khoa</label>
            <input type="text" id="makhoa" name="makhoa" required><br>

            <label for="tenkhoa">Tên Khoa</label>
            <input type="text" id="tenkhoa" name="tenkhoa" required><br>

            <label for="dienthoai">Số điện thoại</label>
            <input type="text" id="dienthoai" name="dienthoai" required><br>

            <input type="submit" name="submit" value="Thêm sinh viên">
        </form>
    </div>
</div>