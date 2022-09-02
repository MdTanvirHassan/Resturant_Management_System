<?php
include "localhost.php";
if(isset($_GET['user']))
{
    $user = $_GET['user'];
    $sql = "UPDATE persons_cust SET login_status= FALSE WHERE username = '$user'";
    mysqli_query($conn, $sql); 
}
$sql = "SELECT * FROM persons_cust WHERE login_status=1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  while($row = mysqli_fetch_assoc($result)) 
  {
    $login = $row['login_status'];
    $user_name = $row['username'];
  }
}
else
{
  $login = 0;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>TOD CAFE</title>
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
                  <a class="nav-link active  pe-5 b"  aria-current="page" href="<?php if($login==1){ echo 'restaurantpart1.php?user='.$user_name; } else{ echo 'login.php'; } ?>"><?php if($login==1){ echo 'Logout';} else{ echo "Login"; } ?></a>
                </li>
                <?php
                if($login==1)
                {
                  echo "
                  <li class='nav-item' >
                    <a class='nav-link active  pe-5 b'  aria-current='page' href='Profile.php?user= $user_name'>Profile</a>
                  </li>";
                }
               ?>
              </ul>
          </div>
        </div>
      </div>
    </nav>

  
  <div class="container2">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-interval="">
              <img src="images/3.jpg" class="d-block w-100 h-75" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/5.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
  </div>
  <div class="container">
          <div class="row">

              <div class="col-6">
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
                <p>One of our basic needs is food.  No one can live long without food. And if the food is nutritious and attractive to look at, then it is normal for anyone to get water on their tongue.  Our TOD CAFE basically helps people to meet their food needs.  Anyone can come to our TOD CAFE and order using our software and eat at home. Even if you order using our TOD CAFE software at home, you will get food at home very quickly</p>
                <p>The chef we have at TOD CAFE is a very good chef because it ensures exactly how healthy the food is.  His main job is to keep the quality of food intact.  So our chef not only makes the food delicious, but also keeps the quality of the food intact.  We never compromise on food quality and we never will.</p>
                <p>We have a TOD CAFE policy.  We don't waste food and we don't even allow it.  We collect all the food in a polythene plate and distribute it among the poor.  And if the rest of our food survives, we collect it and distribute it among the poor and needy.  So we work to ensure that food is not wasted.  There are some very poor people in our society whose financial condition is very insignificant.  They are unable to buy food with money that is why we basically work with this policy.</p>
              </div>
              <div class="col-6 mt-5">
                <div >
                  <img class="img-fluid w-85" src="images/cheff.jpg"  alt="">
                </div>
              </div>
          </div>
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