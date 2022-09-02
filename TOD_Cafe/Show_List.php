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
              <td><a href='reason.php?user_Delete=$uname&email=$email' class='btn btn-danger'>Delete</a><a href='edit_customer.php?user=$uname&email=$email' class='btn btn-primary'>Edit</a><a href='discount.php?user=$uname&email=$email' class='btn btn-warning'>Voucher</a></td>
            </tr>";
            $i++;
          }
        }
        mysqli_close($conn);
    echo "</tbody>
  </table>";
  }        
        if(isset($_GET['stuff']))
        {
          echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Staffs</h1>";
          echo "
          <div class='d-grid gap-2 d-md-flex justify-content-md-end'><a class = 'btn btn-outline-danger btn-lg' href='Insert_stuff.php'>Add A New Stuff</a></div>";
          echo "
                <table class='table table-dark table-hover'>
                    <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>FULL NAME</th>
                      <th scope='col'>USER NAME</th>
                      <th scope='col'>E-MAIL</th>
                      <th scope='col'>PHONE</th>
                      <th scope='col'>POSITION</th>
                      <th scope='col'>SALARY</th>
                      <th scope='col'>INCREMENT</th>
                      <th scope='col'>GENDER</th>
                      <th scope='col'>Registration Date</th>
                      <th scope='col'>Operations</th>
                    </tr>
                  </thead>
                  <tbody>";
                include "localhost.php";
                $sql = "SELECT * FROM `persons_stuff` NATURAL JOIN position";
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
                    $pos = $row['position'];
                    $gender = $row['gender'];
                    $sala = $row['salary'];
                    $inc = $row['increment']/5;
                    $reg = $row['reg_date']; 
                    echo "
                    <tr>
                      <th scope='row'>$i</th>
                      <td>$fname</td>
                      <td>$uname</td>
                      <td>$email</td>
                      <td>$phone</td>
                      <td>$pos</td>
                      <td>Tk.$sala</td>
                      <td>$inc%</td>
                      <td>$gender</td>
                      <td>$reg</td>
                      <td><a href = 'Terminate_stuff.php?stuff_Delete=$uname&email=$email' class='btn btn-danger'>Terminate</a><a href='edit_stuff.php?stuff=$uname&email=$email' class='btn btn-primary'>Promote/Update</a><a class='btn btn-warning'>Salary Pay</a></td>
                    </tr>";
                    $i++;
                  }
                }
                else 
                {
                  echo "0 results";
                }
                
                mysqli_close($conn);
            echo "</tbody>
          </table>";
        }

        if(isset($_GET['request']))
        {
          echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Request Of Customer</h1>";
          echo "
                <table class='table table-dark table-hover'>
                    <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Request No</th>
                      <th scope='col'>USER NAME</th>
                      <th scope='col'>Message</th>
                      <th scope='col'>Message Date & Time</th>
                      <th scope='col'>Operations</th>
                    </tr>
                  </thead>
                  <tbody>";
                include "localhost.php";
                $sql = "SELECT * FROM `request_customer`";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) 
                {
                  $i = 1;
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $id = $row['req_id'];
                    $uname = $row['username'];
                    $body = $row['message'];
                    $time = $row['date_time']; 
                    echo "
                    <tr>
                      <th scope='row'>$i</th>
                      <td>$id</td>
                      <td>$uname</td>
                      <td>$body</td>
                      <td>$time</td>
                      <td><a class='btn btn-danger'>Delete</a><a class='btn btn-primary'>Approved</a><a class='btn btn-warning'>Reply</a></td>
                    </tr>";
                    $i++;
                  }
                }
                mysqli_close($conn);
            echo "</tbody>
          </table>";
          }
          if(isset($_GET['food_item']))
          {
            echo "<h1 class = 'p-3 mb-2 bg-primary bg-gradient'>List Of Pending Food Item</h1>";
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
                  $sql = "SELECT * FROM `pending_food_item` ";
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
                  <td><a class='btn btn-danger'>Delete</a><a href='approve_food.php?id=$id' class='btn btn-primary'>Approve</a></td>
                </tr>";
              }
            }
            mysqli_close($conn);
        echo "</tbody>
      </table>";
          }
?>