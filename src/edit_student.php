<?php
include 'config.php';

$students_res = null;

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Students WHERE id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $students_res = $result->fetch_assoc();
    $stmt->close(); 
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['Roll'];
    $class = $_POST['cls'];

    $stmt = $conn->prepare("UPDATE Students SET name = ?, roll = ?, class = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $roll, $class, $id); 
    $stmt->execute();
    $stmt->close(); 

    $conn->close(); 
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data Update Area</title>
    <link rel="stylesheet" href="./css/fontawesome.min.css" />
    <link rel="stylesheet" href="./output.css" />
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">User Data Update Now</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $students_res['id'] ?? '' ?>" />
            <input type="text" name="name" id="name" value="<?= $students_res['name'] ?? '' ?>" class="w-full border p-2 rounded mb-3" required />
            <input type="number" name="Roll" id="Roll" value="<?= $students_res['Roll'] ?? '' ?>" class="w-full border p-2 rounded mb-3" required />
            <select name="cls" id="cls" class="w-full rounded border p-2">
                <option value="5th" <?= ($students_res['class'] ?? '') == '5th' ? 'selected' : '' ?>>5th</option>
                <option value="6th" <?= ($students_res['class'] ?? '') == '6th' ? 'selected' : '' ?>>6th</option>
                <option value="7th" <?= ($students_res['class'] ?? '') == '7th' ? 'selected' : '' ?>>7th</option>
                <option value="8th" <?= ($students_res['class'] ?? '') == '8th' ? 'selected' : '' ?>>8th</option>
                <option value="9th" <?= ($students_res['class'] ?? '') == '9th' ? 'selected' : '' ?>>9th</option>
                <option value="10th" <?= ($students_res['class'] ?? '') == '10th' ? 'selected' : '' ?>>10th</option>
            </select>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mt-3">Update Now</button>
            <a href="index.php" class="bg-pink-200 hover:bg-pink-300 text-white px-4 py-2 rounded flex items-center gap-2 whitespace-nowrap mt-3">
                <i class="fas fa-angle-left"></i>
                Back To Home
            </a>
        </form>
    </div>
</body>

</html>