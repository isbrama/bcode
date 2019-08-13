<?php
require 'database.php';

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$link=stristr($link, "=");

$link=trim($link, '=');

// sql to delete a record
$sql = "DELETE FROM items WHERE id=$link";

if(isset($_POST['submit'])) {
  if (mysqli_query($conn, $sql)) {
      echo '<div class="alert alert-success" role="alert">Record deleted successfully!
      </div>
      <a href="../admin/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
      ';
  } else {
      echo '<div class="alert alert-danger" role="alert">'.mysqli_error($conn).'</div>';
  }
}
  mysqli_close($conn);
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
        <div class="viewItem">
        <h1><strong>Supprimer un item </strong></h1>
        <div class="alert alert-success" role="alert">
          Etes vous sur de vouloir supprimer?
        </div>
          <form class="form-horizontal"  method="post">
            <button type="submit" name="submit"  class="btn btn-oui">Oui</button>
            <a href="../admin/index.php" class="btn btn-default">Non</a>
          </form>
    </div>
  </div>
</body>
</html>
