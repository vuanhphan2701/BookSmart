BookSmart - Smart Online Bookstore Project.
This is a project for building an e-commerce website specializing in books, written in pure PHP following the MVC (Model-View-Controller) architecture. The project includes functionalities for both users (customers) and administrators (admins).
- Main Features:
  + Users: Register/Login, Profile Management, Shopping Cart, Wishlist, Order Placement (COD, VNPAY, Stripe), Order History, Product Reviews, Book Recommendation Chatbot...
  + Admin: User Management, Product Management, Order Management, Role-based Access Control.
- Technologies: PHP (Core), MVC, MySQL, HTML/CSS/JavaScript (AJAX), VNPAY API, Stripe API.
- XAMPP setup version: PHP 8.2.12
- Insert VNPAY APIKEY: private $stripeSecretKey = 'sk_test_51R1lYY4PbxwBwvouhD1i4VnSlrkHtVK7NpevMwu0hrZU34obKNvYIyEG0j1xvm36nbXkQ570n4NSDLBBsJUN2ahn00lU1jjjWr'; Put the following line in the file:
c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\PaymentController.php

