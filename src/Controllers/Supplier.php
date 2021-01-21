<?php
namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
  public function index()
  {
    $data['rec'] = SupplierModel::all();
    self::render('admin/supplier/list', $data);
  }
}