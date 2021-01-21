<?php
namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
  public function index()
  {
    if (isset($_SESSION['has_login_admin']) && isset($_SESSION['admin_id'])) {
      redirect('/admin/dashboard');
    } else {
      redirect('/admin/login');
    }
  }

  public function login()
  {
    if (getMethod('post')) {
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      $admin = AdminModel::where(['email' => $email])->first();
      if ($admin) {
        if (password_verify($password, $admin->password)) {
          if ($admin->is_active == 1) {
            $_SESSION['has_login_admin'] = true;
            $_SESSION['admin_id'] = $admin->admin_id;
            $_SESSION['email'] = $admin->email;
            $_SESSION['nama'] = $admin->nama_lengkap;
            $_SESSION['foto'] = $admin->foto;
            $_SESSION['created_at'] = $admin->created_at;
            redirect('/admin/dashboard');
          } else {
            notif('error','Akses masuk ditolak! Akun yang anda gunakan berstatus Nonaktif.');
            redirect('/');
          }
        } else {
          notif('warning','Password yang anda masukkan salah! Silahkan ulangi proses.');
          redirect('/admin/login');
        }
      } else {
        notif('warning','Email yang anda masukkan salah / tidak terdaftar! Silahkan ulangi proses.');
        redirect('/admin/login');
      }
    } else {
      self::render('admin/form_login');
    }
  }

  public function logout()
  {
    session_destroy();
    redirect('/');
  }
}