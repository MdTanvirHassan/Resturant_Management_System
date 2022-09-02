<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign Up PayPal</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-xl navbar-light bg-light mw-100 p-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand me-md-2" href="#">PayPal</a>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end" id="navbarTogglerDemo03">
        <div class="d-flex">
            <a href = "Login_PayPal.php" class="btn rounded-pill btn-outline-primary btn-lg me-md-5">Log In</a>
        </div>
        </div>
    </div>    
    </nav>
    <div class = "w-50 p-5 align-self-center container">
    <h1 class = "text-center">Sign Up <span class="badge bg-primary">PayPal</span></h1>
    <form action="" method="post" class = "row g-3">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value = "Personal Account">
        <label class="form-check-label" for="flexRadioDefault1">
            Personal Account
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input text-lg-start" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value = "Business Account">
        <label class="form-check-label text-lg-start" for="flexRadioDefault2">
            Business Account
        </label>
    </div>
    <div class="col-md-4">
        <label for="validationDefault01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationDefault01" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationDefault02" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Username</label>
        <div class="input-group">
        <span class="input-group-text" id="inputGroupPrepend2">@</span>
        <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="+880-1xxxxxxxxxx">
    </div>
    <div class="col-md-6">
        <label for="validationDefault03" class="form-label">City</label>
        <input type="text" class="form-control" id="validationDefault03" required>
    </div>
    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">State</label>
        <select class="form-select" id="validationDefault04" required>
        <option selected disabled value="">Choose...</option>
        <option>...</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Zip</label>
        <input type="text" class="form-control" id="validationDefault05" required>
    </div>
    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
        <label class="form-check-label" for="invalidCheck2">
            Agree to terms and conditions
        </label>
        </div>
    </div>
    <div class="col-12">
        <input class="btn btn-primary" type="submit" value = "Sign Up">
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
