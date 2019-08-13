<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Burger Code</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container site">
    <h1 class="text-logo"> <span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
    <nav>
      <ul class="nav nav-pills">
        <?php

          require 'admin/database.php';

          $sql = "SELECT id, name FROM categories";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                if ($row['id']===1) {
                  echo "<li class='active' role='presentation'><a href='#".$row['id']."' data-toggle='tab'>".$row['name']."</a></li>";
                }

                else {
                  echo "<li role='presentation'><a href='#".$row['id']."' data-toggle='tab'>".$row['name']."</a></li>";
                }
        } // fin while
      } //fin if
        else {
          echo "<div class='alert alert-danger' role='alert'>
          Error, check your database!
          </div>";
        } //fin else

      echo "</ul>";

      echo "</nav>";

      echo "<div class='tab-content'>";

      $pane="active";

      $sql2 = "SELECT id FROM categories";

      $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {

            for ($i=1; $i <= mysqli_num_rows($result2); $i++) {

              $sql3 = "SELECT * FROM items WHERE category = $i";

              $result3 = mysqli_query($conn, $sql3);

              echo "<div class='tab-pane ".$pane."' id='".$i."'>";
              echo "<div class='row'>";

              if (mysqli_num_rows($result3) > 0) {

                while($row = mysqli_fetch_assoc($result3)) {

                echo "<div class='col-sm-6 col-md-4'>";
                echo "<div class='thumbnail'>";
                echo "<img src='images/".$row['image']."'>";//items image
                echo "<div class='price'>".$row['price']."$</div>";//items price
                echo "<div class='caption'>";
                echo "<h4>".$row['name']."</h4>";  //items name
                echo "<p>".$row['description']."</p>";//items description
                echo "<a class='btn btn-order' role='button' href='#'><span class='glyphicon glyphicon-shopping-cart'></span> Commander</a>";
                echo "</div>";//fin class caption
                echo "</div>"; // fin class thumbnail
                echo "</div>";//fin class col


              }//fin 2while

            }//fin if
            echo "</div>";//fin class row
            echo "</div>";//fin class pane
            $pane="";
        }//for loop
      }

      else {

          echo "<div class='alert alert-danger' role='alert'>
          Error, check your database!
          </div>";

      } // fin else


          mysqli_close($conn);

    ?>
  </div><!--fin tab-content-->

  </div><!--fin container-->


    <a href="admin/index.php" class="btn btn-light btn-admin "><span class="glyphicon glyphicon-tasks"></span> Admin</a></h1>


</body>

</html>
