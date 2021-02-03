<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'covidtest.trusthospital');
class DB_con
{
  // public static $con;
 function __construct()
 {
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 }
 public function fetchdata($start_from, $limit)
 {
 $myQuery = "SELECT * FROM products ORDER BY created_at DESC LIMIT $start_from, $limit";
 $result=mysqli_query($this->dbh, $myQuery);
 return $result;
 }
 public function countdata()
 {
 $myQuery = "SELECT * FROM products";
 $result=mysqli_query($this->dbh, $myQuery);
 $num = mysqli_num_rows($result);
 return $num;
 }
}


class dbData extends DB_con{
  public $id;

//   public function __construct($cat_id){
//   $this -> id = $cat_id;
// }

//this gets data for ad1
  public function getAdData($cat_id){
    $this -> id = $cat_id;
    $myQuery = "SELECT * FROM categories WHERE id = $this->id";
    $result=mysqli_query($this->dbh, $myQuery);
    return $result;
  }


//get data for categories page
  public function getCatData($cat_id){
    $this -> id = $cat_id;
    $myQuery = "SELECT * FROM products WHERE cat_id = $this->id";
    $result=mysqli_query($this->dbh, $myQuery);
    return $result;
  }

  public function countCatData($cat_id){
    $this -> id = $cat_id;
    $myQuery = "SELECT * FROM products WHERE cat_id = $this->id";
    $result=mysqli_query($this->dbh, $myQuery);
    $num = mysqli_num_rows($result);
    return $num;
  }

      
}
