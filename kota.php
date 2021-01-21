<?php
require 'admin/config.php';


$stm = $db->prepare("insert into tb_kota(tipe, nama_kota, nama_prov) values(?,?,?)");
for ($i=1;$i<=34; $i++) {
  $data = json_decode(file_get_contents('https://api.rajaongkir.com/starter/city?province='.$i.'&key=59f859d498283c53d9fe76c6fabcc1d8'), false);
  echo sprintf("(%03s) ", $i);
  foreach ($data->rajaongkir->results as $rs) {
    $stm->execute(array($rs->type, $rs->city_name, $rs->province));
    echo ".";
    usleep(rand(3000, 100000));
  }
  echo " " . count($data->rajaongkir->results) . "\n";
}
