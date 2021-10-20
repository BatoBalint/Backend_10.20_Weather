<?php

require_once 'db.php';
require_once 'weather.php';

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
              <input type="date" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Homerseklet</span>
              <input type="number" class="form-control" placeholder="Homerseklet">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-25" id="basic-addon1">Leiras</span>
              <input type="text" class="form-control" placeholder="Leiras (esos, napos, felhos...)">
            </div>
            <input class="btn btn-success" type="submit" value="Hozzaads">
          </form>
        </div>
      </div>
      <div class="row mt-5 py-3">
        <div class="col-md-6 mx-auto">
          <table class="table table-dark table-striped">
            <tr>
              <th>#</th>
              <th>Datum</th>
              <th>Homerseklet</th>
              <th>Leiras</th>
            </tr>
            <?php

            foreach ($weatherRows as $item) {
              echo "<tr>";

              echo "<td>" . $item->getId() ."</td>";
              echo "<td>" . $item->getDatum() . "</td>";
              echo "<td>" . $item->getHomerseklet() . "</td>";
              echo "<td>" . $item->getLeiras() . "</td>";

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
