<?php

class Weather {
  private $id;
  private $datum;
  private $homerseklet;
  private $leiras;

  public function __construct(DateTime $datum, int $homerseklet, String $leiras) {
    $this->datum = $datum;
    $this->homerseklet = $homerseklet;
    $this->leiras = $leiras;
  }

  public static function getAll() : array {
      global $db;

      $t = $db->query("SELECT * FROM weather ORDER BY datum ASC")->fetchAll();
      $eredmeny = [];

      foreach ($t as $elem){
        $bejegyzes = new Weather(new DateTime($elem['datum']), $elem['homerseklet'], $elem['leiras']);
        $bejegyzes->id = $elem['id'];
        $eredmeny[] = $bejegyzes;
      }
      return $eredmeny;
    }

    public function __toString() {
      return "datum: " . $this->datum->format("Y-m-d") . " ; homerseklet: $this->homerseklet Celsius; leiras: $this->leiras";
    }
  }



?>
