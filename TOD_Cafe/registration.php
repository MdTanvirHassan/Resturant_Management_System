<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <link rel="stylesheet" href="registration.css">
        <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="title">Registration</div>
            <?php include "Backend_Register.php";?>
            <form action="registration.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">FULL NAME:</span>
                        <input type="text" placeholder="Enter Your Full Name:" name = "fname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">User Name:</span>
                        <input type="text" placeholder="Enter Your User Name:" name = "uname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">E-mail:</span>
                        <input type="email" placeholder="Enter Your E-mail:" name = "email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number:</span>
                        <input type="number" placeholder="Enter Your Phone Number:" name = "phone" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password:</span>
                        <input type="password" placeholder="Enter Your Password:" name ="password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password:</span>
                        <input type="password" placeholder="Confirm Your Password:" name ="con_password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender-1" id="dot-1" value="male">
                    <input type="radio" name="gender-2" id="dot-2" value="female">
                    <input type="radio" name="gender-3" id="dot-3" value="Prefer not to say">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot-one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot-two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot-three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit"  value="Register" name="reg_user">
                </div>
            </form>
        </div>
    </body>
</html>