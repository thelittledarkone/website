<?php
class CreateDb{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;
    
    //class constructor
    public function __construct(
        $dbname="Newdb", 
        $tablename="Newtb", 
        $servername="localhost",
        $username="serapces_5233_cg",
        $password="Kw25364758697"
    ){
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        
        //create connection
        $this->con = mysqli_connect($servername, $username, $password);
        
        //Check connection
        if(!$this->con){
            die('Connection Failed:'.mysqli_connect_error());
        }
        
        //Query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        
        //Execute Query
        if(mysqli_query($this->con, $sql)){
            $this->con = mysqli_connect($servername, $username, $password, $dbname);
            
            //sql to create a new table
            $sql=" CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(65) NOT NULL,
            product_price FLOAT,
            product_image VARCHAR(100)
            );";
            
            if(!mysqli_query($this->con, $sql)){
                echo "Error creating table:".mysqli_error($this->con);
            }
        }else{
            return false;
            echo "Database not created";
        }
    }
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);
            
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
}
?>