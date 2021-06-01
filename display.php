<html>
<head>
<title>DISPLAY INFO</title>
<link rel="stylesheet" type="text/css" href="internal.css">
</head>
<body>
    <h1>BOOKED SCHEDULES</h1>
    <table border="2">
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>TIME</th>
    <th>HOSPITAL</th>
    <th>DATE CHOSEN</th>
    </tr>

<div class="container">
  <?php

  include("connection.php");
  //error_reporting(0);
  $query = "SELECT * FROM bookschedule";
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data);

  if($total!=0)
  {
  while($result=mysqli_fetch_assoc($data))
  {
    echo "
    <tr>
    <th> ". $result['id']." </th>
    <th> ". $result['name']." </th>
    <th> ". $result['email']." </th>
    <th> ". $result['timing']." </th>
    <th> ". $result['hospital']." </th>
    <th> ". $result['date_chosen']." </th>
    </tr>
    ";

  }
  }

  ?>
</div>
</table>
</body>
</html>
