<meta charset="utf-8">
<?php
	@session_start();
	include("database.php");

	
	
		foreach($_SESSION['oid'] as $pid) {
			$sum[$pid] = $_SESSION['oprice'][$pid] * $_SESSION['oitem'][$pid] ;
			@$total += $sum[$pid] ;
		}

	$sql = "INSERT INTO `orders` (`o_id`, `o_total`, `o_date`, `ad_uid`) VALUES ('', '$total', CURRENT_TIMESTAMP, '".$_SESSION['ses_id']."');" ;
	
	mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
	$id = mysqli_insert_id($conn);
	
	foreach($_SESSION['o_id'] as $pid) {
		
		$sql2 = "INSERT INTO `order_detail` (`od_id`, `o_id`, `pid`, `item`) VALUES ('NULL', '$id', '".$_SESSION['oid'][$pid]."', '".$_SESSION['oitem'][$pid]."');" ;
		mysqli_query($conn, $sql2)or die(mysqli_error($conn)) ;
	}

	
	
echo "<meta http-equiv=\"refresh\" content=\"0;URL=order.php\">";
?>


