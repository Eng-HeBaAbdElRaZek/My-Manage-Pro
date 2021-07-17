<?php
require_once "product.php";
require_once "connection.php";
$queryString= $connection->prepare("select * from products where status=0");
$queryString->execute();
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'product');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user managment system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"  integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
h1,h2{

    text-align: center;
    color: #f03bc5;
    margin: 16px;
}
a{
  text-decoration: none;
    color: #f03bc5;

}
a:hover{
  color: floralwhite;
}
body{
    background:#00008b;
}
.table-success {
    --bs-table-bg: #fed5fe!important;
    --bs-table-striped-bg: #b474a9!important;
    color: #0e07b0!important;
    font-size: 20px;
    text-align: center;
    
}
.table-striped>tbody>tr:nth-of-type(odd) {
    color: #fff!important;
}
form{
    background: #fed5fe;
}
.fa {
    color: darkblue!important;
    font-size: 30px!important;
}

</style>
</head>
<body>

<div class="container">
<div class="row">
<h1>User Managment System</h1>
<h2><a href="index.php">Show  Product</a></h2>
<table  class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pro_Name</th>
      <th scope="col">Pro_Prand</th>
      <th scope="col">Prod_Expiry_Date</th>
      <th scope="col">Expiry</th>
      <th scope="col">Prod_Availability</th>
      <th scope="col">Manage</th>

    </tr>
  </thead>
  <tbody>
    <?php  foreach($products as $prod):?>
      <tr> 
      <td><?= $prod->id?></td>
      <td><?= $prod->pro_name?></td>
      <td><?= $prod->prod_brand?></td>
      <td><?= $prod->prod_expiry_date?></td>
      <td><?= $prod->expiry?></td>
      <td><?= $prod_availability=($prod->prod_availability==0)?"available":"not available";"prod_availability: ".$prod->prod_availability;?></td> 
      <td><a href="restordelete.php?id=<?= $prod->id?>"><i class="fa fa-undo"></i></a> | <a onclick="return confirm('Are you sure that you want to remove that user?')"  href="delete.php?id=<?= $prod->id?>"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>      
  </tbody>
</table>
</div>


</div>
</body>
</html>

