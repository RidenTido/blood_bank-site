<?php
$u=$_POST['username'];
$n=$_POST['email'];
$c=$_POST['password'];
$m=$_POST['contact'];
$con=mysqli_connect("localhost","root","","blood_bank");
$sql="INSERT INTO registration(username,email,password,contact) values('$u','$n','$c','$m')";
$r=mysqli_query($con,$sql);
if($r)
{
    echo "Registered Successfully";
}
else
{
    echo "Not Registered";
}
?>
