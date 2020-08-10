<?php
    session_start();


    $mysqli = new mysqli($servername,'root','mysql','crud')
    or die (mysqli_error($mysqli));

    $id = 0;
    $update = false;
    $name = '';
    $course = '';

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $course = $_POST['course'];

        $mysqli->query("INSERT INTO data (name, course) VALUES('$name','$course')") or
        die($mysqli->error);

        header("location: index.php");
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or
         die($mysqli->error);
        header("location: index.php");
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result= $mysqli->query("SELECT * FROM data WHERE id=$id") or
         die($mysqli->error);

             $row = $result->fetch_array();
             $name = $row['name'];
             $course = $row['course'];

    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $course = $_POST['course'];

        $mysqli->query("UPDATE data SET name='$name', course='$course' WHERE id=$id ") or
        die($mysqli->error);

        header("location: index.php");
    }
   
    
?>