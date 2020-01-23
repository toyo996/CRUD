<?php
require_once("connection.php");
//require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'index.php');

    if (isset($_POST['saveChanges']))
    {
        $id=trim($_POST['update_id']);
        $student_name=$_POST['student_name2'];
        $student_last_name=$_POST['student_last_name2'];
        $bday=$_POST['bday2'];
        $school_name=$_POST['school_name2'];
        $mysql->query ("UPDATE students SET first_name='$student_name', last_name='$student_last_name', birthdate='$bday', school='$school_name'WHERE id='$id'")or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";

        header("location: http://localhost/asd/crud/index.php");
    }
?>