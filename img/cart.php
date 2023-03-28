<?php
session_start();
require_once("database.php");
if(!isset($_SESSION['user_login'])){
	echo "กรุณาเข้าสู่ระบบ";
	exit;
}
  $sql = "select * from product where p_id='".@$_GET['id']."' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs, MYSQLI_BOTH);
	@$id = $_GET['id'] ;
	
	if(isset($_GET['id'])) {
		$_SESSION['oid'][$id] = $data['p_id'];
		$_SESSION['oname'][$id] = $data['p_name'];
		$_SESSION['oprice'][$id] = $data['p_price'];
		$_SESSION['odetail'][$id] = $data['p_detail'];
		$_SESSION['opicture'][$id] = $data['p_picture'];
		@$_SESSION['oitem'][$id]++;
	}





  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
   <link href="../p/public/assets/css/theme.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../p/public/assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light  py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="expanded"><a class="navbar-brand d-inline-flex" href="../img/home3.php">
          <img src="../p/public/image/logo.png" alt="logo" width="55" height="40" class="d-inline-block" />
           <span class="text-1000 fs-20 fw-bold ms-2">Figure Combusi</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="../img/home3.php">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="../img/home4.php">Products</a></li>

            </ul>
            
            <form class="d-flex"><a class="text-1000" href="cart.php">
                <svg class="feather feather-shopping-cart me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg></a>
                
                <a class="text-1000" href="login.php">
                <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg></a><a href="cart.php">
                </a>
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

<div class="container " >
<div lass="col-md-6">
<br>


<nav class="navbar navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand">ตะกร้าสินค้า</a>
    <form class="d-flex">
        <a href="home4.php" class="btn btn-dark">กลับหน้าสินค้า</a>
        <a href="clear3.php" class="btn btn-danger">ลบสินค้าทั้งหมด</a>
    </form>
  </div>
</nav>


 <div cla></div>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">รูปสินค้า</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">รายละเอียด</th>
      <th scope="col">ราคา</th>
      <th scope="col">จำนวน</th>
      
      
    </tr>

     </thead>  
  <tbody>
  <?php
  if(!empty($_SESSION['oid'])) {
    foreach($_SESSION['oid'] as $pid) {
      @$i++;
      $sum[$pid] = $_SESSION['oprice'][$pid] * $_SESSION['oitem'][$pid] ;
      @$total += $sum[$pid] ;
?>
    <tr>
      <th scope="row"><?=$i;?></th>
      <td><img src="image/<?=$_SESSION['opicture'][$pid];?>" width="120"></td>
      <td><?=$_SESSION['oname'][$pid];?></td>
      <td><?=$_SESSION['odetail'][$pid];?></td>
      <td><?=number_format($_SESSION['oprice'][$pid],0);?></td>
      <td><?=$_SESSION['oitem'][$pid];?></td>
      <td><a href="clear_basket.php?id=<?=$pid;?>" class="btn btn-outline-danger">ลบ</a></td>
    </tr>
<?php } // end foreach ?>
   <tr>
        <td colspan="3" align="left">ราคารวม</td>
        <td align="right"><?=number_format($total,0);?> บาท </td>
        <td></td>
        
   </tr>
<?php 
} else { ?>
    <tr>
        <td colspan="7" height="50" align="center">เอ๊ะ! ยังไม่มีสินค้า รีบไปช้อปเลย!</td>
    </tr>
<?php } // end if ?>




    </tbody>
</table>
<div class="container-login100-form-btn m-t-32" align="center">
						
            <a class="btn btn-warning"  href="cart2.php?id=<?=$pid;?>">สั่งซื้อสินค้า</a>  
                                      
</div>
</div>
</div>
	





    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>