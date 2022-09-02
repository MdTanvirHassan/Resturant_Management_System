<?php
if(isset($_GET['stuff']))
{
  session_start();
  $_SESSION['stuff'] = $_GET['stuff'];
  $stuff = $_SESSION['stuff'];
}
include "localhost.php";
if(isset($_GET['logout']))
{
  include "localhost.php";
  session_start();
  $st = $_SESSION['stuff'];
  session_unset();
  session_destroy();
  $sql1 = "UPDATE persons_stuff SET login_status = '0' WHERE username = '$st' AND position NOT LIKE '%Chef'";
  if(mysqli_query($conn, $sql1))
  {
    header("location: restaurantpart1.php?stuff=$st");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuff panels</title>
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-light bg-black fixed-top">
            <div class="container-fluid p-4">
              <a class="navbar-brand text-white h4" href="#">Stuff panels</a>
              <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Stuff panels</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="restaurantpart1.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="afterlogin stuff panel.php?customer=persons_cust">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="afterlogin stuff panel.php?Order=<?php echo $stuff; ?>">Orders</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Link</a>
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
                        <a class="d-grid gap-2 btn btn-lg btn-success" href="afterlogin stuff panel.php?logout=1">Logout</a>
                      </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <br><br><br><br><br><br>
          <?php
            if(isset($_GET['stuff']))
            {
              $stuff = $_GET['stuff'];
              echo "<div>
              <img src='images/stuff.jpg' class='rounded mx-auto d-block' alt=''>
            </div>";
            }
          ?>
    </div>
    <?php
    if(isset($_GET['customer']))
    {
      echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Customer</h1>";
      echo "
              <div class='d-grid gap-2 d-md-flex justify-content-md-end'><a class = 'btn btn-outline-success btn-lg' href='afterlogin admins panel.php?request=request_cust'>Requests</a><a class = 'btn btn-outline-primary btn-lg' href='Insert_Customer.php'>Create A Customer Account</a></div>";
      echo "
            <table class='table table-dark table-hover'>
                <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>FULL NAME</th>
                  <th scope='col'>USER NAME</th>
                  <th scope='col'>E-MAIL</th>
                  <th scope='col'>PHONE</th>
                  <th scope='col'>GENDER</th>
                  <th scope='col'>Registration Date</th>
                  <th scope='col'>Operations</th>
                </tr>
              </thead>
              <tbody>";
            include "localhost.php";
            $sql = "SELECT * FROM persons_cust";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) 
            {
              $i = 1;
              while($row = mysqli_fetch_assoc($result)) 
              {
                $fname = $row['fullname'];
                $uname = $row['username'];
                $email = $row['email'];
                $phone = $row['phonenumber'];
                $gender = $row['gender'];
                $reg = $row['reg_date'];
                $log = $row['login_status']; 
                echo "
                <tr>
                  <th scope='row'>$i</th>
                  <td>$fname</td>
                  <td>$uname</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$gender</td>
                  <td>$reg</td>
                  <td><a href='reason.php?user_Delete=$uname&email=$email' class='btn btn-danger'>Delete</a><a href='edit_customer.php?user=$uname&email=$email' class='btn btn-primary'>Edit</a><a class='btn btn-warning'>Voucher</a></td>
                </tr>";
                $i++;
              }
            }
            mysqli_close($conn);
        echo "</tbody>
      </table>";
          }
          if(isset($_GET['Order']))
          {
            $stuff = $_GET['Order'];
            echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Order</h1>";
      echo "
            <table class='table table-dark table-hover'>
                <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>USER NAME</th>
                  <th scope='col'>Item Name</th>
                  <th scope='col'>Quantity</th>
                  <th scope='col'>Price</th>
                  <th scope='col'>Order Date</th>
                  <th scope='col'>Address</th>
                  <th scope='col'>Payment</th>
                  <th scope='col'>Payment Option</th>
                  <th scope='col'>Operations</th>
                </tr>
              </thead>
              <tbody>";
            include "localhost.php";
            $sql = "SELECT * FROM `confirm_order`";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) 
            {
              $i = 1;
              while($row = mysqli_fetch_assoc($result)) 
              {
                $fname = $row['food_name'];
                $uname = $row['username'];
                $qtn = $row['quantity'];
                $price = $row['price'];
                $od = $row['order_date'];
                $address = $row['address'];
                $pay = $row['Payment'];
                $pay_op = $row['Payment_option']; 
                echo "
                <tr>
                  <th scope='row'>$i</th>
                  <td>$uname</td>
                  <td>$fname</td>
                  <td>$qtn</td>
                  <td>$price</>
                  <td>$od</td>
                  <td>$address</td>
                  <td>$pay</td>
                  <td>$pay_op</td>
                  <td><a href='Operation_order_delivery.php?user_app=$uname&date=$od&stuff=$stuff' class='btn btn-success'>Approved</a> <a href='Operation_order_delivery.php?user_done=$uname&date=$od&stuff=$stuff' class='btn btn-primary'>Delivered</a> <a href='Operation_order_delivery.php?user_done_pay=$uname&date=$od&stuff=$stuff' class='btn btn-success'>Payment Done</a></td>
                </tr>";
                $i++;
              }
            }
            mysqli_close($conn);
        echo "</tbody>
      </table>";
          }
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>