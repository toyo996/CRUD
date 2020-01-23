<?php
require_once("connection.php");
    if (isset($_POST['delete']))
    {
        $mysql->query ("DELETE FROM students");
        die($mysql->error);
        $_SESSION['message'] = "All Records has been deleted!";
        echo "ALL records has been deleted!";
        header('Location: http://localhost/asd/crud/index.php');
    }

    if (isset($_POST['deleterow']))
    {
        $id=trim($_POST['update_id2']);
        var_dump($id);
        $mysql->query ("DELETE FROM students WHERE id='$id'")or
        die($mysql->error);
        $_SESSION['message'] = "Record has been saved!";

        header("location: http://localhost/asd/crud/index.php");
    }

?>