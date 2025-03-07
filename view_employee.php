<?php
    // view_employee.php
    $conn = new mysqli('localhost', 'root', '', 'employee_management');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);
?>

<html>
<head>
    <title>View Employees</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 font-sans">
<div class="max-w-7xl mx-auto p-20 bg-white bg-opacity-50 rounded-lg shadow-lg mt-10">
    <!-- <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-lg"> -->
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Employee List</h2>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">EMPID</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">First Name</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">Last Name</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">Email</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">Mobile</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="border-t border-gray-200">
                        <td class="px-6 py-3 text-sm text-gray-700"><?php echo $row['emp_id']; ?></td>
                        <td class="px-6 py-3 text-sm text-gray-700"><?php echo $row['first_name']; ?></td>
                        <td class="px-6 py-3 text-sm text-gray-700"><?php echo $row['last_name']; ?></td>
                        <td class="px-6 py-3 text-sm text-gray-700"><?php echo $row['email']; ?></td>
                        <td class="px-6 py-3 text-sm text-gray-700"><?php echo $row['mobile']; ?></td>
                        <td class="px-6 py-3">
                            <a href="edit_employee.php?id=<?php echo $row['emp_id']; ?>" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                            <a href="delete_employee.php?id=<?php echo $row['emp_id']; ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
    $conn->close();
?>
