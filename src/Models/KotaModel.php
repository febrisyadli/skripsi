<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KotaModel extends Model
{
  protected $table = 'tb_kota';
  protected $primaryKey = 'kota_id';
  protected $fillable = [
    'tipe','nama_kota','nama_prov'
  ];
}