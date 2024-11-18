<?php
require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');

?>

<body>
    <?php
    require_once('includes/nav.php');

    ?>

    <section class="container">
        <div class="addtask bg-white">
            <h4>Add Task</h4>

            <form autocomplete="off" action="processor/addtask.php" method="POST">

                <?= showAlert() ?>

                <div class="form-group">
                    <label for="task">Title:</label>
                    <input type="text" class="form-control" id="task" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="dueDate">Deadline:</label>
                    <input type="date" class="form-control" id="dueDate" name="dueDate">
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select class="form-control" id="priority" name="priority">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                </div>

                <div class="form-group">
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

                <button type="submit" value="<?$user_id?>" name="addtask" class="btn d-block w-50 mb-3 mt-4 btn-dark">Add
                    Task</button>
            </form>
        </div>

    </section>
</body>

</html>