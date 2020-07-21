<?php
//I've separted out all of the actions into separate files just to make things easier to parse 
    include '../db/dbconnect.php';

    //unless empty, mark all checked to-do's as done
    if (empty($_POST['toDo'])){
        echo 'No to dos!';
    }
    else {
        foreach($_POST['toDo'] as $toDo) {
            if (markToDoDone($toDo) == 'success'){
                header('location: ../index.php');
            }
            else {
                echo markToDoDone($toDo);
            }
            
        }
    }


?>