<?php
    // delete_employee.php
    if (isset($_GET['id'])) {
        $empId = $_GET['id'];
        $conn = new mysqli('localhost', 'root', '', 'employee_management');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete query
        $sql = "DELETE FROM employee WHERE emp_id = '$empId'";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success bg-green-600 text-white p-4 rounded'>Employee deleted successfully!</div>";
            header('Location: view_employee.php');
        } else {
            echo "<div class='alert alert-danger bg-red-600 text-white p-4 rounded'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
    }
?>
