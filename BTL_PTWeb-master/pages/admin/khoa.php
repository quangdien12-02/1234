<?php
$result = $conn->query("SELECT * FROM db_khoa");

?>
<div class="card">
<h2> Quản lí thông tin sinh viên </h2>
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
<div class="content">
<div class="status1">
    <?php if(isset($_GET['status1'])){?> 
            <p><?php echo $_GET['status1']; ?></p>
    <?php } ?>
    </div>
    <div class="status2">
    <?php if(isset($_GET['status2'])){?>
        <p><?php echo $_GET['status2']; ?></p>
    <?php } ?>
    </div>
<h4>Bảng số liệu các khoa</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>STT</th>
            <th>Mã Khoa</th>
            <th>Tên Khoa</th>
            <th>Điện thoại</th>
            <th>Ghi chú</th>
            <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1 ;
            while($row= mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $i++ ; ?></td>
            <td><?php echo $row['makhoa'] ?></td>
            <td><?php echo $row['tenkhoa'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td> note</td>
            <td class="tool-content">
                <li ><a class="fix-content" href="admin_dashboard.php?page=fix&makhoa=<?php echo $row['makhoa'] ?>">Sửa</a>
                <li ><a class="delete-content" href="admin_dashboard.php?page=delete&makhoa=<?php echo $row['makhoa'] ?>">Xóa</a>
            </td>
        </tr>
            <?php }?>
            </tbody>
    </table>
</div>
</div>