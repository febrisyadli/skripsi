<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KotaModel;

class Distributor extends BaseController
{

  public function __construct()
  {
    if (!hasLoginAdmin()) { redirect('/admin'); }
  }

  public function index()
  {
    $data['rec'] = UserModel::all();
    self::render('admin/distributor/list', $data);
  }

  public function tambah()
  {
    if (getMethod('post')) {
      try {
        $distributor = UserModel::create(filter_input_array(INPUT_POST));
        if ($distributor->distributor_id) {
          notif('success', 'Data berhasil ditambahkan');
          redirect('/admin/distributor');
        }
      } catch (\Illuminate\Database\QueryException $e) {
        notif('warning', 'Data sudah ada', 'Duplicate Entry');
        redirect('/admin/distributor/tambah');
      }
    } else {
      $data['kota'] = KotaModel::all();
      self::render('admin/distributor/tambah',$data);
    }
  }

  public function edit($id)
  {
    if (getMethod('post')) {
      $sup = UserModel::find($id);
      $sup->nama_distributor = htmlspecialchars($_POST['nama_distributor']);
      $sup->kota_id = htmlspecialchars($_POST['kota_id']);
      $sup->alamat = htmlspecialchars($_POST['alamat']);
      $sup->jenis_usaha = htmlspecialchars($_POST['jenis_usaha']);
      $sup->telepon = htmlspecialchars($_POST['telepon']);
      $sup->save();
      redirect('/admin/distributor');
    } else {
      $data['rs'] = UserModel::find($id);
      $data['kota'] = KotaModel::all();
      self::render('admin/distributor/edit',$data);
    }
  }

  public function hapus($id)
  {
    UserModel::destroy($id);
    redirect('/admin/distributor');
  }
}