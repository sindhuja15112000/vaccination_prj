<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $repeat_password = $_POST['re_pass'];


    //Dtabase conn

    $conn = new mysqli('localhost:3325','root','sindhuja.k','vcare4u');
  	if($conn->connect_error){
  		echo "$conn->connect_error";
  		die("Connection Failed : ". $conn->connect_error);
  	} else {
  		$stmt = $conn->prepare("insert into signup(name, email,password,repeat_password) values(?, ?, ?, ?)");
  		$stmt->bind_param("ssss", $name,$email, $password,$repeat_password);
  		$execval = $stmt->execute();
  		echo $execval;
                echo "<script> location.href='link.html'; </script>";
  		$stmt->close();
  		$conn->close();
  	}
 ?>
