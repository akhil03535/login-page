<?php
$servername = "localhost";
$username = "root";
$password = "Akhilcsd1!@3";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$score = 0;

// Calculate score (this is a simplified example; you can replace it with your actual scoring logic)
if (isset($_POST['q1']) && $_POST['q1'] == 'correct_answer_1') {
    $score++;
}
if (isset($_POST['q2']) && $_POST['q2'] == 'correct_answer_2') {
    $score++;
}

// Prepare and execute query
$sql = "INSERT INTO quiz (name, score) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $name, $score);

if ($stmt->execute()) {
    echo "Your score: " . $score;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
