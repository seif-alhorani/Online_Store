<?php

class CreateDb{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    public function __construct(
        $dbname = null,
        $tablename = "producttb",
        $servername = null,
        $username = null,
        $password = null
    )
    {
        $env_host = getenv('DB_HOST');
        $env_name = getenv('DB_NAME');
        $env_user = getenv('DB_USER');
        $env_pass = getenv('DB_PASS');

        $this->dbname = $dbname ?? ($env_name !== false ? $env_name : 'useraccounts');
        $this->tablename = $tablename;
        $this->servername = $servername ?? ($env_host !== false ? $env_host : 'localhost');
        $this->username = $username ?? ($env_user !== false ? $env_user : null);
        $this->password = $password ?? ($env_pass !== false ? $env_pass : null);

        if ($this->username === null || $this->password === null) {
            die("Database credentials not set. Please set DB_USER and DB_PASS.");
        }
  
        // create connection
          $this->con = mysqli_connect($this->servername, $this->username, $this->password);
  
          // Check connection
          if (!$this->con){
              die("Connection failed : " . mysqli_connect_error());
          }
  
          // query
          $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
  
          // execute query
          if(mysqli_query($this->con, $sql)){
  
              $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
  
              // sql to create new table
              $sql = " CREATE TABLE IF NOT EXISTS $tablename
                              (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                               product_name VARCHAR (25) NOT NULL,
                               product_price FLOAT,
                               product_image VARCHAR (100)
                              );";
  
              if (!mysqli_query($this->con, $sql)){
                  echo "Error creating table : " . mysqli_error($this->con);
              }
  
          }else{
              return false;
          }
    }
    //get product form database
    public function getData(){
        $sql="SELECT * FROM $this->tablename";
        $result=mysqli_query($this->con,$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
}

?>
