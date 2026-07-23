<?php
session_start();
require_once("../config/connect.php");

function tao_captcha() {
    $a = random_int(1, 9);
    $b = random_int(1, 9);
    $_SESSION["captcha_question"] = $a . " + " . $b . " = ?";
    $_SESSION["captcha_answer"] = (string) ($a + $b);
}

function lay_captcha() {
    if (empty($_SESSION["captcha_question"]) || empty($_SESSION["captcha_answer"])) {
        tao_captcha();
    }

    return $_SESSION["captcha_question"];
}

function dang_nhap_that_bai($message, $isAjax) {
    $_SESSION["login_failed_count"] = ($_SESSION["login_failed_count"] ?? 0) + 1;
    tao_captcha();

    if ($isAjax) {
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode([
            "success" => false,
            "message" => $message,
            "captcha_required" => true,
            "captcha_question" => $_SESSION["captcha_question"]
        ]);
        exit();
    }

    header("Location: login.php?error=" . urlencode($message));
    exit();
}

if (isset($_GET["action"]) && $_GET["action"] === "refresh_captcha") {
    header("Content-Type: application/json; charset=utf-8");

    if (($_SESSION["login_failed_count"] ?? 0) > 0) {
        tao_captcha();
        echo json_encode([
            "captcha_required" => true,
            "captcha_question" => $_SESSION["captcha_question"]
        ]);
    } else {
        echo json_encode(["captcha_required" => false]);
    }

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $isAjax = isset($_GET["ajax"]) && $_GET["ajax"] === "1";
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $masv = trim($_POST["masv"] ?? "");
    $captcha = trim($_POST["captcha"] ?? "");
    $captchaRequired = ($_SESSION["login_failed_count"] ?? 0) > 0;

    if ($captchaRequired) {
        $captchaAnswer = $_SESSION["captcha_answer"] ?? "";

        if ($captcha === "" || $captcha !== $captchaAnswer) {
            dang_nhap_that_bai("Mã captcha chưa đúng, vui lòng thử lại!", $isAjax);
        }
    }

    $stmt = $conn->prepare("SELECT * FROM db_account WHERE username = ? AND masv = ? LIMIT 1");
    $stmt->bind_param("ss", $username, $masv);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($row["password"] === $password) {
            unset($_SESSION["login_failed_count"], $_SESSION["captcha_question"], $_SESSION["captcha_answer"]);
            $_SESSION["username"] = $row["username"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["masv"] = $row["masv"];
            $_SESSION["role"] = $row["role"];

            $redirect = $row["role"] === "admin"
                ? "admin_dashboard.php?page=admin_home"
                : "user_dashboard.php?page=user_home";

            if ($isAjax) {
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode([
                    "success" => true,
                    "message" => "Đăng nhập thành công!",
                    "redirect" => $redirect
                ]);
                exit();
            }

            header("Location: " . $redirect);
            exit();
        }
    }

    dang_nhap_that_bai("Thông tin đăng nhập chưa chính xác!", $isAjax);
}

$captchaRequired = ($_SESSION["login_failed_count"] ?? 0) > 0;
$captchaQuestion = $captchaRequired ? lay_captcha() : "";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>HUMG | Đăng nhập</title>
</head>
<body>
    <form id="login-form" action="" method="post">
        <h2>Đăng nhập</h2>

        <p id="login-message" class="error" <?php echo isset($_GET["error"]) ? "" : "style=\"display: none;\""; ?>>
            <?php echo isset($_GET["error"]) ? h($_GET["error"]) : ""; ?>
        </p>

        <label for="masv">Mã sinh viên / mã quản trị</label>
        <input type="text" id="masv" name="masv" placeholder="ADMIN hoặc mã sinh viên" required>

        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username" placeholder="admin" required>

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="123456" required>

        <div id="captcha-box" class="captcha-box" <?php echo $captchaRequired ? "" : "style=\"display: none;\""; ?>>
            <label for="captcha">Captcha</label>
            <div class="captcha-row">
                <strong id="captcha-question"><?php echo h($captchaQuestion); ?></strong>
                <button type="button" id="refresh-captcha" class="refresh-captcha">Đổi</button>
            </div>
            <input type="text" id="captcha" name="captcha" placeholder="Nhập kết quả" <?php echo $captchaRequired ? "required" : ""; ?>>
        </div>

        <button type="submit" id="login-button">Đăng nhập</button>
    </form>

    <script src="../js/login.js"></script>
</body>
</html>
