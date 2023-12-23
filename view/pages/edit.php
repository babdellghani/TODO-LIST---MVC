<?php 
$title = "Edit Todo";

ob_start();

session_start();
if (isset($_SESSION['alert'])) {
    include_once 'view/pages/include/alert.php';
    unset($_SESSION['alert']);
}
?>
 <div class="container">

    <div class="todo">

        <div class="todo-header">
            <div class="title">
                <h1>Todo List</h1>
                <a href="index.php">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <form action="index.php?action=update" method="post">
                <input type="hidden" name="id" value="<?= $id;?>">
                <input type="text" name="todo" id="todo" value="<?php if (isset($todo -> todo)) {echo $todo -> todo ;} ?>">

                
                <button class="button-86" role="button">
                    <input class="button-86" role="button" type="update" name="update" value="Update">
                </button>
                
            </form>
        </div>

        

    </div>
</div>

<?php
$content = ob_get_clean();

include 'layout.php';
?>
