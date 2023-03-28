<?php session_start() ;
       unset($_SESSION['sid'][$id2]) ;
       unset($_SESSION['sname'][$id2]) ;
       unset($_SESSION['sprice'][$id2]) ;
       unset($_SESSION['sdetail'][$id2]) ;
       unset($_SESSION['spicture'][$id2]) ;
       unset($_SESSION['sitem'][$id2]) ;
       header('location: cart.php');

?>