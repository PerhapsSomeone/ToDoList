<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 15.07.18
 * Time: 19:51
 */

require "classes.php";

auth::auth_user($_POST["username"], $_POST["password"]);

header("Location: main.php");