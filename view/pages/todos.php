<?php
    $title = 'Todos';
    
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
            <h1>Todo List <i class="fa-solid fa-clipboard-list fa-bounce"></i></h1>
            <form action="index.php?action=create" method="post" id="your_form">
                <input type="text" name="todo" id="todo" placeholder="Add Your Todo">

                
                <button class="button-86" role="button">
                    <input class="button-86" role="button" type="submit" name="submit" value="Add">
                </button>
                
            </form>
        </div>

        <div class="todo-content">
            
            <?php
                
                if ($state->rowCount() !== 0) { 
                    foreach ($todos as $todo) :
            ?>

            <div class="item">
                
                <form action="index.php?action=check&id=<?= $todo -> id ?>" method="post">
                    <input type="checkbox" class="ui-checkbox" <?= $todo -> completed == 1 ? 'checked' : '' ?> name="completed" id="<?= $todo -> id ?>">
                </form>  

                <label for="<?= $todo -> id ?>">
                    <?php 
                        if ($todo -> completed == 1) {
                            echo '<strike><p>' . $todo -> todo . '</p></strike>';
                        } else {
                            echo '<p>' . $todo -> todo . '</p>';
                        }
                    ?>
                </label>
                
                <div class="buttons">
                    <a href="index.php?action=edit&id=<?= $todo -> id ?>" class="button-87" role="button">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>

                    <a href="index.php?action=destroy&id=<?= $todo -> id ?>" class="button-87" role="button" onclick="return confirm('Are you sure want to delete?')">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>
            </div>
            <hr>
            
            <?php endforeach; 
                    } else { 
            ?>
                        <h2 style="text-align: center;">There is no todo</h2>
            <?php }
            ?>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'view/pages/layout.php'; ?>    
