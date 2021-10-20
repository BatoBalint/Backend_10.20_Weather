<?php

class Weather {
  private $id;
  private $datum;
  private $homerseklet;
  private $leiras;

  public function getId() {
    return $this->id;
  }

  public function setId(int $id) {
    $this->id = $id;
  }

  public function getDatum() {
    return $this->datum->format("Y-m-d");
  }

  public function getHomerseklet() {
    return $this->homerseklet;
  }

  public function getLeiras() {
    return $this->leiras;
  }

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

    public function saveRow() {
      global $db;

      $db->prepare('INSERT INTO weather (datum, homerseklet, leiras) VALUES (:datum, :homerseklet, :leiras)')
        ->execute([':datum' => $this->getDatum(), ':homerseklet' => $this->homerseklet, ':leiras' => $this->leiras]);
    }

    public static function delete(int $id) {
      global $db;

      $db->prepare('DELETE FROM weather WHERE id = :id')
      ->execute([':id' => $id]);
    }

    public function __toString() {
      return "datum: " . $this->datum->format("Y-m-d") . " ; homerseklet: $this->homerseklet Celsius; leiras: $this->leiras";
    }
  }



?>
