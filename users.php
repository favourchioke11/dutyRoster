<?php
// require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');

if (isset($_GET['user'])) {
    $active_user = $_GET['user'];
}

?>

<body>

    <?php
    require_once('includes/nav.php');

    ?>

    <div class="container-table">
        <div class="content">
            <h4>Task Displayed</h4>

            <table border="2px">
                <thead>
                    <tr>
                        <th>Users</th>
                        <th>Users Task</th>
                        <!-- <th>Edit Task</th> -->
                        <th>Manage Users / Task</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sql = "SELECT * FROM task";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            extract($data);

                            ?>

                            <!-- users data will be dynamically inserted here -->
                            <tr>
                                <td>
                                    <?= $assigned_to ?>

                                </td>

                                <td>
                                    <?= $title ?>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" id="drop" aria-haspopup="true"
                                        aria-expanded="false">Action</button>
                                    <div class="dropdown">
                                        <a href="edit-task.php?to_do=<?= $task_id ?>"
                                            class="btn-action btn-sm btn-primary text-decoration-none mb-3">Edit</a>
                                        <!-- Button trigger modal -->
                                        <form action="processor/user.php" method="POST">

                                            <input type="hidden" value="<?= $user_id ?>" name="user_id">
                                            <input type="hidden" value="<?= $name ?>" name="name">

                                            <?php
                                            if ($role == "manager") {

                                                ?>
                                                <button class="btn-action btn-sm btn-primary text-decoration-none" type="submit"
                                                    name="make_user">Make
                                                    <?= $name ?> a User
                                                </button>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if ($role == "user") {

                                                ?>
                                                <button class="btn-action btn-sm btn-primary text-decoration-none" type="submit"
                                                    name="make_manager">Make
                                                    <?= $name ?> a Manager
                                                </button>

                                                <?php
                                            }
                                            ?>

                                        </form>
                                    </div>


                                    <div class="dropdown">

                                        <!-- Button trigger modal -->
                                        <a type="button" class="btn-action btn-sm btn-danger text-decoration-none"
                                            data-toggle="modal" data-target="#modelId<?= $task_id ?>">
                                            Delete</a>

                                        <div class="modal fade" id="modelId<?= $task_id ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this Task?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form autocomplete="off" action="processor/update.php" method="POST"
                                                            enctype="multipart/form-data">

                                                            <input type="hidden" name="delete" value="<?= $task_id ?>">


                                                            <button type="submit" class="btn btn-danger" name="delete_task"
                                                                value="<?= $task_id ?>"><span class="icofont-ui-delete"></span>
                                                                Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </td>
                            </tr>

                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>



    <script src="script/jquery.js"></script>
    <script src="b4/js/bootstrap.min.js"></script>
    <script src="script/script.js"></script>

</body>

</html>