<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test1";
if(isset($_POST['OBJECT']))
{
   $Event = json_decode($_POST['OBJECT'],true);
   $conn = new mysqli($servername,$username,$password,$dbname);
   if($conn->connect_error)
   {
  	die("Connection failed: " .$conn->connect_error);
   }
   
	 for($i=0;$i<count($Event);$i++){
	      $type=$Event[$i]["typeofeventis"];  
		  $target=$Event[$i]["targetofeventis"]; 
		  $date=$Event[$i]["dateofeventis"]; 
   $sql = "Insert Into sort values('$type','$target','$date')";
  $conn->query($sql);
	
   if($conn->affected_rows > 0)
   {
     echo "The Events Inserted Successfully";
   }
   else
   {
     echo "Sorry: Problem With Insertion";	
   } 	
}
}
 
 
if(isset($_GET['OBJECT']))
 {
   $sql = "SELECT * FROM sort";
   $conn = new mysqli($servername,$username,$password,$dbname);
   if($conn->connect_error)
   {
  	die($conn->connect_error);
   }

  

	 if ($result = $conn->query($sql))
	 {
    $rows = array();
    if($result->num_rows > 0)
	{
     while($row = $result->fetch_assoc())
	 {
      array_push($rows, $row);
     }
   
    echo json_encode($rows);
   }
 }
 else
 {
  echo "No Data to Retrieve";
}
}

 
 ?>

















