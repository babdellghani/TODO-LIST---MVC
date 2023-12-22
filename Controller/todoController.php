<?php
require_once 'Model/todo.php';

function indexAction() {
    $todos = list_todo();
    $state = counts();
    require_once 'view/pages/todos.php';
}

function createAction() {
    if (isset($_POST['submit'])) {
        $todo  = ucwords(htmlspecialchars($_POST['todo']));
        $completed = 0;
        if (empty($todo)) {
            session_start();
            $_SESSION['alert'] = '';
            header('location:index.php');
        } else {
            create($todo, $completed);
            header('location:index.php');
        }
    }
}

function editAction() {
    $id    = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $todo  = edit_view($id);
    require_once 'view/pages/edit.php';
}

function updateAction() {
    if (isset($_POST['update'])) {
        $todo  = ucwords(htmlspecialchars($_POST['todo']));
        $id    = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if (empty($todo)) {
            session_start();
            $_SESSION['alert'] = '';
            header('location:index.php?action=edit&id=' . $id);
        } else {
            edit($id, $todo);
            header('location:index.php');
        }
    }
}

function destroyAction() {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    destroy($id);
    header('location:index.php');
}

function checkAction() {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    if (isset($_POST['completed'])) {
        check(1, $id);
    } else {
        check(0, $id);
    }
    header('location:index.php');
}
