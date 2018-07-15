<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 15.07.18
 * Time: 21:10
 */

require "../classes.php";
auth::checkUserLogin();
db::addTodo($_GET["content"]);
