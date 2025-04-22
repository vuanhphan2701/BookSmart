BookSmart - Smart Online Bookstore Project: This is a project for building an e-commerce website specializing in books, written in PHP core following the MVC (Model-View-Controller) architecture. The project includes functionalities for both users (customers) and administrators (admins).
- Main Features:
  + Users: Register/Login, Profile Management, Shopping Cart, Wishlist, Order Placement (COD, VNPAY, Stripe), Order History, Product Reviews, Book Recommendation Chatbot...
  + Admin: User Management, Product Management, Order Management, Role-based Access Control.
- Technologies: PHP (Core), MVC, MySQL, HTML/CSS/JavaScript (AJAX), VNPAY API, Stripe API.
- XAMPP setup version: PHP 8.2.12
- Clone repository in folder htdocs of XAMPP
- Open 'http://localhost/phpmyadmin/' and import the file 'users.sql'.
- Payment Configuration Guide:
  + The system requires users to register and configure their own payment API keys:
  + Stripe: Register for a developer account to obtain test keys
  + VNPAY: Create merchant account on sandbox
  + Insert VNPAY APIKEY: private $stripeSecretKey = 'APIKey' Put the following line in the file: c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\PaymentController.php
=> Now you can run the project as expected.
  

