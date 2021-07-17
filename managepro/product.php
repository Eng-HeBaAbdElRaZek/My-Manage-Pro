<?php

class product{
    //proparty
    public $proName;
    public $prodBrand;
    public $prod_expiry_date;
    public $prod_availability;
    public $expiry;
   



    //method
    public function __construct(){
    $prod_expiry_date =$this->prod_expiry_date;
    $dif=date_diff(date_create($prod_expiry_date),date_create(date("Y-m-d")));
     $this->expiry=$dif->format('%m');

    } 
}
    ?>