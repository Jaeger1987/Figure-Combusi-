<?php
session_start();
require_once("database.php");
if(!isset($_SESSION['user_login'])){
	echo "กรุณาเข้าสู่ระบบ";
	exit;
}
    
?>

<!doctype html>
<html>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
<meta charset="utf-8">
<title>PLACE AN ORDER</title>
</head>

<body>

<?php
	if(isset($_SESSION['user_login']))
		$u_id=$_SESSION['user_login'];
 	 $sql="SELECT * FROM users where u_id = $u_id ";
	 $rs= mysqli_query($conn,$sql);
 
	 while($data = mysqli_fetch_array($rs)){ 
?>

	<form method="post" action="" enctype="multipart/form-data" novalidate>
	<section style="background-color: #FFFFFF;" class="min-vh-100 d-flex justify-content-center align-items-center" >		
	<div style="background-color:#FF9966; width: auto; height: auto; border-radius: 24px; border: 3px solid #A52A2A;  " class="card">
	
  <div class="card-body">
	  <h3 style="color: white; font-size: 30px; margin-bottom: 20px;">PLACE AN ORDER</h3>
<div class="d-flex p-2 bd-highlight">
<div class=" col-md-2 ">
    <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>ID</label>
    <input type="number" Value="<?=$data['u_id'];?>" readonly class="form-control" name="aid" style="border: 2px solid #A52A2A; width: 50px" autofocus required>
  </div>
 <div class=" col-md-6 ">
    <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>NAME</label>
    <input type="text" Value="<?=$data['first_name'];?> <?=$data['last_name'];?> " class="form-control" name="adname" style="border: 2px solid #A52A2A; width: 180px"  required>
  </div>
   <div class="col-mb-3 ">
    <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>Phone</label>
    <input type="text" Value="<?=$data['phone'];?>" class="form-control" name="adEmail" style="border: 2px solid #A52A2A; width: 150px" required>
  </div>
</div>
<div class="d-flex p-2 bd-highlight">
  <div class=" col-md-8">
    <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>Address</label>
    <input type="text" class="form-control" name="adad" style="border: 2px solid #A52A2A;  height: 100px; width: 250px" required>
  </div>
  <div class="col-mb-3">
    <label  class="form-label" style="color: white;  font-size: 17px; margin-bottom: 13px;" required>Postcode</label>
    <input type="text" class="form-control" name="adpd"  style="border: 2px solid #A52A2A; width: 100px" required>
	  </div>
</div>
<div class="d-flex p-2 bd-highlight">
  <div class="col-mb-8">
	<label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px; " required>Courier</label>
    <select class="form-select"   name="adod" required  style="border: 2px solid #A52A2A; width: 250px">
      <option selected disabled value="">เลือก...</option>
      <option>DHL EXPRESS</option>
	  <option>ไปรษณีย์ไทย</option>
	  <option>KERRY EXPRESS</option>
	  <option>BEST EXPRESS</option>
	  <option>FLASH EXPRESS</option>
    </select>
<div class="col-mb-3">
    <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px; " required>Slip</label>
    <input type="file" class="form-control" name="ad_picture" required style="border: 2px solid #D69F00; width: 250px">
    <div class="invalid-feedback" >Example invalid form file feedback</div>
  </div>
	</div>
</div>
</div>
<input type="submit" name="Submit"  value="ORDER" class="btn btn-outline-primary" style="border-radius: 24px;">		
</div>
</form>
<?php   } ?>

<?php
	
	if(isset($_POST['Submit'])){
		include_once("database.php");
	
	$path = $_FILES['ad_picture']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);	
		
	$sql = "INSERT INTO `address` (`ad_id`, `ad_name`, `ad_Email`, `ad_ad`, `ad_pd`, `ad_od` , `ad_ext`, `ad_uid`) 
	VALUES (NULL,  '{$_POST['adname']}', '{$_POST['adEmail']}', '{$_POST['adad']}', '{$_POST['adpd']}', '{$_POST['adod']}', '.{$ext}', '{$_POST['aid']}')";
	

	mysqli_query($conn, $sql) or die ("สั่งซื้อสินค้าไม่สำเร็จ");
	$bid = mysqli_insert_id($conn);
		
	copy($_FILES['ad_picture']['tmp_name'], "slip/".$bid.".".$ext);	

			
	echo "<script>" ;
	echo "alert('สั่งซื้อสินค้าสำเร็จ');" ;
	echo "window.location='home3.php';" ;
	echo "</script>" ;



}	
	
?>
	</section>

</body>
</html>