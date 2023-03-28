<?php
session_start();
require_once("../database.php");

if(!isset($_SESSION['admin_login'])){
	echo "กรุณาเข้าสู่ระบบ";
	exit;
}
        $id =$_GET['id'];
        $sql = "SELECT * FROM product where p_id = '$id'";
        $rs = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/p/public/assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="style.css"></head>
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


<!-- nav --> 
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-6 mb-lg-4">
      </ul>
      <span class="navbar-text" >
      <a href="up.php" class="btn btn-primary" style="color:white ;">แก้ไขข้อมูลอีกครั้ง</a>
      <a href="page_admin.php" class="btn btn-primary" style="color:white ;">Go back</a>
      </span>
    </div>
  </div>
</nav>  
<!-- nav -->

<div class="container">

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
    	<label  class="form-label">รหัสสินค้า</label>
        <input class="form-control" type="number" placeholder="รหัสสินค้า" name="p_id" value="<?=$data['p_id']?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">ชื่อสินค้า</label>
        <input class="form-control" type="text" placeholder="ชื่อสินค้า" name="p_name" value="<?=$data['p_name']?>" >
    </div> 
     <div class="mb-3">
        <label  class="form-label">รายละเอียด</label>
        <input class="form-control" type="text" placeholder="รายละเอียดสินค้า" name="p_detail"  value="<?=$data['p_detail']?>"  >
    </div>
    <div class="mb-3">
    <label  class="form-label">ราคา</label>
        <input class="form-control" type="number" placeholder="ราคา" name="p_price" value="<?=$data['p_price']?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">รูปภาพ</label>
        <input class="form-control" type="file" value="" name="uploadfile" value="<?=$data['p_picture']?>">
    </div>
    <div class="mb-3">
    <label  class="form-label">ประเภท</label>
        <input class="form-control" type="number" placeholder="ประเภท" name="p_type" value="<?=$data['p_type']?>">
    </div>

   <button type="submit" name="upload" class="btn btn-warning">แก้ไขข้อมูล</button>
</form>
</div>
<?php 
  if(isset($_POST['upload'])){
    require_once("../database.php");
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_detail = $_POST['p_detail'];
    $p_price = $_POST['p_price'];
    $uploadfile = $_POST['p_picture'];
    $p_type = $_POST['p_type'];


    
    $filename = $_FILES['uploadfile']['name'];
    $tmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = "./img/".$filename;

    $sql = "UPDATE product set
    p_id ='$p_id',
    p_name ='$p_name',
	  p_detail ='$p_detail',
    p_price = '$p_price',
    p_picture= '$filename',
    p_type= '$p_type'
    where  p_id='$p_id'";
    mysqli_query($conn,$sql) ;

    if(move_uploaded_file($tmpname,$folder)){
        echo "<script>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location='page_admin.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('แก้ไขข้อมูลไม่สำเร็จ');";
        echo "</script>";
    }
    @copy($_FILES['img']['tmp_name'], "../img/".$_POST['p_picture'].".jpg");
 }
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>