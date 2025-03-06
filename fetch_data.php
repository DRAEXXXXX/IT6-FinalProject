<?php
include 'connect.php';

$type = $_GET['type']; // Get the requested table type

if ($type === "vehicles") {
    $sql = "SELECT * FROM vehicles";
} elseif ($type === "employees") {
    $sql = "SELECT * FROM employees";
} elseif ($type === "drivers") {
    $sql = "SELECT * FROM drivers";
} else {
    die("Invalid request");
}

$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
