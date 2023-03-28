<?php
session_start();
require_once("database.php");
if(!isset($_SESSION['user_login'])){
	echo "กรุณาเข้าสู่ระบบ";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>
<body>


    <br>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">user</a>

    <form class="d-flex">
    <a href="CRUD/logout.php" class="btn btn-danger"> logout</a>
    </form>
  </div>
</nav>
<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
    if($_SESSION['user_login']){
        $user_id = $_SESSION['user_login'];
        $sql = "SELECT * FROM users WHERE u_id =$user_id";
        $rs = $conn->query($sql);
        if ($rs->num_rows > 0) {
            // output data of each row
            while($row = $rs->fetch_assoc()) {
                echo "";
                echo  "<th scope='row'>".$row["u_id"]."</th>";
                echo "<td>".$row["first_name"]."</td>";
                echo "<td>".$row["last_name"]."</td>";


            }
          } else {
            echo "0 results";
          }
          $conn->close();
        }
        ?>
  </tr>
  </tbody>
</table>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>