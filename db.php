<?php
class db{
    private $host="localhost";
    private $dbname="summertraining";
    private $user="root";
    private $password="";
    private $connection;

    function __construct()
    {
       try{
        $this->connection=new pdo("mysql:$this->host=localhost;dbname=$this->dbname",
        $this->user,
        $this->password);
       }catch(PDOException $e){
        echo $e->getMessage();
       }
    }
    function get_connection(){
        return $this->connection;
    }
    function delete($table,$condition=1){
        $this->connection->query("delete from $table where $condition");
    }
    function getData($table, $condition=1){
        return $this->connection->query("select * from $table where $condition");
    }
    function insert($table, $cols , $values ,$array_data){
        $stm=$this->connection->prepare("insert into $table ($cols) values ($values)");
        $stm->execute($array_data);
    }
    function update($table, $statement, $condition ,$array_data){
        $stm=$this->connection->prepare("update $table SET $statement where $condition");
        $stm->execute($array_data);
    }
}
?>