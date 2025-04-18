 <!-- c:\xampp\htdocs\BookSmart\BookShop\MVC\view\product\about.php -->
 <!--==================== MAIN ====================-->
 <main class="main">
   <!--==================== BANNER ====================-->
   <section class="about-banner">
     <div class="about-banner-main">
       <!-- About Info -->
       <div class="about-banner-info">
         <small class="about-tagline">Your Book Journey Starts Here</small>

         <h2 class="about-banner-headline">
           Where Literature Meets AI<br>
         </h2>

         <h5 class="about-banner-subheadline">
           Smarter Reading, Powered by Technology
         </h5>

         <p class="about-banner-description">
           We combine curated book selections with intelligent AI assistance to create exceptional reading experiences.
           Our platform helps you:
         </p>

         <ul class="about-features">
           <li>📚 Explore handpicked books across all genres</li>
           <li>🤖 Get personalized recommendations from our Book AI Assistant</li>
           <li>✨ Enjoy a seamless discovery-to-delivery experience</li>
         </ul>

         <p>Every book tells a story - let us help you find yours.</p>
       </div>

       <!-- About Image -->
       <div class="about-banner-image">
         <img src="view/JS/img/banner-about.png" alt="AI-powered book recommendation platform" />
       </div>
     </div>
   </section>

   <!--==================== ABOUT ====================-->
   <section class="about section" id="about">
     <div class="about__container container">
       <h2 class="about__subtitle">A Place Where Stories Come To Life</h2>
       <div class="about__content">
         <!-- Image Column -->
         <div class="about__image">
           <img
             src="view/JS/img/bookstore.jpg"
             alt="Interior view of our bookstore"
             loading="lazy" />
         </div>

         <!-- Text Content Column - UPDATED CONTENT BELOW -->
         <div class="about__text">
           <p class="about__description">
             <i class="fas fa-book"></i> Welcome to
             <strong>BookSmart!</strong> We celebrate the magic of reading
             and the transformative power of every book. Our curated
             collection is designed to spark your imagination and lead you on
             countless adventures.
           </p>
           <p class="about__description">
             <i class="fas fa-users"></i> BookSmart is proudly brought to you by <strong>BTEC HCM</strong>, co-founded by <strong>Phan Anh Vũ</strong> and <strong>Trần Văn Bắc</strong>. Our journey began with a shared passion for literature and a vision to create an accessible, enriching, and intelligent platform for book lovers everywhere.
           </p>
           <p class="about__description">
             <i class="fas fa-book-open"></i> We offer a diverse range of genres, from timeless classics and thrilling mysteries to insightful non-fiction, academic texts, and the latest bestsellers. Whether you're searching for a specific title, exploring a new subject, or simply browsing for inspiration, our goal is to help you discover books that resonate with you.
           </p>

           <!-- **** START: AI CHATBOT MENTION **** -->
           <p class="about__description">
             <i class="ri-robot-2-line"></i> To further enhance your experience, BookSmart features an intelligent <strong>AI Chatbot</strong>, available 24/7. Need help finding a specific book? Have questions about an order? Looking for personalized recommendations? Our chatbot is here to assist you instantly, making your interaction with our bookstore seamless and efficient.
           </p>
           <!-- **** END: AI CHATBOT MENTION **** -->

           
           <!-- Updated button link -->
           <a href="<?= href('product', 'contact') ?>" class="about__button button">
             Get in Touch
           </a>
         </div>
         <!-- END UPDATED CONTENT -->

       </div>
     </div>
   </section>
 </main>