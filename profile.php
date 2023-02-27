<?php
   $name=$_POST['name'];
   $area=$_POST['area'];
   $number=$_POST['number'];
   $age=$_POST['age'];
   $gender=$_POST['gender'];
   
   $conn1= new mysqli("localhost","root","","guvi");
   if($conn1->connect_error){
    die('connection failed :'.$conn1->connect_error);
   }else{
    $stmt=$conn1->prepare("insert into profile (name,area,number,age,gender)values(?,?,?,?,?)");
    $stmt->bind_param('ssiis',$name,$area,$number,$age,$gender);
    $stmt->execute();
    echo "<h3>Registration Successfully</h3>";
    $stmt->close();
    $conn1->close();
   }
?>