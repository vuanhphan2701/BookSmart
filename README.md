# BookSmart - Dự án cửa hàng sách trực tuyến thông minh
Đây là dự án xây dựng một trang web thương mại điện tử chuyên về sách, được viết bằng PHP thuần theo mô hình MVC (Model-View-Controller). Dự án bao gồm các chức năng cho cả người dùng (khách hàng) và quản trị viên (Admin).
- Các chức năng chính:
  + Người dùng: Đăng ký/Đăng nhập, Quản lý hồ sơ, Giỏ hàng, Danh sách yêu thích, Đặt hàng (COD, VNPAY, Stripe), Lịch sử đơn hàng, Bình luận sản phẩm, Chatbot tư vấn tìm sách...
  + Quản trị: Quản lý người dùng, Quản lý sản phẩm, Quản lý đơn hàng, Phân quyền (Roles).
- Công nghệ: PHP (Core), MVC, MySQL, HTML/CSS/JavaScript (AJAX), VNPAY API, Stripe API.
  
- Set up xampp version: PHP 8.2.12
- Put APIKEY of VNPAY: private $stripeSecretKey = 'sk_test_51R1lYY4PbxwBwvouhD1i4VnSlrkHtVK7NpevMwu0hrZU34obKNvYIyEG0j1xvm36nbXkQ570n4NSDLBBsJUN2ahn00lU1jjjWr'; in file:"c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\PaymentController.php"
