<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 15.07.18
 * Time: 20:16
 */

require "classes.php";

auth::checkUserLogin();

?>

<!DOCTYPE html>
<html class="has-navbar-fixed-top">
<head>
    <title>To-Do List</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styling.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://cdn.rawgit.com/RazorSh4rk/lorem-inject/72c07c26/lorem.min.js"></script>
</head>
<body>
<nav class="navbar is-fixed-top is-transparent">
    <div>
        <a style="float: left" class="header navbar-item" href="index.php">
            <h1 class="header">|To-Do Liste|</h1>
        </a>
        <a href="logout.php" style="float: right" class="header navbar-item is-right">
            <button class="button header is-danger"><i class="fas fa-sign-out-alt"></i></button>
        </a>
        <p style="float: right" class="header navbar-item is-right">
            <?php echo $_SESSION["user"]["username"]; ?>
        </p>
    </div>
</nav>

<div class="center space">
    <button class="button is-success is-outlined" onclick="toggleAddNoteMenu()"><i class="fas fa-plus"></i> Notiz
        hinzufügen
    </button>
    <div id="addNote" class="hidden">
        <form method="get" id="addForm" action="api/add_todo.php">
            <textarea form="addForm" id="newNoteText" class="textarea" placeholder="Notiz hier eingeben..."
                      name="content"></textarea>
            <button class="button is-success is-outlined" onclick="addNote()"><i class="fas fa-plus"></i> Notiz
                hinzufügen
            </button>
        </form>
    </div>
</div>
<br/>
<div class="center text">
    <p class="header">Todos: </p>
    <span id="todoList"></span>
</div>

<script src="js/main.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>
</html>
