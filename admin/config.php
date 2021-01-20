<?php
session_name('FEBRI_SESS');
session_start();

class Db
{
  private $conn = null;

  public function connect()
  {
    if ($this->conn == null) {
      try {
        $pdo = new \PDO("mysql:host=localhost;port=3306;dbname=febri_db", "root", "root");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
      } catch(\PDOException $e) {
        die('Koneksi gagal: ' . $e->getMessage());
      }
      $this->conn = $pdo;
      return $this->conn;
    }
    return $this->conn;
  }
}

class Rajaongkir
{
  private $url = "https://api.rajaongkir.com/starter";
  private $apikey = "59f859d498283c53d9fe76c6fabcc1d8";

  public function get_kota($kota_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->url . "/city?id=" . $kota_id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array("key: " . $this->apikey)
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
}

$db = (new Db)->connect();