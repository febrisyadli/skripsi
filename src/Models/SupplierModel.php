<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierModel extends Model
{
  // use SoftDeletes;
  protected $table = 'tb_supplier';
  protected $primaryKey = 'supplier_id';
  protected $fillable = ['nama_supplier','kota_id','alamat','jenis_usaha','telepon'];

  public function kota() {
    return $this->belongsTo('\App\Models\KotaModel','kota_id');
  }
}