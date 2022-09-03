

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container my-5">
  <div class="d-flex p-2 bd-highlight justify-content-between">
  <h1>Users </h1><span class="ml-auto"><a  class='btn btn-primary' href="create.php">Create User</a></span>
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Country</th>
      <th scope="col">Gender</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col" >Image</th>
      <th scope="col" >Actions</th>

    </tr>
  </thead>
<?php
require_once('db.php');
$db=new db();
$data=$db->getData("employess");
$data=$data->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $emp){
    echo "<tr>";
    
    foreach($emp as $key=>$value){
      if($key=="img"){
        echo "<td><img width='100' height='100' src='./images/".$value."'></td>";
    }else{
      echo "<td>$value</td>";
    }
       
        
    }
    echo "<td><a class='btn btn-primary' href='show.php?id={$emp['id']}'> View</a> ";
    echo "<a class='btn btn-secondary' href='edit.php?id={$emp['id']}'> Edit</a> ";
    echo "<a class='btn btn-danger' href='delete.php?id={$emp['id']}'> Delete</a></td>";
    echo "</tr>";
}

?>

</table>
</div>
</body>
</html>