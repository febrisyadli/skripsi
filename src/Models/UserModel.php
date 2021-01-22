<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
  // use SoftDeletes;
  protected $table = 'tb_user';
  protected $primaryKey = 'user_id';
  protected $fillable = [
    'email','password','nama_lengkap','kota_id','alamat',
    'telepon','group','foto','is_active','is_verif',
    'forgot_token','remember_token','verif_token'
  ];
  public function kota() {
    return $this->belongsTo('\App\Models\KotaModel','kota_id');
  }
}