<?php
if(isset($_POST['submit']))
{ 
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']))
	header("location:index.html");
else
{
	$a=$_POST['name'];
	$b=$_POST['email'];
	$c=$_POST['subject'];
    $d=$_POST['message'];

}
$dbHost = 'localhost';//or localhost
$dbName = 'cars123'; // your db_name
$dbUsername = 'root'; // root by default for localhost 
$dbPassword = '';  // by default empty for localhost

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";





$sql = "CREATE TABLE if not exists customer(
    name VARCHAR(30) NOT NULL,
    email varchar(50) NOT NULL,
    subject varchar(30) NOT NULL,
    message varchar(500) NOT NULL)";
if(mysqli_query($conn, $sql))
{
    echo "<br>Table created successfully</br>";
} 
else
{
    echo "ERROR: Could not create table " . mysqli_error($conn);
}



$sql = "INSERT INTO customer VALUES ('$a','$b','$c','$d')";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} 
else
{
    echo "ERROR: Could not insert values " . mysqli_error($conn);
}



// To retrieve data
$sql = "select * from customer";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
                
                echo "<br>";
                echo " " . $row['name'];
                echo " " . $row['email'];
                echo " " . $row['subject'];
                echo " " . $row['message'];
                
           
        }
      
        // Free result set
        mysqli_free_result($result);
    } 
    else{
        echo "No records could be retrieved.";
    }
}
/*
$sql = "UPDATE employee SET age=98 WHERE name='abc'";
if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$sql = "DELETE FROM employee WHERE name='xyz'";
if(mysqli_query($conn, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "DELETE FROM employee";
if(mysqli_query($conn, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/

mysqli_close($conn);

 }
 else
 {
 	header("location:index.html");
 }
?>
