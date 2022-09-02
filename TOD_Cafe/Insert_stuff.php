<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD A Stuff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="p-3 mb-2 bg-dark text-white">Insert Stuff</div>
    <div class="position-absolute top-50 start-50 translate-middle w-75 p-3">
        <?php include "backend_stuff.php"; ?>
    <form class="row g-3" action = "Insert_stuff.php" method = "POST">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputEmail4" name = "name">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Unsername</label>
            <input type="text" class="form-control" id="inputPassword4" name = "uname">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="Email" name = "email">
        </div>
        <div class="col-12">
            <label for="inputCity" class="form-label">Phonenumber</label>
            <input type="number" class="form-control" id="inputCity" name = "phone">
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Position</label>
            <select id="inputState" class="form-select" name = "Position">
            <option selected disabled>Choose...</option>
            <option value="Manager">Manager</option>
            <option value="Associate Manager">Associate Manager</option>
            <option value="Chief Chef">Chief Chef</option>
            <option value="Senior Chef">Senior Chef</option>
            <option value="Junior Chef">Junior Chef</option>
            <option value="Intern Chef">Intern Chef</option>
            <option value="Delivery Boy">Delivery Boy</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label">Gender</label>
            <label for="inputState" class="form-label">Gender</label>
            <select id="inputState" class="form-select" name = "Gender">
            <option selected disabled>Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
            </select>
        </div>
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name = "add_stuff">ADD Him/Her</button>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>