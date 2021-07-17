<?php
require_once "product.php";
require_once "connection.php";
$queryString= $connection->prepare("select * from products where status=1 ");
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
h1 ,h2 {

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
<h2><a href="deleteprod.php">Show Delete Product</a></h2>
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
      <td><a href="edit.php?id=<?= $prod->id?>"><i class="fa fa-edit"></i></a> | <a href="softdelete.php?id=<?= $prod->id?>"><i class="fa fa-eraser"></i></a></td>
    </tr>
    <?php endforeach; ?>      
  </tbody>
</table>
</div>
<div class="row">
<form class="row g-3" action="insert.php" method="POST">
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Pro_Name</label>
    <input type="text" class="form-control"  name="proName" id="validationServer01" placeholder="proname" required>
  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Prod_Brand</label>
    <input type="text" class="form-control " name="prodBrand"  id="validationServer02" placeholder="prodbrand" required>
  </div>
  <div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Prod_Expiry_Date</label>
    <div class="input-group has-validation">
      <input type="date" class="form-control " name="prod_expiry_date"  id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationServer03" class="form-label">Prod_Availability</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" value="0" name="prod_availability" id="flexRadioDefault1" checked>
  <label class="form-check-label" for="flexRadioDefault1">Available</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"  value="1" name="prod_availability" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">Not Available</label>
</div>
  </div>
 
  <div class="col-12">
    <button class="btn btn-primary" name="insert"  type="submit">Insert</button>
  </div>
</form>
</div>
</div>
</body>
</html>

