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
        <h1><strong>Voir un item </strong></h1>
        <ul>
          <?php
          require 'database.php';

          $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

          $link=stristr($link, "=");

          $link=trim($link, '=');

          $name="";
          $price="";
          $image="";
          $description="";

          $sql = "SELECT * FROM items WHERE id = $link";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

              echo "<li>Nom: ".$row['name']." </li>";
              echo "<li>Description: ".$row['description']." </li>";
              echo "<li>Prix: ".$row['price']." </li>";
              echo "<li>Categorie: ".$row['category']." </li>";
              echo "<li>Image: ".$row['image']." </li>";
              $name=$row['name'];
              $price=$row['price'];
              $image=$row['image'];
              $description=$row['description'];

            }
        }
        else {
          echo "0 results";
        }

        mysqli_close($conn);

        ?>

          <li>
            <a href="../admin/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
          </li>
        </ul>
        </div>
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

    </div>
  </div>

</body>
</html>
