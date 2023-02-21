<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['username']) && isset($_POST['password'])) {
// Lấy thông tin đăng nhập từ biểu mẫu
$username = $_POST['username'];
$password = $_POST['password'];

// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username_db = "phpmyadmin";
$password_db = "php@123";
$dbname = "admin";
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Đăng nhập thành công, chuyển hướng đến trang chính
    header("Refresh:0; url=/htdoc/index.html");
} else {
    // Đăng nhập thất bại, hiển thị thông báo lỗi
    echo "Invalid username or password";
}

// Đóng kết nối
mysqli_close($conn);
}
?>