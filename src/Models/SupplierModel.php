<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierModel extends Model
{
  // use SoftDeletes;
  protected $table = 'tb_supplier';
  protected $fillable = [
    'nama_supplier','kota_id','alamat','jenis_usaha',
    'telepon','is_active'
  ];
  // protected $dates = ['deleted_at'];

  public function fakultas() {
    return $this->belongsTo('App\Models\FakultasModel');
  }
}