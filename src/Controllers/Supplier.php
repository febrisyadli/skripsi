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

  public function edit()
  {
    # code...
  }

  public function hapus($id)
  {
    # code...
  }
}