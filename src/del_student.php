<?php
include 'config.php';

if (isset($_GET['id'])) {
    $s_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM Students WHERE id = ?");
    $stmt->bind_param("i", $s_id); // "i" = integer
    $execute_success = $stmt->execute();
    $stmt->close();

    if ($execute_success) {
        // echo "শিক্ষার্থী সফলভাবে মুছে ফেলা হয়েছে।";
        header("Location: index.php"); // সফল হলে তালিকায় ফেরত যাওয়া
    } else {
        echo "রেকর্ড ডিলিট করতে সমস্যা হয়েছে: " . $conn->error;
    }

} else {
    echo "কোনো ID নির্দিষ্ট করা হয়নি।";
}
?>
