<?php
$severname = "localhost";
$username = "root";
$password = "";
$db = "db_ptweb";

$conn = mysqli_connect($severname, $username, $password, $db);

if (!$conn) {
    die("Không kết nối được MySQL: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

if (!function_exists("h")) {
    function h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
    }
}
?>
