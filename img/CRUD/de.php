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
		$sql = "DELETE FROM product where p_id=$did";
		mysqli_query($conn,$sql) or die('ลบข้อมูลไม่ได้');

		unlink("img/".$pic);

        echo "<script>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='page_admin.php'";
        echo "</script>";

	}
?>