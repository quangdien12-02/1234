document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("login-form");
    var message = document.getElementById("login-message");
    var captchaBox = document.getElementById("captcha-box");
    var captchaQuestion = document.getElementById("captcha-question");
    var captchaInput = document.getElementById("captcha");
    var refreshCaptcha = document.getElementById("refresh-captcha");
    var loginButton = document.getElementById("login-button");

    function showMessage(text, type) {
        message.textContent = text;
        message.className = type === "success" ? "success" : "error";
        message.style.display = text ? "block" : "none";
    }

    function updateCaptcha(data) {
        if (data.captcha_required) {
            captchaBox.style.display = "block";
            captchaQuestion.textContent = data.captcha_question;
            captchaInput.required = true;
            captchaInput.value = "";
            captchaInput.focus();
        } else {
            captchaBox.style.display = "none";
            captchaInput.required = false;
            captchaInput.value = "";
        }
    }

    function requestCaptcha() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "login.php?action=refresh_captcha", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    updateCaptcha(JSON.parse(xhr.responseText));
                } catch (error) {
                    showMessage("Không tải được captcha!", "error");
                }
            }
        };
        xhr.send();
    }

    refreshCaptcha.addEventListener("click", requestCaptcha);

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var xhr = new XMLHttpRequest();
        var data = new FormData(form);

        loginButton.disabled = true;
        loginButton.textContent = "Đang kiểm tra...";

        xhr.open("POST", "login.php?ajax=1", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onreadystatechange = function () {
            if (xhr.readyState !== 4) {
                return;
            }

            loginButton.disabled = false;
            loginButton.textContent = "Đăng nhập";

            if (xhr.status !== 200) {
                showMessage("Không gửi được yêu cầu đăng nhập!", "error");
                return;
            }

            var response;
            try {
                response = JSON.parse(xhr.responseText);
            } catch (error) {
                showMessage("Máy chủ trả về dữ liệu không hợp lệ!", "error");
                return;
            }

            if (response.success) {
                showMessage(response.message, "success");
                window.location.href = response.redirect;
                return;
            }

            showMessage(response.message, "error");
            updateCaptcha(response);
        };
        xhr.send(data);
    });
});
