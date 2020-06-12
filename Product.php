<?php

class Product{
     public $name;  
     public $price;
     public $image;      
     public function __construct($name, $price, $image)
     {
         $this->name = $name;
         $this->price = $price;
         $this->image = $image;
     }  

     public function getName(){
         return $this->name;
     }  
     public function setName($newName){
         $this->name = $newName;
     }
     
     public function getPrice(){
        return $this->price;
    }  
    public function setPrice($newPrice){
        $this->price = $newPrice;
    }

    public function getImage(){
        return $this->image;
    }  
    public function setImage($newImage){
        $this->image = $newImage;
    }
}
?>