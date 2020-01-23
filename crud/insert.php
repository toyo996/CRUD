<?php
require_once("connection.php");

    if (isset($_POST['add']))
    {
        $student_name=$_POST['student_name'];
        $student_last_name=$_POST['student_last_name'];
        $bday=$_POST['bday'];
        $school_name=$_POST['school_name'];
        $mysql->query ("INSERT INTO students (first_name, last_name, birthdate, school) VALUES ('$student_name', '$student_last_name', '$bday','$school_name')") or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";
        header("location: http://localhost/asd/crud/index.php");
    }