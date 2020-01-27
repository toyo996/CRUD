<?php
require_once("connection.php");

    if (isset($_POST['add']))
    {
        $student_name=$_POST['student_name'];
        $student_last_name=$_POST['student_last_name'];
        $bday=$_POST['bday'];
        $school_name=$_POST['school_name'];
        $pictureUrl="img/";
        $pictureUrl.=$_POST['pictureUrl'];
        $mysql->query ("INSERT INTO students (first_name, last_name, birthdate, school, pictureUrl) VALUES ('$student_name', '$student_last_name', '$bday','$school_name', '$pictureUrl')") or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";
        header("location: http://localhost/asd/crud/index.php");
    }

    if (isset($_POST['add_school']))
    {
        $schoolN=$_POST['school_name'];
        $adress=$_POST['adress'];
        $maxS=$_POST['max_students'];
        $fee=$_POST['fee'];
        $mysql->query ("INSERT INTO schools (name, address, max_students_alw, courses_fee) VALUES ('$schoolN', '$adress', '$maxS','$fee')") or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";
        header("location: http://localhost/asd/crud/index2.php");
    }