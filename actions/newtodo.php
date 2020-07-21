<?php 
    include '../db/dbconnect.php';

    if (newToDo($_POST['name']) == 'success'){
        header('location: ../index.php');
    }
    else {
        echo newToDo($_POST['name']);
    }

?>