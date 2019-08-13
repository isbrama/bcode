<?php
  require 'database.php';
  
  $success="";

  $error="";

  if(isset($_POST['submit'])) {

      require 'upload.php';

      $name=$_POST['name'];
      $description=$_POST['description'];
      $price=$_POST['price'];
      $category=$_POST['category'];

      if(empty($name) || empty($description) || empty($price) || empty($imageName)){

          if(empty($name)){

              $error .= "Name is required. <br> ";

          }

          if(empty($description)){

              $error .= "Description is required.  <br>";

          }
          if(empty($price)){

              $error .= "Price is required. <br> ";

          }

          if(empty($imageName)){
              $error .= "Image is required. <br> ";
          }
      }

      else{

          $sql= "INSERT INTO items (name, description, price, category, image) VALUES ('$name', '$description','$price', '$category', '$imageName')";

          if (mysqli_query($conn, $sql)) {

              $success.="New record created successfully. <br>";

              }

          else{
              $error="<div class='alert alert-danger' role='alert'>Error:".$sql."<br>".mysqli_error($conn)."</div>";

              }
            }
        }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Burger Code</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <h1 class="text-logo"> <span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container admin">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="col-sm-12">
          <label for="Name" >Nom:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom:">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <label for="Description" >Description:</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description:">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <label for="Prix" >Prix:</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="prix:">
        </div>
      </div>

      <div class="form-group">
          <div class="col-sm-12">
            <label for="category">Categorie:</label>
            <select class="form-control" id="category" name="category">
              <option value="1">Menus</option>
              <option value="2">Burgers</option>
              <option value="3">Snacks</option>
              <option value="4">Salades</option>
              <option value="5">Boissons</option>
              <option value="6">Desserts</option>
            </select>
          </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
        <label>Selectionner une image:</label>
        <input type="file" name="image">
        </div>
      </div>

       <button type="submit" name="submit" class="btn btn-success"><span class='glyphicon glyphicon-pencil'></span> Ajouter</button>
       <a href="../admin/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

    </form><!--fin form-->

    <div class="container-fluid">
      <?php

          if ($success) {

              echo '<div class="alert alert-success" role="alert">'.$success.'</div>';

          } else if ($error) {

              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    }
    ?>
    </div> <!--fin container1-->


  </div><!--fin container2-->

</body>
</html>
