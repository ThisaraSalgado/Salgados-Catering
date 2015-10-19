<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BakeryModel
 *
 * @author Thisara Salgado
 */

require ("Entities/BakeryEntity.php");

//Contains database related code for the Bakery page
class BakeryModel 
{
    //Get allthe bakery types from the database and return them in array
    function GetBakeryTypes()
    {
        require 'Credentials.php';
        
        //Open connection and Select databsse.
        mysql_connect($host,$user,$passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT type FROM bakeryproducts") or die(mysql_error());
        $types = array();
        
        //Get data from database
        while($row = mysql_fetch_array($result))
        {
            array_push($types, $row[0]);   
        }
        
        //Close connection and return result.
        mysql_close();
        return $types;
        
    }
    
    function GetBakeryByType($type)
    {
        require 'Credentials.php';
        
        //Open connection and Select databsse.
        mysql_connect($host,$user,$passwd) or die(mysql_error());
        mysql_select_db($database);
        
        $query = "SELECT * FROM bakeryproducts WHERE type LIKE '$type'";
        $result = mysql_query($query) or die(mysql_error());
        $bakeryArray = array();
        
        //Get data from database
        while ($row = mysql_fetch_array($result))
        {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $image = $row[4];
            $description = $row[5];
            
            //Create bakery objects and store them in an array.
            $bakeryproduct = new BakeryEntity($id,$name,$type,$price,$image,$description);
            array_push($bakeryArray, $bakeryproduct);
        }  
            //Close connection and return result
            mysql_close();
            return $bakeryArray;
            
        }
        
    function GetBakeryByid($id)
    {
        require 'Credentials.php';
        
        //Open connection and Select databsse.
        mysql_connect($host,$user,$passwd) or die(mysql_error());
        mysql_select_db($database);
        
        $query = "SELECT * FROM bakeryproducts WHERE id = $id";
        $result = mysql_query($query) or die(mysql_error());
        
        
        //Get data from database
        while ($row = mysql_fetch_array($result))
        {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $image = $row[4];
            $description = $row[5];
            
            //Create bakery product
            $bakeryproduct = new BakeryEntity($id,$name,$type,$price,$image,$description);
        }  
            //Close connection and return result
            mysql_close();
            return $bakeryproduct;
    }
    
    function InsertBakery(BakeryEntity $bakeryproduct)
    {
        $query = sprintf("INSERT INTO bakeryproducts
                (name, type, price, image, description)
                VALUES
                ('%s','%s','%s','%s','%s')",
                mysql_real_escape_string($bakeryproduct->name),
                mysql_real_escape_string($bakeryproduct->type),
                mysql_real_escape_string($bakeryproduct->price),
                mysql_real_escape_string("Images/Bakery/".$bakeryproduct->image),
                mysql_real_escape_string($bakeryproduct->description));
                
        $this->PerformQuery($query);
    }
    
    function UpdateBakery($id, BakeryEntity $bakeryproduct)
    {
        $query = sprintf("UPDATE bakeryproducts
                SET name = '%s', type = '%s', price = '%s',
                image = '%s', description = '%s'
                WHERE id = $id",
                mysql_real_escape_string($bakeryproduct->name),
                mysql_real_escape_string($bakeryproduct->type),
                mysql_real_escape_string($bakeryproduct->price),
                mysql_real_escape_string("Images/Bakery/".$bakeryproduct->image),
                mysql_real_escape_string($bakeryproduct->description));
                
        $this->PerformQuery($query);
    }
    
    function DeleteBakery($id)
    {
        $query = "DELETE FROM bakeryproducts WHERE id = $id";
        $this->PerformQuery($query);
    }
    
    function PerformQuery($query)
    {
        //Open connection and select database.
        require 'Credentials.php';
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        
        
        //Execute query and close connection
        mysql_query($query) or die(mysql_error());
        mysql_close();
    }
}
