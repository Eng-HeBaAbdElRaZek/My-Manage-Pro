<?php
require_once "connection.php";

if (isset($_POST["insert"])&& !empty($_POST)) {
   $queryString= $connection->prepare("INSERT INTO products (pro_name,prod_brand,prod_expiry_date,prod_availability,status)VALUES(?,?,?,?,?)");
   $pro_name=$_POST["proName"];
   $prod_brand=$_POST["prodBrand"];
   $prod_expiry_date=$_POST["prod_expiry_date"];
   $prod_availability=$_POST["prod_availability"];
   $status=1;
   if($queryString->execute([$pro_name, $prod_brand, $prod_expiry_date,$prod_availability,$status])){
       header("location: index.php");
   }else{
     //  echo $queryString;
       echo "faild to insert";
       header("Refresh: 3;URL=index.php");
   }
}else{
    echo "Dont insert";
    header("Refresh:3 ;URL=index.php");
}

?>