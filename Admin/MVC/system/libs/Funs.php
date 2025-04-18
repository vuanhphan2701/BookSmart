<?php
//upload file
function myUpload($file, &$imgMessenger = '', $forder, $type = ['.jpg', '.png', '.jpeg', '.ico', '.svg', '.webp'], $name = 'file_', $maxsize = 3)
{
  if (isset($file['error'], $file['tmp_name']) && $file['error'] == 0 && $file['tmp_name']) {
    $size1 = $maxsize * 1024 * 1024 ;
    if ($file['size'] < 0 && $file['size'] >= $size1) {
      $imgmsg = 'file need to < ' . $maxsize . 'mb';
      return false;
    }
    $ext = strtolower(substr($file['name'], strrpos($file['name'], '.')));
    if (!in_array($ext, $type)) {
      $imgmsg = 'chi cho phep dinh dang sau ' . implode(',', $type);
      return false;
    }
    $fullpath = $forder . '/' . $name . time() . $ext;
    if (move_uploaded_file($file['tmp_name'], $fullpath)) {
      return basename($fullpath);
    } else {
      $imgmsg = 'upload ko thanh cong';
      return false;
    }
  } else {
    $imgmsg = 'file ko hop le';
    return false;
  }
}
//check array
function dd($a)
{
  echo '<pre>', print_r($a), '</pre>';
  exit;
}
// redirect page
function redirect($url)
{
  header('location:' . $url);
  exit;
}
//checked verified
function isVerified()
{
  return isset($_SESSION["login_status_admin"]) && $_SESSION["login_status_admin"];
}
//alert messenger
function messenger($content, $type = 'danger')
{
  return  '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert" >
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
        <strong> ' . $content . '</strong>
    </div>
     <script> 
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {  new bootstrap.Alert(alert); });
    </script>';
}
// href : ?controller = ...&action= ...
function href($controller = 'system', $action = 'index', $parameter = [])
{
  $ex = '';
  foreach ($parameter as $k => $v) {
    $ex .= "&$k=$v";
  }
  return BASE . '?controller=' . $controller . '&action=' . $action . $ex;
}
