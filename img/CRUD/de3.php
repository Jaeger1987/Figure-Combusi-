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
		$sql = "DELETE FROM orders where ad_uid=$did";
		mysqli_query($conn,$sql) or die('ลบข้อมูลไม่ได้');

        echo "<script>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='order_detail2.php'";
        echo "</script>";

	}
?>