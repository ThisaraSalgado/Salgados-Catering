<?php
$title = "Manage bakery product objects";
require './Controller/BakeryController.php';
$bakeryController = new BakeryController();

$content = $bakeryController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $bakeryController->DeleteBakery($_GET["delete"]);
}
include './Template.php';
?>

