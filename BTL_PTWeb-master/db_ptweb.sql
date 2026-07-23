CREATE DATABASE IF NOT EXISTS db_ptweb
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE db_ptweb;

DROP TABLE IF EXISTS db_diemhocphan3;
DROP TABLE IF EXISTS db_diemhocphan2;
DROP TABLE IF EXISTS db_diemhocphan1;
DROP TABLE IF EXISTS db_diemhocphan;
DROP TABLE IF EXISTS db_lophocphan;
DROP TABLE IF EXISTS db_hocphan;
DROP TABLE IF EXISTS db_sinhvien;
DROP TABLE IF EXISTS db_lopchuyennganh;
DROP TABLE IF EXISTS db_khoa;
DROP TABLE IF EXISTS db_account;

CREATE TABLE db_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(20) NOT NULL UNIQUE,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_khoa (
    makhoa VARCHAR(20) PRIMARY KEY,
    tenkhoa VARCHAR(150) NOT NULL,
    dienthoai VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_lopchuyennganh (
    malop VARCHAR(20) PRIMARY KEY,
    tenlop VARCHAR(150) NOT NULL,
    nienkhoa VARCHAR(20) NOT NULL,
    siso INT NOT NULL DEFAULT 0,
    makhoa VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_sinhvien (
    masv VARCHAR(20) PRIMARY KEY,
    holot VARCHAR(100) NOT NULL,
    ten VARCHAR(50) NOT NULL,
    malop VARCHAR(20) NOT NULL,
    dienthoai VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_hocphan (
    mahocphan VARCHAR(20) PRIMARY KEY,
    tenhocphan VARCHAR(150) NOT NULL,
    tinchi INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_lophocphan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    malop VARCHAR(20) NOT NULL,
    mahocphan VARCHAR(20) NOT NULL,
    nhom VARCHAR(20) NOT NULL,
    hocki VARCHAR(20) NOT NULL,
    namhoc VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_diemhocphan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(20) NOT NULL,
    mahocphan VARCHAR(20) NOT NULL,
    a DECIMAL(4,2) NOT NULL DEFAULT 0,
    b DECIMAL(4,2) NOT NULL DEFAULT 0,
    c DECIMAL(4,2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_diemhocphan1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(20) NOT NULL,
    mahocphan1 VARCHAR(20) NOT NULL,
    a DECIMAL(4,2) NOT NULL DEFAULT 0,
    b DECIMAL(4,2) NOT NULL DEFAULT 0,
    c DECIMAL(4,2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_diemhocphan2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(20) NOT NULL,
    mahocphan2 VARCHAR(20) NOT NULL,
    a DECIMAL(4,2) NOT NULL DEFAULT 0,
    b DECIMAL(4,2) NOT NULL DEFAULT 0,
    c DECIMAL(4,2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_diemhocphan3 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(20) NOT NULL,
    mahocphan3 VARCHAR(20) NOT NULL,
    a DECIMAL(4,2) NOT NULL DEFAULT 0,
    b DECIMAL(4,2) NOT NULL DEFAULT 0,
    c DECIMAL(4,2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO db_account (masv, username, password, role) VALUES
('ADMIN', 'admin', '123456', 'admin'),
('2121050001', 'nguyenvana', '123456', 'user');

INSERT INTO db_khoa (makhoa, tenkhoa, dienthoai) VALUES
('CNTT', 'Công nghệ thông tin', '02438384000'),
('KTDK', 'Kỹ thuật điều khiển và tự động hóa', '02438384001'),
('DCCT', 'Địa chất công trình', '02438384002');

INSERT INTO db_lopchuyennganh (malop, tenlop, nienkhoa, siso, makhoa) VALUES
('DCCTCT66A', 'Công nghệ thông tin K66A', '2021-2026', 45, 'CNTT'),
('DCCTCT66B', 'Công nghệ thông tin K66B', '2021-2026', 43, 'CNTT'),
('KTDK66A', 'Kỹ thuật điều khiển K66A', '2021-2026', 40, 'KTDK');

INSERT INTO db_sinhvien (masv, holot, ten, malop, dienthoai, email) VALUES
('2121050001', 'Nguyễn Văn', 'An', 'DCCTCT66A', '0912345678', 'an2121050001@humg.edu.vn'),
('2121050002', 'Trần Thị', 'Bình', 'DCCTCT66A', '0923456789', 'binh2121050002@humg.edu.vn'),
('2121050003', 'Lê Minh', 'Cường', 'DCCTCT66B', '0934567890', 'cuong2121050003@humg.edu.vn'),
('2121050004', 'Phạm Thu', 'Dung', 'KTDK66A', '0945678901', 'dung2121050004@humg.edu.vn');

INSERT INTO db_hocphan (mahocphan, tenhocphan, tinchi) VALUES
('7080116', 'Phát triển ứng dụng web + BTL', 3),
('7080112', 'Trí tuệ nhân tạo', 3),
('7080512', 'Lập trình hướng đối tượng với Java', 3),
('7080206', 'Cấu trúc dữ liệu và giải thuật', 3);

INSERT INTO db_lophocphan (malop, mahocphan, nhom, hocki, namhoc) VALUES
('DCCTCT66A', '7080116', '01', '1', '2025-2026'),
('DCCTCT66A', '7080112', '01', '1', '2025-2026'),
('DCCTCT66B', '7080512', '02', '2', '2025-2026');

INSERT INTO db_diemhocphan (masv, mahocphan, a, b, c) VALUES
('2121050001', '7080116', 8.50, 7.50, 8.00),
('2121050002', '7080116', 7.00, 8.00, 7.50),
('2121050003', '7080116', 9.00, 8.50, 8.00);

INSERT INTO db_diemhocphan1 (masv, mahocphan1, a, b, c) VALUES
('2121050001', '7080112', 8.00, 7.00, 7.50),
('2121050002', '7080112', 7.50, 7.50, 8.00);

INSERT INTO db_diemhocphan2 (masv, mahocphan2, a, b, c) VALUES
('2121050003', '7080512', 8.50, 8.00, 8.50),
('2121050004', '7080512', 7.00, 7.00, 7.50);

INSERT INTO db_diemhocphan3 (masv, mahocphan3, a, b, c) VALUES
('2121050001', '7080206', 8.00, 8.00, 8.00),
('2121050004', '7080206', 7.50, 8.00, 8.50);
