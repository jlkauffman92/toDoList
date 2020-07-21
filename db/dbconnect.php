<?php

//I like to have all my database shanigans in one place. So that's this file.
//For this particular project I probably could have just named it "functions" but what the hey.


//Connect and disconnect to the MySQL database
function opendb(){
  //Obviously we'd use ENV variables here if this wasn't just a fun little dev thing
    $dbuser = 'phpdev';
    $dbpw = 'PizzaIsGood!123';
    $db = 'to_do_list_dev';

    $conn = new mysqli('localhost', $dbuser, $dbpw, $db) or die('Connection failed: %\n'. $conn -> error);

    return $conn;
}

function closedb($conn){
    $conn -> close();
}

function getAllToDos(){
    //initialize an empty array for our data
    $toDos = [];
    //connect to the database  
    $connect = opendb();
    //grab everything for the table
    $sql = 'SELECT * from to_do';

    $result = $connect->query($sql);

    //turn $toDos into an array of arrays (each array being a to-do item)
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        array_push($toDos, $row);
    }

    closedb($connect);

    return $toDos;
}

function getToDoByID($id){
  //didn't actually end up needing this one but wrote it beforehand because I thought I might
    $connect = opendb();
    $sql = 'SELECT * FROM to_do WHERE id=' . $id;
    
    $result = $connect->query($sql);

    $row = $result->fetch_array(MYSQLI_ASSOC);
    closedb($connect);
    return $row;
}

function makeQuery($sql){
  //Just a little  resuable function for performing actions on the database
  $connect = opendb();
    //A handy way to expose error messages to the outside scope if need be
  if ($connect->query($sql) === TRUE) {
    return 'success';
  } else {
    return 'Error: ' . $sql . $connect->error;
  }
  closedb($connect);
}

function newToDo($name){
  //Grab all of the items in the to_do table
    $existing = getAllToDos();
    //get the last item's ID and add 1 to it
    $lastitem = end($existing);
    $id = (int)$lastitem['id'] + 1;
    $stringName =  "'". $name . "'";

    $sql = "INSERT INTO to_do(id, name, done)
        VALUES (". $id. ", " . $stringName .", false)";
    $result = makeQuery($sql);
    return $result;
}

function markToDoDone($id){
    $sql = 'UPDATE to_do SET done=1 WHERE id=' . (int)$id;
    $result = makeQuery($sql);
    return $result;

}

function unmarkToDo($id){
  $sql = 'UPDATE to_do SET done=0 WHERE id=' . (int)$id;
  $result = makeQuery($sql);
  return $result;
}

function deleteToDo($id){
    $sql = 'DELETE FROM to_do WHERE id='. $id;
    $result = makeQuery($sql);
    return $result;
}

?>