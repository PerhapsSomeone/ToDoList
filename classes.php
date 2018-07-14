<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 14.07.18
 * Time: 17:48
 */

require "vendor/autoload.php";

class auth
{
    public static function auth_user($username, $password): bool
    {

        if (!isset($_POST["g-recaptcha-response"])) {
            return false;
        }

        $recaptcha = new \ReCaptcha\ReCaptcha("6LcLMmQUAAAAAA5DO22UamyuiNd6GRsW6xDUnAa9");
        $resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);
        if ($resp->isSuccess()) {

        } else {
            return false;
        }
    }


    public static function register_user($username, $password): bool
    {

        /*if(!isset($_POST["g-recaptcha-response"])) { // If reCaptcha wasnt used, abort.
            return false;
        }*/

        $conn = db::getConn();

        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["COUNT(*)"] !== 0) {
            return false;
        }

        $password = self::bcryptHash($password);
        $uuid = self::genUUID();
        $auth_token = self::genAuthToken();

        echo $uuid . "<br />" . $password . "<br />";

        //$recaptcha = new \ReCaptcha\ReCaptcha("6LcLMmQUAAAAAA5DO22UamyuiNd6GRsW6xDUnAa9");
        //$resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);
        //if ($resp->isSuccess()) {
        $regStmt = $conn->prepare("INSERT INTO users (`id`, `username`, `password`, `auth_token`) VALUES (?, ?, ?, ?)");
        $regStmt->execute([$uuid, $username, $password, $auth_token]);
        var_dump($regStmt->errorInfo());
        setcookie("auth", $auth_token, time() + 86400, $httponly = true);
        return true;
        /*} else {
            return false;
        }*/
    }

    public static function bcryptHash($data)
    {
        $options = [
            'cost' => 11
        ];

        return password_hash($data, PASSWORD_BCRYPT, $options);
    }

    public static function genUUID(): string
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function genAuthToken()
    {
        try {
            return bin2hex(random_bytes(64));
        } catch (Exception $e) {
            return bin2hex(openssl_random_pseudo_bytes(64));
        }
    }
}

class db
{
    public static function getConn(): PDO
    {
        $host = '127.0.0.1';
        $db = 'todo';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
        return $pdo;
    }
}