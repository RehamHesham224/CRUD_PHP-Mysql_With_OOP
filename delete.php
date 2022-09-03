<?php
require_once('db.php');
if(isset($_GET['id'])){
try{
    $db=new db();
    $db->delete("employess","id ={$_GET['id']}");

    header("Location:index.php");

}catch(PDOException $e ){
    echo $e->getMessage();

}}else{
    die("Error");
}
?>