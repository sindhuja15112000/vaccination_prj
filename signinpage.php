<?php

    $login_name = $_POST['your_name'];
    $login_password = $_POST['your_pass'];

   //Dtabase conn

    $conn = new mysqli('localhost:3325','root','sindhuja.k','vcare4u');
  	if($conn->connect_error){
  		echo "$conn->connect_error";
  		die("Connection Failed : ". $conn->connect_error);
  	} else {
  		$stmt = $conn->prepare("insert into signin(login_name,login_password) values(?, ?)");
  		$stmt->bind_param("ss", $login_name,$login_password);
  		$execval = $stmt->execute();
  		echo $execval;
  		echo "<script> location.href='link.html'; </script>";
  		$stmt->close();
  		$conn->close();
  	}


 ?>
