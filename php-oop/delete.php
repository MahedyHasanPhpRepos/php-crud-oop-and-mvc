<?php


$page_title = 'delete';
include('./common/header.php');
include('./interfaces/CrudInterface.php');
include('./classes/DbConfig.php');
include('./classes/Crud.php');

$crud = new Crud();


$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $done = $crud->delete($id);
    if ($done) {
        header("location:index.php");
    } else {
        echo "something went wrong";
    }
}
