<?php
require_once('db.php');
$db=new db();
if(isset($_POST['insert'])){
//validation
$fname=validation($_POST['fname']);
$lname=validation($_POST['lname']);
$address=validation($_POST['address']);
$country=validation($_POST['country']);
$gender=validation($_POST['gender']);
$username=validation($_POST['username']);
$password=validation($_POST['password']);
$errors=[];
if(strlen($fname)<2){
    $errors["fname"]="First name must be more than 2 char .."; 
}
if(strlen($lname)<2){
    $errors["lname"]="Last name must be more than 2 char .."; 

}
if(strlen($username)<2){
    $errors["username"]="User Name must be more than 2 char .."; 

}

if(count($errors)>0){
    
    header("Location:create.php?errors=".json_encode($errors));
    exit;
}else{
    move_uploaded_file($_FILES["img"]["tmp_name"],"./images/".$_FILES["img"]["name"]);

    $db->insert("employess",
    "fname,lname,address,country,gender,username,password,img",
    "?,?,?,?,?,?,?,?",
    [$fname,
    $lname,
    $address,
    $country,
    $gender,
    $username,
    $password,
    $_FILES["img"]["name"]]);

         header("Location:index.php");
    }
}
    

//===================Update========================
if(isset($_POST['update'])){
    
 $db->update("employess",
"fname=?,lname=?,address=?,country=?,gender=?,username=?,password=?",
"id=?",
[$_POST['fname'],
$_POST['lname'],
$_POST['address'],
$_POST['country'],
$_POST['gender'],
$_POST['username'],
$_POST['password'],
$_POST['id']
]);

header("Location:index.php");

}

// ========================Login===================
if(isset($_POST['login'])){
    //login 

    try{ 
        $emp=$db->getData("employess","username ='{$_POST['username']}' and password='{$_POST['password']}'");
        $emp->fetchAll(PDO::FETCH_ASSOC);
       if($emp){
           session_start(); 
           $_SESSION["fname"]=$emp["fname"];
           header("Location:index.php");
       }else{
           //go to Login
           header("Location:login.php");
       }

    }catch(PDOException $e ){
        echo $e->getMessage();
        
    }
  

}



function validation($data){
    $data=trim($data);
    $data= htmlspecialchars($data);
    $data=stripcslashes($data);

  return  $data;

}


?>