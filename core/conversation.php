<?php

require __DIR__."/../db.php";
function getConversationByUserId(int $userID){
    return $GLOBALS['mysql']->query("SELECT * FROM conversation WHERE user_1='$userID' OR user_2='$userID'");
}
