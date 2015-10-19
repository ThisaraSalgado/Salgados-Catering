<?php
require './Controller/BakeryController.php';
$bakeryController = new BakeryController();


$title = "Add a new Bakery Product";

if(isset($_GET["update"]))
{
    $bakeryproduct = $bakeryController->GetBakeryById($_GET["update"]);
    
    $content = "<form action='' method='post'>
    <fieldset>
        <legend>Add a new Bakery Product</legend>
        <label for='name'>Name : </label>
        <input type='text' class='inputField' name='txtName' value='$bakeryproduct->name'/><br/>
        
        <label for='type'>Type : </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$bakeryController->CreateOptionValues($bakeryController->GetBakeryTypes()).
        "</select><br/>
        
        <label for='price'>Price : </label>
        <input type='text' class='inputField' name='txtPrice' value='$bakeryproduct->price' /><br/>
        
        
        <label for='image'>Image : </label>
        <select class='inputField' name='ddlImage'>"
        .$bakeryController->GetImages().
        "</select></br>
        
        <label for='description'>Description: </label>
        <textarea cols='70' rows='12' name='txtDescription'>$bakeryproduct->description</textarea></br>
        
        <input type='submit' value='Submit'>
        
        
        
    </fieldset>
</form>
";
} 
else
{
    $content = "<form action='' method='post'>
    <fieldset>
        <legend>Add a new Bakery Product</legend>
        <label for='name'>Name : </label>
        <input type='text' class='inputField' name='txtName' /><br/>
        
        <label for='type'>Type : </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$bakeryController->CreateOptionValues($bakeryController->GetBakeryTypes()).
        "</select><br/>
        
        <label for='price'>Price : </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>
        
        
        <label for='image'>Image : </label>
        <select class='inputField' name='ddlImage'>"
        .$bakeryController->GetImages().
        "</select></br>
        
        <label for='description'>Description: </label>
        <textarea cols='70' rows='12' name='txtDescription'></textarea></br>
        
        <input type='submit' value='Submit'>
        
        
        
    </fieldset>
</form>
";
}

$content = "<form action='' method='post'>
    <fieldset>
        <legend>Add a new Bakery Product</legend>
        <label for='name'>Name : </label>
        <input type='text' class='inputField' name='txtName' required pattern='[a-zA-Z ]+'><br/>
        
        <label for='type'>Type : </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$bakeryController->CreateOptionValues($bakeryController->GetBakeryTypes()).
        "</select><br/>
        
        <label for='price'>Price : </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>
        
        
        <label for='image'>Image : </label>
        <select class='inputField' name='ddlImage'>"
        .$bakeryController->GetImages().
        "</select></br>
        
        <label for='description'>Description: </label>
        <textarea cols='70' rows='12' name='txtDescription' required></textarea></br>
        
        <input type='submit' value='Submit'>
        
        
        
    </fieldset>
</form>
";

if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]))
    {
        $bakeryController->UpdateBakery($_GET["update"]);
    }
}
else
{
    if(isset($_POST["txtName"]))
{
    $bakeryController->InsertBakery();
}
}



include './Template.php';
?>



