<?php
require_once __DIR__."/../db.php";
function getUserById(int $id){
    return $GLOBALS['mysql']->query("SELECT * FROM user WHERE id='$id'");
}
