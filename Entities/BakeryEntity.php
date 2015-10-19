<?php


class BakeryEntity
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $image;
    public $description;
    
    function __construct($id, $name, $type, $price, $image, $description) {
        $this->id = $id;
        $this->name =$name;
        $this->type =$type;
        $this->price =$price;
        $this->image = $image;
        $this->description =$description;
        
    }
}


?>