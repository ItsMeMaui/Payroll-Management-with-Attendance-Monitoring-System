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