<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="./css/fontawesome.min.css" />
    <link rel="stylesheet" href="./output.css" />
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-5">Student Add</h1>
        <!-- Form -->
        <form action="add_student.php" method="post" class="bg-white p-6 rounded shadow-md space-y-4">
            <input type="text" placeholder="Name" name="name" require class="w-full border p-2 rounded" />
            <input type="number" name="Roll" id="Roll" placeholder="Roll" require class="w-full p-2 border rounded" />
            <select name="cls" id="cls" class="w-full rounded border p-2">
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
            </select>
            <input type="submit" value="Add Now" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded" />
        </form>
        <!-- Form -->


        <!-- Students Table -->
        <div class="mt-8">
            <h2 class="text-3xl text-center font-bold mb-4">Students List</h2>
            <table class="w-full table-auto border-collapse bg-white shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">#</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Roll</th>
                        <th class="border p-2">Class</th>
                        <th class="border p-2">Adding Time</th>
                        <th class="border p-2">
                            <a href="#"><i class="fas fa-edit"></i></a>
                        </th>
                        <th class="border p-2">
                            <a href="#"><i class="fas fa-trash"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = $conn->query("SELECT * FROM Students ORDER BY id ASC");
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>
                                        <td class='border p-2 text-black'>{$row['id']}</td>
                                        <td class='border p-2 text-black'>{$row['name']}</td>
                                        <td class='border p-2 text-black'>{$row['roll']}</td>
                                        <td class='border p-2 text-black'>{$row['class']}</td>
                                        <td class='border p-2 text-black'>{$row['created_at']}</td>
                                        <td class='border p-2 text-black'>
                                           <a href='edit_student.php?id=" . $row['id'] ."' class='bg-yellow-300 text-black px-2 py-1 rounded'>Edit</a>
                                        </td>
                                        <td class='border p-2 text-black'>
                                            <a href='del_student.php?id=" . $row['id'] . "' class='bg-red-400 text-black px-2 py-1 rounded'>Delete</a>
                                        </td>
                                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center p-4'>There Are Not Any Student</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Students Table -->
    </div>
</body>

</html>