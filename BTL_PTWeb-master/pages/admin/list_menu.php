<div class="menu">
    <ul class="list_menu">
        <li><a href="admin_dashboard.php?page=sinhvien">Sinh viên</a></li>
        <li><a href="admin_dashboard.php?page=khoa">Khoa</a></li>
        <li><a href="admin_dashboard.php?page=lopchuyennganh">Lớp chuyên ngành</a></li>
        <li><a href="admin_dashboard.php?page=lophocphan">Lớp học phần</a></li>
        <li><a href="admin_dashboard.php?page=hocphan">Học phần</a></li>
    </ul>
    <ul class="list_output">
        <li>
            <a href="admin_dashboard.php?page=sinhvien">
                <i class="bx bx-list-ul"></i>
                <span>Danh sách</span>
            </a>
        </li>
    </ul>
</div>
<div class="list_tool">
    <div id="search">
        <form action="admin_dashboard.php?page=search" method="post">
            <input type="text" name="txtsearch" placeholder="Tìm theo mã, tên, lớp, email">
            <input type="submit" name="search" value="Tìm kiếm">
        </form>
    </div>
    <div class="add_node">
        <li>
            <a href="admin_dashboard.php?page=add_sinhvien">
                <i class="bx bx-plus"></i>
                <span>Thêm sinh viên</span>
            </a>
        </li>
    </div>
</div>
