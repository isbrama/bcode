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
        <h1><strong>Liste des items </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Prix</th>
              <th>Categorie</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require 'database.php';
              $sql = "SELECT * FROM items";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row["description"]."</td>";
                    echo "<td>".$row["price"]."</td>";
                    echo "<td>".$row["category"]."</td>";
                    echo "<td width=300>";
                    echo "<a class='btn btn-default' href='view.php?=".$row["id"]."'><span class='glyphicon glyphicon-eye-open'></span> Voir </a>";
                    echo " ";
                    echo "<a class='btn btn-primary' href='update.php?=".$row["id"]."'><span class='glyphicon glyphicon-pencil'></span> Modifier </a>";
                    echo " ";
                    echo "<a class='btn btn-danger'  href='delete.php?=".$row["id"]."'><span class='glyphicon glyphicon-remove'></span> Supprimer </a>";
                    echo "</td>";
                    echo "</tr>";

                  }
                }
                else {
                  echo "0 results";
                }

              mysqli_close($conn);

            ?>
          </tbody>
        </table>
      </div>
  </div>

  <a href="../index.php" class="btn btn-light btn-admin"><span class="glyphicon glyphicon-home"></span> Home</a></h1>

</body>

</html>
