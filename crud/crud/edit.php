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


    if (isset($_POST['saveChangesSch']))
    {
        $idSch=trim($_POST['update_idSch']);
        $school_name2=$_POST['school_name2'];
        $adress2=$_POST['adress2'];
        $max2=$_POST['max_students2'];
        $fee2=$_POST['fee2'];
        $mysql->query ("UPDATE schools SET name='$school_name2', address='$adress2', max_students_alw='$max2', courses_fee='$fee2'WHERE id='$idSch'")or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";

        header("location: http://localhost/asd/crud/index2.php");
    }
?>