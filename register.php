<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 14.07.18
 * Time: 18:22
 */

require "classes.php";
var_dump($_POST);
var_dump(auth::register_user($_POST["username"], $_POST["password"]));