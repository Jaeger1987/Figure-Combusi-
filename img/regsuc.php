<?php 
    session_start();
    
?>
<?php 
require_once ("database.php");
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $urole = "user";
        $tel = $_POST['tel'];
        

        if(empty($fname)){
            $_SESSION['error'] =  'กรุณากรอกชื่อ';
            header("location: reg.php");
        }elseif(empty($lname)){
            $_SESSION['error'] =  'กรุณากรอกนามสกุล';
            header("location: reg.php");
        }elseif(empty($email)){
            $_SESSION['error'] =  'กรุณากรอกอีเมล';
            header("location: reg.php");
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] =  'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: reg.php");
        }elseif(empty($tel)){
            $_SESSION['error'] =  'กรุณากรอกเบอร์โทร';
            header("location: reg.php");
        }elseif(empty($pass1)){
            $_SESSION['error'] =  'กรุณากรอกรหัสผ่าน';
            header("location: reg.php");
        }elseif($pass1 != $pass2){
            $_SESSION['error'] =  'กรุณากรอกรหัสผ่านให้ตรงกัน';
            header("location: reg.php");
        }else{
            $sql ="INSERT INTO users (username,First_name,last_name,email,pass,phone,urole) 
        VALUES ('$uname','$fname','$lname','$email',md5('$pass1'),'$tel','$urole')";
            mysqli_query($conn,$sql) or die('ไม่สามารถเพิ่มข้อมูลได้') ;
			    echo "<script>";
                echo "alert('สมัครสำเร็จ')";
                echo "</script>";
                echo "<script>";
                echo "window.location='reg.php';";
                echo "</script>";
            
            
        }

    }
?>