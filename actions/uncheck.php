<?php 
    include '../db/dbconnect.php';

    $id = $_GET['id'];

    if (unmarkToDo($id) == 'success'){
        header('location: ../../done.php');
    }
    else {
        echo newToDo($_POST['name']);
    }


?>