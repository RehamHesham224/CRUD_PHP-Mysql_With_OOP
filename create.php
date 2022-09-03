<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['errors'])){
    
   $errors=json_decode($_GET['errors'],true);
  
}
 
?>
  <div class="container my-5">
    <h1>SignUP</h1>
  <form method="POST" action="controller.php"  enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputFirstName1" class="form-label">FirstName </label>
    <input name="fname" type="text" class="form-control" id="exampleInputFirstName1" >
    <div class="link-danger">
    <?php
                if(isset($errors['fname'])){
                    echo $errors['fname'];
                }
            ?>
    </div>
  </div>
 <div class="mb-3">
    <label for="exampleInputLastName1" class="form-label">LastName </label>
    <input name="lname" type="text" class="form-control" id="exampleInputLastName1" >
    <div class="link-danger">
    <?php
                if(isset($errors['lname'])){
                    echo $errors['lname'];
                }
            ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputAddress1" class="form-label">Address </label>
    <input name="address" type="text" class="form-control" id="exampleInputAddress1" >
  </div>

  <select name="country" class="form-select" aria-label="Default select example">
    <option selected>Select Country</option>
    <option value="Egypt">Egypt</option>
    <option value="Jeman">Jeman</option>
    <option value="German">German</option>
</select>


<div  class=" my-4">
<label class="form-label">Gender </label>
<div class="form-check">
  <input value="male" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input value="female" class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
</div>


<div class="mb-3">
    <label for="exampleInputUserName1" class="form-label">UserName</label>
    <input name="username" type="text" class="form-control" id="exampleInputUserName1" >
    <div class="link-danger">
    <?php
                if(isset($errors['username'])){
                    echo $errors['username'];
                }
            ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputImg1" class="form-label">Img</label>
    <input name="img" type="file" class="form-control" id="exampleInputImg1">
  </div>
  <input type="submit" class="btn btn-primary" name="insert" value="insert">
</form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>