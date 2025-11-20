<?php
// TODO 1: Khởi động session (Cực kỳ quan trọng)
session_start();

// TODO 2: Kiểm tra xem người dùng đã gửi form chưa
if (isset($_POST['username']) && isset($_POST['password'])) {

    // TODO 3: Lấy dữ liệu từ POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: Kiểm tra đăng nhập (giả lập)
    if ($user == 'admin' && $pass == '123') {

        // TODO 5: Lưu username vào SESSION
        $_SESSION['logged_user'] = $user;

        // TODO 6: Chuyển hướng sang trang welcome
        header('Location: welcome.php');
        exit;
    } else {
        // Sai tài khoản → quay lại login.html + báo lỗi
        header('Location: login.html?error=1');
        exit;
    }

} else {
    // TODO 7: Truy cập trái phép → đá về login
    header('Location: login.html');
    exit;
}
?>
