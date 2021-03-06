<?php
namespace App\Controllers;

use App\Models\SupplierModel;
use App\Models\KotaModel;

class Supplier extends BaseController
{

  public function __construct()
  {
    if (!hasLoginAdmin()) { redirect('/admin'); }
  }

  public function index()
  {
    $data['rec'] = SupplierModel::all();
    self::render('admin/supplier/list', $data);
  }

  public function tambah()
  {
    if (getMethod('post')) {
      try {
        $supplier = SupplierModel::create(filter_input_array(INPUT_POST));
        if ($supplier->supplier_id) {
          notif('success', 'Data berhasil ditambahkan');
          redirect('/admin/supplier');
        }
      } catch (\Illuminate\Database\QueryException $e) {
        notif('warning', 'Data sudah ada', 'Duplicate Entry');
        redirect('/admin/supplier/tambah');
      }
    } else {
      $data['kota'] = KotaModel::all();
      self::render('admin/supplier/tambah',$data);
    }
  }

  public function edit($id)
  {
    if (getMethod('post')) {
      $sup = SupplierModel::find($id);
      $sup->nama_supplier = htmlspecialchars($_POST['nama_supplier']);
      $sup->kota_id = htmlspecialchars($_POST['kota_id']);
      $sup->alamat = htmlspecialchars($_POST['alamat']);
      $sup->jenis_usaha = htmlspecialchars($_POST['jenis_usaha']);
      $sup->telepon = htmlspecialchars($_POST['telepon']);
      $sup->save();
      redirect('/admin/supplier');
    } else {
      $data['rs'] = SupplierModel::find($id);
      $data['kota'] = KotaModel::all();
      self::render('admin/supplier/edit',$data);
    }
  }

  public function hapus($id)
  {
    SupplierModel::destroy($id);
    redirect('/admin/supplier');
  }
}