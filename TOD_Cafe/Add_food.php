<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food Insertion Page</title>
        <link rel="stylesheet" href="Add_food.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,700&family=Poppins:wght@500&family=Roboto+Slab:wght@500&display=swap');
            body{
                margin: 0;
                padding: 0;
                font-family: Montserrat;
                height: 100vh;
                overflow: hidden;
                background: linear-gradient(135deg, yellow, lightgreen);
            }

            .container{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 1000px;
                height: 700px;
                background: white;
                border-radius: 10px;
            }
            .buttons{
                position: relative;
                transform: translateY(100%);
            }
        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <div class="container">
            <h1>Enter New Food Item <span class="badge bg-secondary">NEW</span></h1>
            <?php include "backend_add_food.php" ?>
            <form action="Add_food.php" method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name = "food_name" placeholder="Item Name" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name = "food_Price" placeholder="Price" required>
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label" >Upload Image</label>
                    <input class="form-control" type="file" id="formFile" name="food_image" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Description"></textarea>
                  </div>
                  <select class="form-select" aria-label="Disabled select example" name="Category" required>
                    <option selected disabled>Category</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                  </select>
                  <div class="buttons">
                    <div class="d-grid gap-2">
                        <input class="btn btn-primary" type="submit" value="Submit" name= "insert_food">
                        <input class="btn btn-danger" type="submit" value="Cencel">
                    </div>
                  </div>
            </form>
        </div>
    </body>
</html>