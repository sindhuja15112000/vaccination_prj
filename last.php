<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) &&
        isset($_POST['time']) &&
        isset($_POST['email']) &&
        isset($_POST['hospital']) && isset($_POST['date'])) {

        $name = $_POST['name'];
        $timing = $_POST['time'];
        $email = $_POST['email'];
        $hospital = $_POST['hospital'];
        $date_chosen=date('y-m-d', strtotime($_POST['date']));
        $host = "localhost:3325";
        $dbUsername = "root";
        $dbPassword = "sindhuja.k";
        $dbName = "vcare4u";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 2";
            $Insert = "INSERT INTO bookschedule(name, timing, email, hospital, date_chosen) values(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum <= 2) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssss",$name, $timing, $email, $hospital, $date_chosen);
                if ($stmt->execute()) {
                    echo "successfully booked your schedule";
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
