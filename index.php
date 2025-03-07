<?php
    // index.php
    echo '<html>
    <head>
        <title>Employee Management System</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 font-sans">
        <div class="max-w-5xl mx-auto p-6 bg-white bg-opacity-70 rounded-lg shadow-lg mt-10">
            <h1 class="text-4xl font-bold text-center text-black mb-6">Employee Management System</h1>
            <div class="flex justify-center space-x-6">
                <a href="add_employee.php" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">Add Employee</a>
                <a href="view_employee.php" class="bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-105">View Employees</a>
            </div>
        </div>
    </body>
    </html>';
?>
