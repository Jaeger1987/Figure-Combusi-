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
    <link href="../p/public/assets/css/theme.css" rel="stylesheet" />

</head>
<body>

<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light  py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="expanded"><a class="navbar-brand d-inline-flex" href="../img/home3.php">
          <img src="../p/public/image/logo.png" alt="logo" width="55" height="40" class="d-inline-block" />
           <span class="text-1000 fs-20 fw-bold ms-2">Figure Combusi</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="../img/home3.php">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="../img/home4.php">Products</a></li>

            </ul>
            
            <form class="d-flex"><a class="text-1000" href="cart.php">
                <svg class="feather feather-shopping-cart me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg></a>
                
                <a class="text-1000" href="login.php">
                <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg></a><a href="cart.php">
                </a>
            </form>
          </div>
        </div>
      </nav>

<div class="container">
    <br>
<h1>สมัครสมาชิก</h1>
    <hr>
    <form action="regsuc.php" method="post">
    <div class="mb-3">
    <a href="home3.php" class="btn btn-primary">หน้าหลัก</a>
    <a href="login.php" class="btn btn-success">เข้าสู่หน้า login</a>
    </div>


    <?php if(isset($_SESSION['error'])) {?>
            <div class="alert alert-danger" role="alert">
            <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?></div>
        <?php } ?>


    <div class="mb-3">
        <label  class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email"  aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label  class="form-label">Username</label>
        <input type="text" class="form-control" name="uname" require >
    </div>

    <div class="mb-3">
        <label  class="form-label">Firstname</label>
        <input type="text" class="form-control" name="fname" require >
    </div>
    <div class="mb-3">
        <label  class="form-label">Lastname</label>
        <input type="text" class="form-control" name="lname" require >
    </div>
    <div class="mb-3">
        <label  class="form-label">Password</label>
        <input type="password" class="form-control"  require name="pass1" >
    </div>
    <div class="mb-3">
        <label  class="form-label">con Password</label>
        <input type="password" class="form-control" name="pass2"require>
    </div>
    <div class="mb-3">
        <label  class="form-label">phone</label>
        <input type="number" class="form-control" name="tel" require>
    </div>
    <button type="submit"  name="submit" class="btn btn-success" require>Submit</button>
    </form>


</div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

