<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cart List</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href = "restaurantpart1.php">Home</a>
    </div>
    </nav>
<?php
include "localhost.php";
if(isset($_GET['message']))
{
  echo "<div class='alert alert-warning' role='alert'>".$_GET['message']."</div>";
}
if(isset($_POST['confirm']))
{
  if(($_POST['city']=='Dhaka' || $_POST['city']=='DHAKA') && isset($_POST['area']) && isset($_POST['zip']) && isset($_POST['payment']))
  {
    $address = "City-".$_POST['city']." Area & House No.".$_POST['area']." Zip Code-".$_POST['zip'];
    $payment = $_POST['payment'];
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result); 
    }
    $user = $row['username'];
    $sql = "INSERT INTO confirm_order (`username`, `food_name`, `quantity`, `price`) SELECT `username`, `food_name`, `quantity`, `price` FROM pending_order WHERE username='$user'";
    if(mysqli_query($conn, $sql))
    {
      $sql = "DELETE FROM `pending_order` WHERE `username`='$user'";
      if(mysqli_query($conn, $sql))
      {
        $sql = "UPDATE `confirm_order` SET `address`='$address', `Payment_option`='$payment' WHERE `username` = '$user' AND `address`='NO' AND `Payment_option`='NONE'";
        if(mysqli_query($conn, $sql))
        {
          $sql = "SELECT * FROM persons_cust WHERE login_status=1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) == 1)
          {
              $row = mysqli_fetch_assoc($result); 
          }
          $user = $row['username'];
          $dis = $row['discount'];
          $can = $row['cancel_charge'];
          $sql = "SELECT SUM(`price`) AS totalprice FROM `confirm_order` WHERE username='$user' AND `Payment_option`='$payment'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $totalprice = $row['totalprice'] - ($row['totalprice']*($dis/100)) + $can;
          if($payment=="PayPal")
          {
            header("location:payment_paypal.php?admin=aongshu@gmail.com&money=$totalprice");
          }
          else if($payment=="bkash")
          {
            echo "No Added Yet";
          }
          else if($payment=="Cash On Delivery")
          {
            header("location:restaurantpart1.php");
          }
        }
      }
    }
  }
  else
  {
    echo "We are not available there";
  }
}
?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result); 
    }
    $user = $row['username'];
    $dis = $row['discount'];
    $can = $row['cancel_charge'];
    $sql = "SELECT * FROM `pending_order` WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result))
  {
    $name = $row['username'];
    $fname = $row['food_name'];
    $qtn = $row['quantity'];
    $price = $row['price'];
    echo "
    <tr>
      <th scope='row'></th>
      <td>$fname</td>
      <td><a class='btn btn-light btn-sm' href = 'Operation_Cart.php?red_qtn=$fname&user=$user'>-</a>  $qtn  <a class='btn btn-light btn-sm' href = 'Operation_Cart.php?add_qtn=$fname&user=$user'>+</a></td>
      <td>$price</td>      
      <td><a class='btn btn-danger' href = 'Operation_Cart.php?rem_qtn=$fname&user=$user'>Remove</a></td>
    </tr>";
  }
$sql = "SELECT SUM(`price`) AS totalprice FROM `pending_order` WHERE username='$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalprice = $row['totalprice'] - ($row['totalprice']*($dis/100)) + $can;
echo "
<tr>
  <th scope='col'>#</th>
  <th scope='col'></th>
  <th scope='col'>Total Price</th>
  <th scope='col'>$totalprice</th>
  <th scope='col'>Disccount-$dis% Cancelation Charge-Tk-$can</th>
</tr>
</thead>
</tbody>";
  ?>
</table>
<form class="container w-auto p-3 row g-3 needs-validation" novalidate actiion = "show_cart.php" method = "post">
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" name = "city" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom03" class="form-label">Area & House No.</label>
    <input type="text" class="form-control" id="validationCustom03" name = "area" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationCustom05" name = "zip" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" name = "payment" required>
      <option selected disabled value="">Choose Payment Method</option>
      <option>Cash On Delivery</option>
      <option>PayPal</option>
      <option>bKash</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name = "confirm">Confirm</button>
  </div>
</form>
<table class="table">
  <h1># Confirm Order List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Order date</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result); 
    }
    $user = $row['username'];
    $sql = "SELECT * FROM `confirm_order` WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $name = $row['username'];
        $fname = $row['food_name'];
        $qtn = $row['quantity'];
        $price = $row['price'];
        $date = $row['order_date'];
        echo "
        <tr>
          <th scope='row'></th>
          <td>$fname</td>
          <td>$qtn</td>
          <td>$price</td> 
          <td>$date<date>     
          <td><a class='btn btn-primary' href = 'Operation_Cart.php?cancel_qtn=$date&user=$user'>Cancel Order</a></td>
        </tr>";
      }
      echo "
      </thead>
      </tbody>";
    }
    else
    {
      echo "<h1>No Order is Confirmed</h1>";
    }
?>
<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Previous Order</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Order date</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result); 
    }
    $user = $row['username'];
    $sql = "SELECT * FROM `re_order` WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result))
  {
    $name = $row['username'];
    $fname = $row['food_name'];
    $qtn = $row['quantity'];
    $price = $row['price'];
    $date = $row['date_done'];
    echo "
    <tr>
      <th scope='row'></th>
      <td>$fname</td>
      <td>$qtn</td>
      <td>$price</td> 
      <td>$date<date>     
      <td><a class='btn btn-primary' href = 'Operation_Cart.php?reload_qtn=$date&user=$user'>Re-Order</a></td>
    </tr>";
  }
echo "
</thead>
</tbody>";
mysqli_close($conn);
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>