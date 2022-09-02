<?php
if(isset($_GET['admin']))
{
  session_start();
  $_SESSION['admin'] = $_GET['admin'];
  $admin = $_SESSION['admin'];
}
include "localhost.php";
if(isset($_GET['logout']))
{
  include "localhost.php";
  session_start();
  $ad = $_SESSION['admin'];
  session_unset();
  session_destroy();
  $sql1 = "UPDATE admin SET login_status = '0' WHERE username = '$ad'";
  if(mysqli_query($conn, $sql1))
  {
    header("location: restaurantpart1.php?add=$ad");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panels</title>
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-light bg-black fixed-top">
            <div class="container-fluid p-4">
              <a class="navbar-brand text-white h4" href="#">Admin panels</a>
              <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admin panels</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="restaurantpart1.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="afterlogin admins panel.php?customer=persons_cust">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="afterlogin admins panel.php?stuff=stuff">Stuff</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="afterlogin admins panel.php?food_item=food_item">Pending Food Items</a>
                      </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                      </ul>
                      <li class="nav-item">
                        <a class="d-grid gap-2 btn btn-lg btn-success" href="afterlogin admins panel.php?logout=1">Logout</a>
                      </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <br><br><br><br><br><br>
          <?php
            if(isset($_GET['admin']))
            {
              $admin = $_GET['admin'];
              echo "<div>
              <img src='images/work.jpeg' class='rounded mx-auto d-block' alt=''>
            </div>";
            }
          ?>
    </div>
    <?php
    include "Show_List.php";
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>