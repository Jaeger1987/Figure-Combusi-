<?php
session_start();
require_once("../database.php");
if(!isset($_SESSION['admin_login'])){
	echo "กรุณาเข้าสู่ระบบ";
	exit;
}
?>

    <meta charset="UTF-8">
<?php 

	if (isset($_GET['id'])) {
		$did = $_GET['id'];
		$pic = $_GET['ext'];
		$sql = "DELETE FROM address where ad_id=$did";
		mysqli_query($conn,$sql) or die('ลบข้อมูลไม่ได้');

		unlink("../images2/".$pic);

        echo "<script>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='order_detail.php'";
        echo "</script>";

	}
?>