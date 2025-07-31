<?php
    include 'config.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $roll = $_POST['Roll'];
        $class = $_POST['cls'];

        $sql = "INSERT INTO Students (name,roll,class) VALUES ('$name','$roll','$class')";
        if($conn->query($sql) === TRUE){
            header("Location:index.php");
        }else{
            echo "Error:".$conn->error;
        }
    }
?>