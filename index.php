

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
    </body>
</html>