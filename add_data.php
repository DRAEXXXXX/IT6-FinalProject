<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];

    if ($type === "vehicle") {
        $stmt = $conn->prepare("INSERT INTO vehicles (vehicle_type, plate_no, brand, model, year_manufacture, seating_capacity, price, driver, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiiiss", $_POST['vehicle_type'], $_POST['plate_no'], $_POST['brand'], $_POST['model'], $_POST['year_manufacture'], $_POST['seating_capacity'], $_POST['price'], $_POST['driver'], $_POST['added_by']);
    
    } elseif ($type === "employee") {
        $stmt = $conn->prepare("INSERT INTO employees (full_name, contact_no, email, address, role, password, salary, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssds", $_POST['full_name'], $_POST['contact_no'], $_POST['email'], $_POST['address'], $_POST['role'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['salary'], $_POST['added_by']);
    
    } elseif ($type === "driver") {
        $stmt = $conn->prepare("INSERT INTO drivers (full_name, contact_no, address, license_no, years_experience, commission_rate, added_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssids", $_POST['full_name'], $_POST['contact_no'], $_POST['address'], $_POST['license_no'], $_POST['years_experience'], $_POST['commission_rate'], $_POST['added_by']);
    }

    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
