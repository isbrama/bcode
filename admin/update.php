<?php
require 'database.php';

$success="";

$error="";

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$link=stristr($link, "=");

$link=trim($link, '=');

$sql = "SELECT * FROM items WHERE id = $link";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $name=$row['name'];
    $price=$row['price'];
    $image=$row['image'];
    $description=$row['description'];
    $category=$row['category'];
  }
}
else {
echo "0 results";
}

//UPDATE RECORD
if(isset($_POST['submit'])) {

    require 'upload.php';

    $name=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $image=$imageName;

    if(empty($name) || empty($description) || empty($price)){

        if(empty($name)){

            $error .= "Name is required. <br> ";

        }

        if(empty($description)){

            $error .= "Description is required.  <br>";

        }
        if(empty($price)){

            $error .= "Price is required. <br> ";

        }

    }

    else{
        if (empty($imageName)) {
            $image=$_POST['imageName'];
        }
        $query = "UPDATE items
                SET
        name='$name',
        description='$description',
        price='$price',
        category='$category',
        image='$image'
        WHERE id='$link'";

          if (mysqli_query($conn, $query)) {

              $success.= "Record updated successfully <br>";
                }
                else {

                    $error.= "Error updating record: " . mysqli_error($conn);

                    } //fin update record
          }
          mysqli_close($conn); //Close database connection
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

    <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="viewItem">
      <h1><strong>Modifier un item </strong></h1>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-12">
            <label for="Name" >Nom:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label for="Description" >Description:</label>
            <input type="text" class="form-control" id="description" name="description"  value="<?php echo $description;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <label for="Prix" >Prix:</label>
            <input type="text" class="form-control" id="price" name="price"  value="<?php echo $price;?>">
          </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
              <label for="category">Categorie:</label>
              <select class="form-control" id="category" name="category">
                <option <?php if ($category == 1 ) echo 'selected' ; ?> value="1">Menus</option>
                <option <?php if ($category == 2 ) echo 'selected' ; ?> value="2">Burgers</option>
                <option <?php if ($category == 3 ) echo 'selected' ; ?> value="3">Snacks</option>
                <option <?php if ($category == 4 ) echo 'selected' ; ?> value="4">Salades</option>
                <option <?php if ($category == 5 ) echo 'selected' ; ?> value="5">Boissons</option>
                <option <?php if ($category == 6 ) echo 'selected' ; ?> value="6">Desserts</option>
              </select>
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <label for="image" >Image:</label>
            <input type="text" class="form-control" id="imageName" name="imageName"  value="<?php echo $image;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
          <label>Selectionner une nouvelle image:</label>
          <input type="file" name="image">
          </div>
        </div>

         <button type="submit" name="submit" class="btn btn-success"><span class='glyphicon glyphicon-pencil'></span> Modifier</button>
         <a href="../admin/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

      </form><!--fin form-->
    </div><!--calss viewItem-->
    </div>

    <div class="col-sm-6 col-md-6 site">
      <div class="thumbnail">
      <?php echo '<img src="../images/'.$image.'">';?>
        <div class="price"><?php echo $price; ?>$</div>
          <div class="caption">
            <h4><?php echo $name; ?></h4>
            <p><?php echo $description; ?></p>
            <a class="btn btn-order" role="button" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
          </div>
        </div>
    </div>

  </div> <!--fin row -->

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
