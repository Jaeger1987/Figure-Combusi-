<meta charset="utf-8">
<?php
	@session_start();
	$id2 = $_GET['id'] ;
	unset($_SESSION['oid'][$id2]) ;
	unset($_SESSION['oname'][$id2]) ;
	unset($_SESSION['oprice'][$id2]) ;
	unset($_SESSION['odetail'][$id2]) ;
	unset($_SESSION['opicture'][$id2]) ;
	unset($_SESSION['oitem'][$id2]) ;
	//echo "<meta http-equiv=\"refresh\" content=\"0;URL=cart1.php\">";
	     echo "<script>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='cart.php'";
        echo "</script>";

?>