<?php
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
    //start Session
    session_start();


    //create constants to store non repeating values
    define('SITEURL_USER','http://localhost/homeverse/');
    define('SITEURL_ADMIN','http://localhost/homeverse/admin/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'homeverse');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>