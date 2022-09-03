<?php
require_once('db.php');
session_start();
if(!isset($_SESSION['fname'])){
    header("Location:login.php");
}
echo 'hi '.$_SESSION['fname'];


if(isset($_GET['id'])){
    
  $db=new db();
  $data=$db->getData("employess"," id ={$_GET['id']}");
  $data=$data->fetch(PDO::FETCH_ASSOC);
}else{
    die("Error");
}


?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

  <div class="container my-5">
    <h1>Edit</h1>
  <form method="POST" action="controller.php">
  <input type="hidden" name="id" value="<?=$data['id']?>" >
  <div class="mb-3">
    <label for="exampleInputFirstName1" class="form-label">FirstName </label>
    <input  value="<?=$data['fname']?>" name="fname" type="text" class="form-control" id="exampleInputFirstName1" >
  </div>
 <div class="mb-3">
    <label for="exampleInputLastName1" class="form-label">LastName </label>
    <input  value="<?=$data['lname']?>" name="lname" type="text" class="form-control" id="exampleInputLastName1" >
  </div>
  <div class="mb-3">
    <label for="exampleInputAddress1" class="form-label">Address </label>
    <input  value="<?=$data['address']?>" name="address" type="text" class="form-control" id="exampleInputAddress1" >
  </div>

  <select name="country" class="form-select" aria-label="Default select example">
    <option selected>Select Country</option>
    <option <?php if($data['country']== 'Egypt') echo'Selected'; ?>  value="Egypt">Egypt</option>
    <option <?php if($data['country']== 'Egypt')echo'Jeman'; ?> value="Jeman">Jeman</option>
    <option <?php if($data['country']== 'German')echo'Selected'; ?> value="German">German</option>
</select>


<div  class=" my-4">
<label class="form-label">Gender </label>
<div class="form-check">
  <input <?php if($data['gender']== 'male')echo'checked'; ?> value="male" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input <?php if($data['gender']== 'female')echo'checked'; ?> value="female" class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
</div>


<div class="mb-3">
    <label for="exampleInputUserName1" class="form-label">UserName</label>
    <input value="<?=$data['username']?>" name="username" type="text" class="form-control" id="exampleInputUserName1" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input value="<?=$data['password']?>" name="password" type="text" class="form-control" id="exampleInputPassword1">
  </div>

  <button name="update" type="sbmit" class="btn btn-primary">Submit</button>
</form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>