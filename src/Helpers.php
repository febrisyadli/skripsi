<?php

if (!function_exists('redirect')) {
  function redirect($to) {
    header('location: '.BASEURL.$to);
    exit();
  }
}

if (!function_exists('hasLoginAdmin')) {
  function hasLoginAdmin() {
    return (bool)(isset($_SESSION['has_login_admin']) && isset($_SESSION['admin_id']));
  }
}

if (!function_exists('getMethod')) {
  function getMethod($method) {
    return (bool)(strtolower($_SERVER['REQUEST_METHOD']) == $method);
  }
}

if (!function_exists('notif')) {
  function notif($type, $message) {
    $_SESSION['notif'] = '<script>toastr.'.$type.'("'.$message.'")</script>';
  }
}