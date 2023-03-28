<?php
session_start();
require_once("../database.php");
if(!isset($_SESSION['admin_login'])){
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
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/p/public/assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light  py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="expanded"><a class="navbar-brand d-inline-flex" href="/img/home3.php">
          <img src="/p/public/image/logo.png" alt="logo" width="55" height="40" class="d-inline-block" />
           <span class="text-1000 fs-20 fw-bold ms-2">Figure Combusi</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="/img/home3.php">Home</a></li>

            </ul>
            
            <form class="d-flex">
              
                <a class="text-1000" href="logout.php"><i class="fa fa-sign-out" style="font-size:16px"></i>
                
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg></a><a href="logout.php">
              </a>
            </form>
          </div>
        </div>
      </nav>





    <br> 

    <!-- nav --> 
   
<!-- nav -->



<div class="container">
<table class="table">


<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid ">
  <?php 
    if($_SESSION['admin_login']){
        $user_id = $_SESSION['admin_login'];
        $sql = "SELECT * FROM users WHERE u_id =$user_id";
        $rs = $conn->query($sql);
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                echo "<h4>รายการใบสั่งซื้อ</h4>";
                //"<a class='navbar-brand' href='page_admin.php'><span>Admin : <span><span>". $row['first_name']."</span></a>";
            }
          } else {
            echo "0 results";
          }
          //$conn->close();
        }
        ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-6 mb-lg-4">
      </ul>
      <span class="navbar-text" >
      <a href="page_admin.php" class="btn btn-primary" style="color:white;">Home admin</a>
      <a href="order_detail.php" class="btn btn-danger" style="color:white;">Back to Order</a>
      <a href="member_detail.php" class="btn btn-danger" style="color:white;">Member Board</a>
      </span>
    </div>
  </div>
</nav>  




<div cla></div>
 <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">เลขใบสั่งซื้อ</th>
      <th scope="col">วันที่</th>
      <th scope="col">ราคารวม</th>
      <th scope="col">รหัสลูกค้า</th>

    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
                include("../database.php");
                $sql = "select  *  from  `orders`  order by o_id  asc ";
                $rs = mysqli_query($conn, $sql) ;
                while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
              ?>

<tr>
      <th scope="row"></th>
      <td><?=$data['o_id'];?></td>
      <td><?=$data['o_date'];?></td>
      <!--<li><h4><?=$data['oitem'][$pid];?></h4></li>-->
      <td><?=number_format($data['o_total'],0);?></td>
      <td><?=$data['ad_uid'];?></td>

    </tr>

    <?php } // end foreach ?>
  
  </tbody>
</table>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>