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
  return isset($_SESSION["login_status"]) && $_SESSION["login_status"];
}
//alert messenger
function messenger($content, $type = 'danger') {
  $bgColor = ($type == 'success') ? '#28a745' : '#dc3545'; // Xanh lá cho thành công, đỏ cho lỗi
  $textColor = '#fff'; // Màu chữ trắng để nổi bật

  return '
  <div class="custom-alert" style="background: ' . $bgColor . '; color: ' . $textColor . '; padding: 10px 20px; border-radius: 5px; text-align: center; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000;">
      <strong>' . $content . '</strong>
      <button type="button" class="close-alert" style="border: none; background: transparent; color: white; font-size: 18px; margin-left: 10px; cursor: pointer;">×</button>
  </div>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          document.querySelector(".close-alert").addEventListener("click", function() {
              document.querySelector(".custom-alert").style.display = "none";
          });

          setTimeout(function() {
              if (document.querySelector(".custom-alert")) {
                  document.querySelector(".custom-alert").style.display = "none";
              }
          }, 5000); // Ẩn sau 5 giây
      });
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
