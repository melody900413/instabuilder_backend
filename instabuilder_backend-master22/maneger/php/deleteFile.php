<?php
    session_start();
    include '../../../php/DataBase.php';
    $db = DB();
    $sql ="DELETE \n".
    "FROM\n".
    "	\user\\n".
    "WHERE\n".
    "	user_id =". $_SESSION["dele_id"];

    $db->query($sql);
    $_SESSION["dele_sure"] = true;
    header('Location: ../delete.php');