<?php
// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root";        // Sesuaikan dengan username database
$password = "";            // Sesuaikan dengan password database
$dbname = "2b"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form berdasarkan data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_customer'])) {
        // Proses Form Customer
        $customer_name = $_POST['customer_name'];
        $contact_number = $_POST['contact_number'];
        $sql = "INSERT INTO Customer (CustomerName, ContactNumber) VALUES ('$customer_name', '$contact_number')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Customer berhasil ditambahkan!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['submit_driver'])) {
        // Proses Form Driver
        $driver_name = $_POST['driver_name'];
        $dob = $_POST['dob'];
        $license_number = $_POST['license_number'];
        $sql = "INSERT INTO Driver (DriverName, DOB, LicenseNumber) VALUES ('$driver_name', '$dob', '$license_number')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Driver berhasil ditambahkan!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['submit_area'])) {
        // Proses Form Admin (Area)
        $city_name = $_POST['city_name'];
        $sql = "INSERT INTO Area (CityName) VALUES ('$city_name')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Area berhasil ditambahkan!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        /* Gaya umum untuk keseluruhan halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #333333;
        }
        .link {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }
        .link:hover {
            background-color: #45a049;
        }
        form {
            display: none;
            margin-top: 20px;
        }
        .active {
            display: block;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function showForm(formId) {
            document.getElementById('customer_form').classList.remove('active');
            document.getElementById('driver_form').classList.remove('active');
            document.getElementById('area_form').classList.remove('active');
            document.getElementById(formId).classList.add('active');
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <button class="link" onclick="showForm('customer_form')">Customer Form</button>
        <button class="link" onclick="showForm('driver_form')">Driver Form</button>
        <button class="link" onclick="showForm('area_form')">Admin Form (Area)</button>

        <!-- Form Customer -->
        <form id="customer_form" method="post" class="active">
            <h2>Customer Registration</h2>
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" required>
            
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number" required>

            <input type="submit" name="submit_customer" value="Register Customer">
        </form>

        <!-- Form Driver -->
        <form id="driver_form" method="post">
            <h2>Driver Registration</h2>
            <label for="driver_name">Driver Name:</label>
            <input type="text" name="driver_name" id="driver_name" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required>

            <label for="license_number">License Number:</label>
            <input type="text" name="license_number" id="license_number" required>

            <input type="submit" name="submit_driver" value="Register Driver">
        </form>

        <!-- Form Area (Admin) -->
        <form id="area_form" method="post">
            <h2>Register Area (Admin)</h2>
            <label for="city_name">City Name:</label>
            <input type="text" name="city_name" id="city_name" required>

            <input type="submit" name="submit_area" value="Add Area">
        </form>
    </div>
</body>
</html>
