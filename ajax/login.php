<?php session_start();
require __DIR__.'/../db.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $cekUser = $mysql->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password')");
        if ($cekUser->num_rows > 0){
            $_SESSION['user'] = $cekUser->fetch_object();
            echo "OK";
        }else{
            echo "NO";
        }
    } catch (mysqli_sql_exception $th) {
        die($th->getMessage());
    }

}else{
    die("Method not allowed");
}
