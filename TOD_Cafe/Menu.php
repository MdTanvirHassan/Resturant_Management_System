<?php
if(isset($_GET['cat']))
{
  $cat = $_GET['cat'];
  include "localhost.php";
  $sql = "SELECT * FROM food_item WHERE catagory='$cat'";
  $result = mysqli_query($conn, $sql);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title><?php echo $cat;?></title>
      <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/res.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black p-4 fixed-top ">
      <div class="container-fluid">
        <div style="display:block; overflow:hidden;">
          <header id="header">
            <div class="logo_left ms-5">
                <h1>T O D</h1>
            </div>
            <div class="logo_left">
                <h2>CAFE</h2>
            </div>
          </header>
        </div>
        <a class="navbar-brand b"  href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <div>
            <div class="d-flex">

              <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item " >
                  <a class="nav-link active  pe-5 b"  aria-current="page" href="restaurantpart1.php">Home</a>
                </li>
                <li class="nav-item " >
                  <a class="nav-link active pe-5 "  aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active pe-5 b" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="Menu.php?cat=Breakfast">Breakfast</a></li>
                    <li><a class="dropdown-item" href="Menu.php?cat=Lunch">Lunch</a></li>
                    <li><a class="dropdown-item" href="Menu.php?cat=Dinner">Dinner</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active pe-5 b" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pannel
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="pannel_check.php?pannel=Admin">Admin panels</a></li>
                    <li><a class="dropdown-item" href="pannel_check.php?pannel=Stuff">Stuff panels</a></li>
                    <li><a class="dropdown-item" href="pannel_check.php?pannel=Chef">Chef panels</a></li>
                  </ul>
                </li>
                <li class="nav-item " >
                  <a class="nav-link active pe-5 "  aria-current="page" href="show_cart.php">Cart</a>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </nav>
     
      <br> <br> <br> <br> <br><br> <br> <br>
      <div style="text-align: center;">
        <h1><?php echo $cat;?>   Menu</h1>
        <?php include "backend_cart.php"; ?>
      </div>
      <?php
      if(isset($_GET['message']) && isset($_GET['cat']))
      {
        $message = $_GET['message'];
        echo "<div class='alert alert-success text-center' role='alert'>
          $message
        </div>";
      }
      ?>
      <div class='row row-cols-1 row-cols-md-3 g-4'>
      <?php
      $item = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)) 
      {
        $i_mage = $row['image_path'];
        $f_name = $row['food_name'];
        $f_decs = $row['description'];
        $f_price = $row['price'];
        echo "<div class='col'>
          <div class='card h-100'>
            <img src='$i_mage' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$f_name</h5>
              <p class='card-text'>$f_decs</p>
            </div>
            <div class='card-footer'>
                <h5 class='card-title d-flex justify-content-end mt-auto p-2'>Tk- $f_price</h5>
                <a href = 'Menu.php?add_cart=$f_name&cat=$cat&price=$f_price' class='btn btn-primary'>Add to Cart</a>
            </div> 
          </div>
        </div>";
      }
      ?>
      </div>
      

   <div class="container3 my-5">
    <footer class="text-white text-center text-lg-start" style="background-color: #080808;">
      <div class="container p-4">
        <div class="row mt-4">
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h6 class="text-uppercase mb-4">About Restaurant</h6>
            <p>
              We provide highly accessible and healthy food. We give the highest priority to the customer. 
            </p>
             <p>The most important thing to us is the customer</p>
            <div class="mt-4">
              <a href=""><img src="images/facebook_icon.png" alt=""></a>
              <a href=""><img src="images/ln.png" alt=""></a>
              <a href=""><img src="images/twitter.png" alt=""></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 ps-4">
            <h6 class="text-uppercase mb-4  pb-1">Search something</h6>
  
            <div class="form-outline form-white mb-4">
              <input type="text" id="formControlLg" class="form-control form-control-lg">
              <label class="form-label" for="formControlLg" style="margin-left: 0px;">Search</label>
            <div class="form-notch"><div class="form-notch-leading" style="width: 4.5px;"></div><div class="form-notch-middle" style="width: 48.8px;"></div><div class="form-notch-trailing"></div></div></div>
  
            <ul class="fa-ul" style="margin-left: 1.65em;">
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Dhaka,DH 10012, BD</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">tod@cafe.com</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+0181****</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">0171****</span>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 ps-4">
            <h6 class="text-uppercase mb-4 ">Opening hours</h6>
            <table class=" text-center text-white">
              <tbody class="font-weight-normal">
                <tr>
                  <td>Mon - Thu:</td>
                  <td>8am - 11pm</td>
                </tr>
                <tr>
                  <td>Fri - Sun:</td>
                  <td>1pm - 10pm</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-white" href="">T O D CAFE.COM</a>
      </div>
    </footer> 
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>