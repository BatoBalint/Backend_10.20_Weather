<?php

  require_once 'db.php';
  require_once 'weather.php';
  global $db;

  $weatherId = $_GET['id'] ?? null;

  if ($weatherId === null) {
    header('Location: index.php');
  } else {
    $t = $db->query("SELECT * FROM weather WHERE id = $weatherId")->fetchAll();

    $weather;
    foreach ($t as $elem) {
      $weather = new Weather(new DateTime($elem['datum']), $elem['homerseklet'], $elem['leiras']);
      $weather->setId($elem['id']);
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->prepare
  }

 ?><!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6 mx-auto">
          <form class="" method="post">
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Datum</span>
              <input type="date" class="form-control" placeholder="Datum" value="<?php echo $weather->getDatum(); ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Homerseklet</span>
              <input type="number" class="form-control" placeholder="Homerseklet" value="<?php echo $weather->getHomerseklet(); ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Leiras</span>
              <input type="text" class="form-control" placeholder="Leiras (esos, napos, felhos...)" value="<?php echo $weather->getLeiras(); ?>">
            </div>
            <input class="btn btn-success" type="submit" value="Szerkesztes">
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto p-5">
          <table class="table table-secondary">
              <?php
              echo "<tr>";

              echo "<td>" . $weather->getId() ."</td>";
              echo "<td>" . $weather->getDatum() . "</td>";
              echo "<td>" . $weather->getHomerseklet() . "</td>";
              echo "<td>" . $weather->getLeiras() . "</td>";

              echo "</tr>";

               ?>
          </table>
        </div>

      </div>
    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
