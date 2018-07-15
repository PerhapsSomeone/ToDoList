<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 15.07.18
 * Time: 20:43
 */
session_start();
unset($_SESSION["user"]);
header("Location: index.php");
