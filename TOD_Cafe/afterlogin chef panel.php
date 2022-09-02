<?php
if(isset($_GET['chef']))
{
  session_start();
  $_SESSION['chef'] = $_GET['chef'];
  $stuff = $_SESSION['chef'];
}
include "localhost.php";
if(isset($_GET['logout']))
{
  include "localhost.php";
  session_start();
  $st = $_SESSION['chef'];
  session_unset();
  session_destroy();
  $sql1 = "UPDATE persons_stuff SET login_status = '0' WHERE username = '$st' AND position LIKE '%Chef'";
  if(mysqli_query($conn, $sql1))
  {
    header("location: restaurantpart1.php?chef=$st");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef panels</title>
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-light bg-black fixed-top">
            <div class="container-fluid p-4">
              <a class="navbar-brand text-white h4" href="#">Chef panels</a>
              <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Chef panels</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="restaurantpart1.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="afterlogin chef panel.php?food=food_item">Food Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="afterlogin chef panel.php?food=pending_food">Pending Items</a>
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
                        <a class="d-grid gap-2 btn btn-lg btn-success" href="afterlogin chef panel.php?logout=1">Logout</a>
                      </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <br><br><br><br><br><br>
          <?php
            if(isset($_GET['chef']))
            {
              $chef = $_GET['chef'];
              echo "<div>
              <img src='images/stuff.jpg' class='rounded mx-auto d-block' alt=''>
            </div>";
            }
          ?>
    </div>
    <?php
    if(isset($_GET['food']) && $_GET['food'] = 'food_item')
    {
      echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Food Items</h1>";
      echo "
              <div class='d-grid gap-2 d-md-flex justify-content-md-end'><a class = 'btn btn-outline-primary btn-lg' href='Add_food.php'>ADD NEW FOOD ITEM</a></div>";
      echo "
            <table class='table table-dark table-hover'>
                <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>ITEM NAME</th>
                  <th scope='col'>DESCRIPTION</th>
                  <th scope='col'>CATEGORY</th>
                  <th scope='col'>PRICE</th>
                  <th scope='col'>OPERATIONS</th>
                </tr>
              </thead>
              <tbody>";
            include "localhost.php";
            $sql = "SELECT * FROM `food_item` ";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) 
            {
              while($row = mysqli_fetch_assoc($result)) 
              {
                $id = $row['food_id'];
                $name = $row['food_name'];
                $desc = $row['description'];
                $cata = $row['catagory'];
                $price = $row['price']; 
                echo "
                <tr>
                  <th scope='row'>$id</th>
                  <td>$name</td>
                  <td>$desc</td>
                  <td>$cata</td>
                  <td>$price</td>
                  <td><a class='btn btn-danger'>Delete</a><a class='btn btn-primary'>Edit</a></td>
                </tr>";
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