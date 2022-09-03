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
<ul class="list-group">
<?php
    require_once('db.php');
session_start();
if(!isset($_SESSION['fname'])){
    header("Location:login.php");
}
echo 'hi '.$_SESSION['fname'];

//conenction 
if(isset($_GET['id'])){

    $db=new db();
    $data=$db->getData("employess"," id ={$_GET['id']}");
    $data=$data->fetch(PDO::FETCH_ASSOC);
    foreach($data as $value){
        echo "  <li class='list-group-item'>$value</li>";
    
    }
    
    //close 
    
    
}else{
    die("Error ...");
}

?>
</ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>