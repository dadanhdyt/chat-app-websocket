<?php
try {
    $mysql = new mysqli(
        hostname:"localhost",
        username:"root",
        database:"chatting_app",
        password : ""
    );
} catch (mysqli_sql_exception $th) {
    die($th->getMessage());
}
