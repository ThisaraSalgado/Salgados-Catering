<?php

require 'Controller/BakeryController.php';
$bakeryController = new BakeryController();

if(isset($_POST['types']))
{
    //Fill page with bakery products of the selected type
    $bakeryTables = $bakeryController->CreateBakeryTables($_POST['types']);
}

else
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $bakeryTables = $bakeryController->CreateBakeryTables('%');
}

//Output page Data
$title = 'Bakery overview';
$content = $bakeryController->CreateBakeryDropdownList().$bakeryTables;
include 'Template.php';
?>