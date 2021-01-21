<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class AdminModel extends Model
{
  // use SoftDeletes;
  protected $table = 'tb_admin';
  protected $fillable = [
    'email','password','nama_lengkap','foto','is_active'
  ];
  // protected $guard = ['remember_token','forgot_otp'];
  // protected $dates = ['deleted_at'];
  
  // public function fakultas() {
  //   return $this->belongsTo('App\Models\FakultasModel');
  // }
  
  // public function jurusan() {
  //   return $this->belongsTo('App\Models\JurusanModel');
  // }
}
