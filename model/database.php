<?php
/* 9-18-20  Dustin Bryant   created page
 * 9-23-20  Dustin Bryant   added constructor
*/
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=my_portfolio';
    private static $username = 'portfolio_user';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('error.php');
                exit();
            }
        }
        return self::$db;
    }
}
//$dsn = 'mysql:host=localhost;dbname=my_portfolio';
//    $username = 'portfolio_user';
//    $password = 'Pa$$w0rd';
//
//    try {
//        $db = new PDO($dsn, $username, $password);
//    } catch (PDOException $e) {
//        $error_message = $e->getMessage();
//        include('./model/error.php');
//        exit();
//    }
?>