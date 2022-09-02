<?php
include "localhost.php";
if(isset($_GET['user']))
{
    $user = $_GET['user'];
    $sql = "SELECT * FROM persons_cust WHERE login_status=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result); 
        $fname = $row['fullname'];
        $uname = $row['username'];
        $email = $row['email'];
        $phone = $row['phonenumber'];
        $gender = $row['gender'];
        $reg = $row['reg_date'];
        $log = $row['login_status'];         
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
        <div class="my-4">

            <form>
                <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <div class="avatar avatar-xl">
                            <img src="images/profile.png" alt="..." class="" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h4 class="mb-1"><?php echo $fname; ?></h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">Fullname</label>
                        <input type="text" id="firstname" class="form-control" value="<?php echo $fname; ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Username</label>
                        <input type="text" id="lastname" class="form-control" value="<?php echo $uname; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-control">Email</label>
                    <input type="text" class="form-control" id="form-control" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Phone Number</label>
                    <input type="text" class="form-control" id="inputEmail4" value="<?php echo $phone; ?>" />
                </div>
                <div class="form-group">
                    <label for="inputAddress5">Registration Time & Date</label>
                    <input type="text" class="form-control" id="inputAddress5" value="<?php echo $reg; ?>" />
                </div>
                <div class="form-group">
                    <label for="form-group">Gender</label>
                    <input type="text" class="form-control" id="inputAddress5" value="<?php echo $gender; ?>" />
                </div>
                <hr class="my-4" />
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword4">Old Password</label>
                            <input type="password" class="form-control" id="inputPassword5" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword5">New Password</label>
                            <input type="password" class="form-control" id="inputPassword5" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword6" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimum 8 character</li>
                            <li>At least one special character</li>
                            <li>At least one number</li>
                            <li>Can’t be the same as a previous password</li>
                        </ul>
                    </div>
                </div>
                <button onclick="location.href='Edit.php?user=<?php echo $uname ?>'" type="button" class="btn btn-primary">Edit</button>
                <button onclick="location.href='Delete.php?user=<?php echo $uname ?>'" type="button" class="btn btn-danger">Delete</button>
                <button onclick="location.href='Request.php?user=<?php echo $uname ?>&email=<?php echo $email ?>'" type="button" class="btn btn-info">Request</button>
            </form>
        </div>
    </div>
</div>

</div>

<style type="text/css">
body{
    color: #8e9194;
    background-color: #f4f6f9;
}
.avatar-xl img {
    width: 110px;
}
.rounded-circle {
    border-radius: 50% !important;
}
img {
    vertical-align: middle;
    border-style: none;
}
.text-muted {
    color: #aeb0b4 !important;
}
.text-muted {
    font-weight: 300;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4d5154;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #eef0f3;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>