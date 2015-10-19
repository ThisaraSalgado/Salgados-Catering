<script>
 //Display a confirmation box when trying to delete an object
 function showConfirm(id)
 {
     //build the confirmation box
     var c = confirm("Are you sure you wish to delete");
     
     //if true, delete item and refresh
     if(c)
         window.location = "BakeryOverview.php?delete=" + id;
 }
 </script>


<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BakeryController
 *
 * @author Thisara Salgado
 */

require ("Model/BakeryModel.php");

//Contains non-database related function for the Baker page
class BakeryController 
{
    function CreateOverviewTable()
    {
        $result = "
                <table class='overViewTable'>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Id</b></td>
                    <td><b>Name</b></td>
                    <td><b>Type</b></td>
                    <td><b>Price</b></td>
                    <td><b>Description</b></td>
                    
                </tr>"
                ;
        
        $bakeryArray = $this->GetBakeryByType('%');
        
        foreach ($bakeryArray as $key => $value)
        {
            $result = $result.
                    "<tr>
                        <td><a href='BakeryAdd.php?update=$value->id'>Update</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                        <td>$value->id</td>
                        <td>$value->name</td>
                        <td>$value->type</td>
                        <td>$value->price</td>
                        <td>$value->description</td>
                    </tr>";
        }
        
        $result = $result . "</table>";
        return $result;
        
    }
            
    function CreateBakeryDropdownList()
    {
       $bakeryModel = new BakeryModel();
       $result = "<form action = '' method = 'post' width ='200px' >
                Please select a type:
               <select name = 'types' >
                    <option value = '%'>All</option>
                    ".$this->CreateOptionValues($bakeryModel->GetBakeryTypes()).
               "</select>
               <input type = 'submit' value = 'Search'/>
               </form>";
       
       return $result;
    }
    
    function CreateOptionValues(array $valueArray)
    {
        $result = "";
        
        foreach ($valueArray as $value)
        {
            $result = $result . "<option value='$value'>$value</option>";
            
        }
        
        return $result;
    }
    
    function CreateBakeryTables($types)
    {
        $bakeryModel = new BakeryModel();
        $bakeryArray = $bakeryModel->GetBakeryByType($types);
        $result ="";
        
        //Generate a bakeryTable for each coffeeEntity in array
        foreach ($bakeryArray as $key => $bakery)
        {
            $result = $result .
                    "<table class = 'bakeryTable'>
                        <tr>
                            <th rowspan='6' width = '150px'><img runat = 'server' src = '$bakery->image' /></th>
                            <th width='75px' >Name:</th>
                            <td>$bakery->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type :</th>
                            <td>$bakery->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price :</th>
                            <td>$bakery->price </td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$bakery->description</td>
                        </tr>

                        </table>";
                    
        }
        return $result;
    }
    
    //Returns list of files in a folder.
    function GetImages()
    {
        //Select folder to scan
        $handle = opendir("Images/Bakery");
        
        //Read all files and store names in array
        while($image = readdir($handle))
        {
            $images[] = $image;
        }
        
        closedir($handle);
        
        //Exclude all filenames where filename length <3
        $imageArray = array();
        foreach ($images as $image)
        {
            if(strlen($image) >2)
            {
                array_push($imageArray, $image);
            }    
        }
        
        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }
    //<editor-fold desc="Set methods">
    function InsertBakery()
    {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $image = $_POST["ddlImage"];
        $description = $_POST["txtDescription"];
        
        $bakeryproduct = new BakeryEntity(-1, $name, $type, $price, $image, $description);
        $bakeryModel = new BakeryModel();
        $bakeryModel->InsertBakery($bakeryproduct);
        
        
    }
    
    function UpdateBakery($id)
    {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $image = $_POST["ddlImage"];
        $description = $_POST["txtDescription"];
        
        $bakeryproduct = new BakeryEntity($id, $name, $type, $price, $image, $description);
        $bakeryModel = new BakeryModel();
        $bakeryModel->UpdateBakery($id, $bakeryproduct);
        
    }
    
    function DeleteBakery($id)
    {
        $bakeryModel = new BakeryModel();
        $bakeryModel->DeleteBakery($id);
    } 
    //</editor-fold>
    
    //<editor-fold desc="Get methods">
    function GetBakeryById($id) 
    {
        $bakeryModel = new BakeryModel();
        return $bakeryModel->GetBakeryByid($id);
    }
    
    function GetBakeryByType($type) 
    {
        $bakeyModel = new BakeryModel();
        return $bakeyModel->GetBakeryByType($type);
    }
    
    function GetBakeryTypes()
    {
        $bakeyModel = new BakeryModel();
        return $bakeyModel->GetBakeryTypes();
    }
    //</editor-fold>

}
