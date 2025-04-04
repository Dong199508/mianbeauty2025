<?php
// Cấu hình kết nối
$servername = "localhost";
$username = "root";
$password = "";
$database = "mianbeauty";

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$phone = $_POST['phone'];
$appointment_time = $_POST['appointment_time'];
$note = $_POST['note'];

// Chuẩn bị câu lệnh SQL
$sql = "INSERT INTO appointments (name, phone, appointment_time, note)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $phone, $appointment_time, $note);

// Thực thi
if ($stmt->execute()) {
  echo "✅ Đặt lịch thành công! Cảm ơn bạn.";
} else {
  echo "❌ Có lỗi xảy ra: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
