

<!doctype html>
<?php
include 'db/dbconnect.php';

$toDos = getAllToDos();

?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>Simple To do list!</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>A Smiple To-Do List</h3>
        </div>
        <div class="row">
        <form action="actions/checkoff.php" method="post">
            <?php foreach($toDos as $toDo){ ?>
                <?php if(!$toDo['done']) : ?>
                    <input type="checkbox" name="toDo[]" done="<?php echo $toDo['done']?>" value="<?php echo $toDo['id']?>"> <?php echo $toDo['name'] ?> </input>
                    </br>
                <?php endif; ?>
            <?php } ?>
            <input type="submit" name="checkDoTods" value="Submit Finshed To Do's!">
            </form>
        </div>
        <div class="row">
            Create A New To Do
        </div>
        <div class="row">
            <form action="actions/newtodo.php" method="post">
            <input type="text" name="name"><br>
            <input type="submit" value="Submit To-Do">
            </form>
        </div>
        <div class="row">
                <a href="done.php">Completed To-Do's</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>