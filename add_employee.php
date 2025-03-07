<?php
    // add_employee.php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process form submission to add an employee
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'employee_management');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert employee data
        $sql = "INSERT INTO employee (first_name, last_name, email, mobile, address, gender, password)
                VALUES ('$firstName', '$lastName', '$email', '$mobile', '$address', '$gender', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success bg-green-600 text-white p-4 rounded'>Employee added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger bg-red-600 text-white p-4 rounded'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
    }
?>

<html>
<head>
    <title>Add Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 font-sans">
<div class="max-w-2xl mx-auto p-10 bg-white bg-opacity-50 rounded-lg shadow-lg mt-10">
    <!-- <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg"> -->
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Add Employee</h2>
        <form action="add_employee.php" method="POST">
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="flex items-center space-x-4">
                    <label for="male" class="flex items-center">
                        <input type="radio" name="gender" value="Male" id="male" class="mr-2" required> Male
                    </label>
                    <label for="female" class="flex items-center">
                        <input type="radio" name="gender" value="Female" id="female" class="mr-2" required> Female
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
