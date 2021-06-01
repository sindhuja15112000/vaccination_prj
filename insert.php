<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['Aadhar']) &&
        isset($_POST['address']) && isset($_POST['bloodgrp']) &&
        isset($_POST['gender']) && isset($_POST['corona']) &&
        isset($_POST['email']) && isset($_POST['history'])  &&
        isset($_POST['vaccine']) && isset($_POST['phone']) &&
        isset($_POST['height']) && isset($_POST['weight'])) {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $bloodgrp = $_POST['bloodgrp'];
        $Aadhar_no = $_POST['Aadhar'];
        $gender = $_POST['gender'];
        $corona = $_POST['corona'];
        $email = $_POST['email'];
        $history = $_POST['history'];
        $vaccine = $_POST['vaccine'];
        $phone_no = $_POST['phone'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $host = "localhost:3325";
        $dbUsername = "root";
        $dbPassword = "sindhuja.k";
        $dbName = "vcare4u";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(name, address, bloodgrp, Aadhar_no, gender, corona, email, history, vaccine, phone_no, height, weight) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssisssssiii",$name, $address, $bloodgrp, $Aadhar_no, $gender, $corona, $email, $history, $vaccine, $phone_no, $height, $weight);
                if ($stmt->execute()) {
                    echo "<script> location.href='link.html'; </script>";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>
