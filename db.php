<?php
// MySQL 서버 설정
$servername = "localhost"; // MySQL 서버 주소 (일반적으로 'localhost')
$username = "root";        // MySQL 사용자명
$password = "root";            // MySQL 비밀번호
$dbname = "test";       // 연결하려는 데이터베이스 이름

// MySQL 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// 데이터베이스에서 데이터를 조회하는 SQL 쿼리
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

// 결과를 출력
if ($result->num_rows > 0) {
    // 각 행의 데이터를 출력
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

// 연결 종료
$conn->close();
?>

