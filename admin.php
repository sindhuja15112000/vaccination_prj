<?php

    $login_name = $_POST['username'];
    $login_password = $_POST['password'];
    if(($login_name == "admin") && ($login_password == "admin"))
      {
        echo "<script> location.href='display.php'; </script>";
			}
		else{
			echo "invalid";
			}
      
 ?>
