<?php 
    include '../db/dbconnect.php';
    $id = $_GET['id'];

    if (deleteToDo($id) == 'success'){
        //once the new to-do is deleted, reload the done page
        header("location: ../../done.php");
    }
    else {
        //otherwise, just print out the sql error
        echo newToDo($_POST['name']);
    }

?>