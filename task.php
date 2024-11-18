<?php
require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');

?>



<body>
    <?php 
    require_once('includes/nav.php');

    ?>
    <div class="container-table">
        <div class="content">
            <h4>All Tasks</h4>
            <?php
                if (isset($_GET['msg'])) { ?>
            <div class="success-alert">
                success: <?=$_GET['msg']?>
            </div>
            <?php } ?>
            <table border="2px">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Task Description</th>
                        <th>Deadline</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($role == 'user') {
                        $sql = "SELECT * FROM task WHERE assigned_to = '$user_id' ORDER BY priority DESC";
                        $result = $conn->query($sql);
                    }else{
                        $sql = "SELECT * FROM task ORDER BY priority DESC";
                        $result = $conn->query($sql);           
                    }

                    

                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            extract($data);

                            ?>

                            <!-- Task data will be dynamically inserted here -->
                            <tr>
                                <td>
                                    <?= $title ?>
                                </td>
                                <td>
                                    <?= substr($description,0,50)."..." ?>
                                </td>
                                <td>
                                    <?= $deadline ?>
                                </td>
                                <td>
                                    <?php if ($priority == 1) {
                                        echo "Low";
                                    }else if($priority == 2){
                                        echo "Medium";
                                    }else{
                                        echo "High";
                                    } ?>
                                </td>
                                <td>

                                    <?=$status?>

                                </td>
                                <?php
                                    if ($role == 'user') {  ?>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modelId<?= $task_id ?>">
                                        Done
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId<?= $task_id ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Complete your task</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you have completed your task?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form autocomplete="off" action="processor/update.php" method="POST"
                                                        enctype="multipart/form-data">

                                                        <input type="hidden" name="status" value="done">

                                                        <input type="hidden" name="" value="<?= $task_id ?>">

                                                        <button type="submit" name="update_status" class="btn btn-primary"
                                                            value="<?= $task_id ?>">Done</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                <?php } ?>
                                <?php
                                    if ($role !== 'user') {  ?>
                                <td>

                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" id="drop" aria-haspopup="true"
                                        aria-expanded="false">Action</button>
                                    <div class="dropdown">
                                        <a href="edit-task.php?to_do=<?= $task_id ?>"
                                            class="btn-action btn-sm btn-primary text-decoration-none">Edit</a>
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
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <?php } ?>
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