<?php

require_once 'db.php';
require_once 'weather.php';



if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $deleteId = $_POST['deleteId'] ?? '';

  if ($deleteId !== '') {
    Weather::delete($deleteId);
  }

  $datum = $_POST['datum'] ?? "error";
  $homerseklet = $_POST['homerseklet'] ?? "error";
  $leiras = $_POST['leiras'] ?? "error";

  if ($datum !== "error" && $homerseklet !== "error" && $leiras !== "error") {
    $saveWeather = new Weather(new DateTime($datum), $homerseklet, $leiras);
    $saveWeather->saveRow();
  }
}

$weatherRows = Weather::getAll();

 ?><!DOCTYPE html>
<html lang="hu" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Idojaras</title>
  </head>
  <body class="bg-dark text-light">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6 mx-auto">
          <form class="" method="post">
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Datum</span>
              <input name="datum" type="date" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Homerseklet</span>
              <input name="homerseklet" type="number" class="form-control" placeholder="Homerseklet">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Leiras</span>
              <input name="leiras" type="text" class="form-control" placeholder="Leiras (esos, napos, felhos...)">
            </div>
            <input class="btn btn-success" type="submit" value="Hozzaadas">
          </form>
        </div>
      </div>
      <div class="row mt-5 py-3">
        <div class="col-md-8 bg-secondary rounded p-3 pb-0 mx-auto">
          <table class="table table-dark table-striped">
            <tr>
              <th>#</th>
              <th>Datum</th>
              <th>Homerseklet</th>
              <th>Leiras</th>
              <th colspan="2">Modositas</th>
            </tr>
            <?php

            foreach ($weatherRows as $item) {
              echo "<tr>";

              echo "<td>" . $item->getId() ."</td>";
              echo "<td>" . $item->getDatum() . "</td>";
              echo "<td>" . $item->getHomerseklet() . "</td>";
              echo "<td>" . $item->getLeiras() . "</td>";
              echo "<form method='post'><input name='deleteId' type='hidden' value=" . $item->getId() . ">";
              echo "<td><a href='edit.php?id=" . $item->getId() . "'>Szerkesztes</a></td>";
              echo "<td><input type='submit' class='btn btn-danger' value='Torles'></form></td>";

              echo "</tr>";
            }

             ?>
          </table>
        </div>
      </div>
    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
