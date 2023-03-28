<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>



    


    <form action="" method="post">
      <?php if(isset($_SESSION['error'])) {?>
      <div class="alert alert-danger" role="alert">
      <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?></div>
        <?php } ?>
        


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-secondary text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

               <div class="mb-3">
        <label  class="form-label">Username</label>
        <input type="text" class="form-control" name="uname" require >
    </div>
    <div class="mb-3">
        <label  class="form-label">Password</label>
        <input type="password" class="form-control"  require name="pass" >
    </div>
    <button type="submit"  name="login" class="btn btn-warning text-white" require>login</button>
    <a href='javascript:window.history.back()' class="btn btn-danger">back</a>
</form>
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="reg.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
<?php
	if(isset($_POST['login'])){
		include_once("database.php");
        $username = $_POST['uname'];
        $pass = $_POST['pass'];

		$sql = "select * from users where username='$username' and pass='".md5($pass)."' ";
        $rs = mysqli_query($conn,$sql);
        $data = mysqli_num_rows($rs);
        if($data = mysqli_fetch_array($rs)){
            if($data['urole'] == 'admin'){
            $_SESSION['admin_login'] = $data['u_id'];
            header("location: CRUD/page_admin.php");
            }else{
            $_SESSION['user_login'] = $data['u_id'];
            header("location: home3.php");
            }
        }else{
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: login.php");
        }

	}
?>	





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

