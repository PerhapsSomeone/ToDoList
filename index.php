<?php

require "classes.php";
require 'vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: marc
 * Date: 14.07.18
 * Time: 17:46
 */

?>

<!DOCTYPE html>
<html>
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

<nav id="navigation">
    <div>
        <a class="navbar-item" href="https://bulma.io">
            <h1 class="header">|To-Do Liste|</h1>
        </a>
    </div>
</nav>

<div class="center">
    <form method="post" action="register.php">
        <label class="text header">Login</label>
        <div class="field">
            <p class="control has-icons-left is-centered">
                <input width="20px" class="input is-medium" type="text" placeholder="Nutzername" name="username">
                <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
            </p>
        </div>
        <div class="field">
            <p class="control has-icons-left is-centered">
                <input class="input is-medium" type="password" name="password" placeholder="Passwort">
                <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
            </p>
        </div>
        <div class="g-recaptcha" data-sitekey="6LcLMmQUAAAAACmdKpV3xsTzqKXldlLcy7_p0mAX"></div>

        <button class="button is-success is-centered">
            Login
        </button>


    </form>
</div>
<!--<lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem><lorem></lorem>vv
-->
</body>
</html>
