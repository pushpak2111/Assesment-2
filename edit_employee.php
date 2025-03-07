<?php
    // edit_employee.php
    if (isset($_GET['id'])) {
        $empId = $_GET['id'];
        $conn = new mysqli('localhost', 'root', '', 'employee_management');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM employee WHERE emp_id = '$empId'";
        $result = $conn->query($sql);
        $employee = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update employee details
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'employee_management');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update query
        $sql = "UPDATE employee SET first_name = '$firstName', last_name = '$lastName', email = '$email', mobile = '$mobile', address = '$address', gender = '$gender' WHERE emp_id = '$empId'";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success bg-green-600 text-white p-4 rounded'>Employee updated successfully!</div>";
            header('Location: view_employee.php');
        } else {
            echo "<div class='alert alert-danger bg-red-600 text-white p-4 rounded'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
    }
?>

<html>
<head>
    <title>Edit Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 font-sans">
<div class="max-w-3xl mx-auto p-20 bg-white bg-opacity-50 rounded-lg shadow-lg mt-10">
    <!-- <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg"> -->
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Edit Employee</h2>
        <form action="edit_employee.php?id=<?php echo $employee['emp_id']; ?>" method="POST">
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" value="<?php echo $employee['first_name']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" value="<?php echo $employee['last_name']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" value="<?php echo $employee['email']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" value="<?php echo $employee['mobile']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required><?php echo $employee['address']; ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="flex items-center space-x-4">
                    <label for="male" class="flex items-center">
                        <input type="radio" name="gender" value="Male" id="male" class="mr-2" <?php echo ($employee['gender'] == 'Male') ? 'checked' : ''; ?> required> Male
                    </label>
                    <label for="female" class="flex items-center">
                        <input type="radio" name="gender" value="Female" id="female" class="mr-2" <?php echo ($employee['gender'] == 'Female') ? 'checked' : ''; ?> required> Female
                    </label>
                </div>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
