<?php


if(isset($_POST['delete_position'])){
    $role_id = $_POST['delete_role_id'];


    include "../classes/db.classes.php";
    include "../classes/delete.classes.php";
    include "../controllers/delete.controller.php";
    $deleteuser = new deletePositionController($role_id);

    
    $deleteuser->deletePositionFunc();
    header("location: ../pages/positions.php");
}

if(isset($_POST['delete_user'])){
    $user_id = $_POST['delete_user_id'];
    $user_password = $_POST['delete_password'];
    $entered_password = $_POST['entered_password'];


    include "../classes/db.classes.php";
    include "../classes/delete.classes.php";
    include "../controllers/delete.controller.php";
    $deleteuser = new deleteUserController($user_id,$user_password,$entered_password);

    
    $deleteuser->deleteUserFunc();
    header("location: ../pages/users.php?error=UserDeletedSuccessfully");
}