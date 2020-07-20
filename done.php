<?php 
    include 'db/dbconnect.php';

    $toDos = getAllToDos();
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>Simple To do list! - Complete</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <h3> Completed To-Do's</h3>
    </div>
    <div class="row">
        <a href="index.php">Back to To-Do List </a>
    </div>
    <?php foreach($toDos as $toDo){ ?>
    <?php if($toDo['done']) : ?>
        <div class="row">
            <p> <?php echo $toDo['name'] ?> | <a href="actions/delete.php/?id=<?php echo $toDo['id'] ?>"> Delete </a> |  <a href="actions/uncheck.php/?id=<?php echo $toDo['id'] ?>"> Mark Undone</a> </p>
        </div>
    <?php endif; ?>
<?php } ?>

    </div>
</body>

