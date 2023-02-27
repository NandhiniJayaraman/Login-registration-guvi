<?php
$un=$_POST['username'];
$pwd=$_POST['password'];
// databse connection
$con= new mysqli("localhost","root","",'guvi');
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}else{
    $stmt=$con->prepare("select * from register where username=?");
    $stmt->bind_param("s",$un);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['password']===$pwd){
            echo "<h2>login successfully</h2>";
        }else{
            echo "<h2>invalid username and password</h2>";
        }

    }else{
        echo "<h2>Invalid username or password </h2>";
    }
}
?>