<?php
require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');


if (isset($_GET['to_do'])) {
    $active_todo = $_GET['to_do'];
}

?>

<body>

    <?php
    require_once('includes/nav.php');

    ?>

    <section class="container">
        <div class="addtask bg-white">
            <h4>Add Task</h4>
            <?php

            $sql = "SELECT * FROM task WHERE task_id = '$active_todo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
                ;

            extract($result->fetch_assoc());

            ?>

            <form autocomplete="off" action="processor/update.php" method="POST">

                <div class="form-group">
                    <label for="task">Title:</label>
                    <input type="text" class="form-control" id="task" name="title" value="<?= $title ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="3"><?= $description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="dueDate">Deadline:</label>
                    <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?= $deadline ?>">
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select class="form-control" id="priority" name="priority" value="<?= $priority ?>">
                        <option value="High">1</option>
                        <option value="Medium">2</option>
                        <option value="Low">3</option>
                    </select>
                </div>

                <label for="">Employees:</label>
                    <select class="form-control" id="priority" name="assigned_to">
                        <?php


                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                extract($data);

                                ?>
                                <option value="<?$user_id?>"><?=$name?></option>

                                <?php
                            }
                        }
                        ?>

                    </select>
                </div>

                <input type="hidden" value="<?= $user_id ?>" name="created_by">
                <input type="hidden" value="<?= $task_id ?>">

                <button type="submit" name="update_task" value="<?= $task_id ?>" class="btn btn-dark mt-3 mb-3">Add
                    Task</button>
            </form>
        </div>

       

    </section>
</body>

</html>