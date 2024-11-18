<style>
    header{
        width: 100%;
        background-color: rgb(31, 31, 31);
        display: flex;
        color: #fff;
        justify-content: space-between;
        align-items: center;
        padding: 10px 50px;
        margin-bottom: 10px
    }

    ul{
        list-style-type: none;
    }

    header nav ul{
        display: flex;
        gap:20px;
    }

    header nav ul li a{
        color:#fff
    }

@media only screen and (max-width: 500px) {
    header{
        width: 100%;
    }

    header nav ul{
       display: none;
    }

    
}

</style>

<header class="">
        <h4 class="logo">TASKMGR</h4>

        <nav class="">
            <ul class="nav-list">
                <li><a href="users.php"><?=ucfirst($name)?></a></li>
                <?php if ($role !== 'user') {?>
                    <li><a href="add-task.php">Add task</a></li>
                    <li><a href="task.php">Task</a></li>
                    <li><a href="users.php">Users</a></li>
                    
                <?php } ?>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>