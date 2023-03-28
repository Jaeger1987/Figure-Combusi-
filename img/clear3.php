<?php
	@session_start();

	unset($_SESSION['oid']);
	unset($_SESSION['oname']);
	unset($_SESSION['oprice']);
	unset($_SESSION['opicture']);
	unset($_SESSION['oname']);
	unset($_SESSION['odetail']);


	echo " กำลังลบสินค้าในตะกร้า ";
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=cart.php\">";
	//header("Location: home3.php");
    
?>
<meta charset="utf-8">