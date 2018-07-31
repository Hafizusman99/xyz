<?php
include 'Connection.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$name1=$_POST['lname'];

$q1= mysqli_query($conn, "INSERT INTO `ajax`(Name, lname) VALUES ( '$name','$name1')");
 if($conn->query($ql))
  {
echo "successfully";

  }
  else
  {
    echo "failed";
  }
}
?>