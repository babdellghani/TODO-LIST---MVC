<?php
require_once './Controller/todoController.php';

if (isset($_GET['action'])) {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    switch ($action) {
        case 'create':
            createAction();
            break;
        case 'edit':
            editAction();
            break;
        case 'update':
            updateAction();
            break;
        case 'destroy':
            destroyAction();
            break;
        case 'check':
            checkAction();
            break;
        default:
            indexAction();
            break;
        }
}  else {
    indexAction();
}
