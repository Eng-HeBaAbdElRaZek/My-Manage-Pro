<?php
include("product.php");
try {
    $connection=new PDO('mysql:host=localhost;dbname=vendor','root','');
   // var_dump($connection);
   $queryString= $connection->prepare("select * from products");
   $queryString->execute();
   $users=$queryString->fetchAll(PDO::FETCH_CLASS,'product');
   foreach($product as $prod){ 
    
      echo $prod->proName."</br>";
      echo $prod->prodBrand."</br>";
      echo $prod->prodExpiryDate."</br>";
      echo ($prod->$availability==1)?"available":"notavailable";
      //echo $prod->login("heba",123)."</br>";
   }
//    echo "<pre>";
//    var_dump($users);
} catch (PDOException $exception) {
   echo $exception->getMessage();
}

// function calc($e){
//     if ($e>=10) {
//         return "yes";
//     }else{
//         throw new Exception("sorry y number is not >=10");
//     }
// }
// try{
// echo clac(5);
// }catch (Exception $error){
// echo $error->getMessage();
// }
?>