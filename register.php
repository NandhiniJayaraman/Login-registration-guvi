<?php
   $fullname=$_POST['fullname'];
   $username=$_POST['username'];
   $email=$_POST['email'];
   $pwd=$_POST['password'];
   
   $conn= new mysqli("localhost","root","","guvi");
   if($conn->connect_error){
    die('connection failed :'.$conn->connect_error);
   }else{
    $stmt=$conn->prepare("insert into register (fullname,username,email,password)values(?,?,?,?)");
    $stmt->bind_param('ssss',$fullname,$username,$email,$pwd);
    $stmt->execute();
    echo "<h3>Registration Successfully</h3>";
    $stmt->close();
    $conn->close();
   }
?>