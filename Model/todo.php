<?php
require_once 'Controller/todoController.php';

function connect() {
    return new PDO('mysql:host=localhost;dbname=database', 'root', '');
}

function counts() {
    $PDO = connect();
    $state = $PDO -> query('SELECT * FROM todos ORDER BY id DESC');
    return $state;
}   

function list_todo() {
    $PDO = connect();
    $state = $PDO -> query('SELECT * FROM todos ORDER BY id DESC');
    $todos = $state -> fetchAll(PDO::FETCH_OBJ);
    return $todos;
}   


//ADD
function create($todo, $completed = 0) {
    $PDO = connect();
    $state = $PDO->prepare('INSERT INTO todos VALUES (null,?,?)');
    return $state->execute([$todo, $completed]);
}

//EDIT
function edit_view($id) {
    $PDO = connect();
    $state = $PDO -> prepare('SELECT * FROM todos WHERE id = ?');
    $state -> execute([$id]);
    $todo = $state -> fetch(PDO::FETCH_OBJ);
    return $todo;
}
function edit($id, $todo) {
    $PDO = connect();
    $state = $PDO->prepare('UPDATE todos SET todo = ? WHERE id = ?');
    return $state->execute([$todo, $id]);
}


//DELETE
function destroy($id) {
    $PDO = connect();
    $state = $PDO->prepare('DELETE FROM todos WHERE id = ?');
    return $state->execute([$id]);
}


//CHECK
function check($completed, $id) {
    $PDO = connect();
    $state = $PDO->prepare('UPDATE todos SET completed = ? WHERE id = ?');
    return $state->execute([$completed, $id]);
}
