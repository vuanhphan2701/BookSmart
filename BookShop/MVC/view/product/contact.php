<main class="main">
      <!--==================== CONTACT BANNER ====================-->
      <section class="contact-banner">
        <div class="contact-banner-main">
          <!-- Contact Info -->
          <div class="contact-banner-info">
            <small class="contact-tagline">Get in Touch</small>
            <h2 class="contact-banner-headline">We’d Love to Hear from You</h2>

            <h5 class="contact-banner-subheadline">
              Reach Out & Let’s Connect
            </h5>

            <p class="contact-banner-description">
              Have a question, feedback, or just want to say hello? Feel free to
              contact us anytime. Our team is here to assist you and ensure you
              have the best experience.
            </p>

            <p class="contact-banner-details">
              <i class="fa-solid fa-envelope"></i>
              Email:
              <a href="mailto:contact@yourwebsite.com"> bookstore@gmail.com</a>
              <br />

              <i class="fa-solid fa-phone"></i>
              Phone:
              <a href="tel:+123456789">0923-627-842</a>
              <br />

              <i class="fa-solid fa-location-dot"></i>
              Address: 123 P. Street, Ho Chi Minh City, Vietnam
            </p>
          </div>

          <!-- Contact Image -->
          <div class="contact-banner-image">
            <img src="view/JS/img/student-banner.png" alt="Contact Us" />
          </div>
        </div>
      </section>

      <!--==================== CONTACT SECTION ====================-->
      <section class="contact section">
        <div class="contact__container container grid">
          <!-- Image Column -->
          <div class="contact__image">
            <img src="view/JS/img/contact.jpg" alt="Contact Us" loading="lazy" />
          </div>

          <!-- Content Column -->
          <div class="contact__content">
            <h2 class="contact-section__title">Send Us a Message</h2>
            <p class="contact__description">
              Have any inquiries or need assistance? Fill out the form below,
              and we'll get back to you as soon as possible.
            </p>

            <!-- Contact Form -->
            <form action="<?= href('product','message') ?>" method="POST" class="contact__form">
              <div class="contact__form-group">
                <label for="name" class="contact__label">Name</label>
                <input
                  type="text"
                  id="name"
                  class="contact__input"
                  placeholder="Your Full Name"
                  name="name"
                  required
                />
              </div>
              <div class="contact__form-group">
                <label for="email" class="contact__label">Email</label>
                <input
                  type="email"
                  id="email"
                  class="contact__input"
                  placeholder="Your Email"
                  name="email"
                  required
                />
              </div>
              <div class="contact__form-group">
                <label for="message" class="contact__label">Message</label>
                <textarea
                  id="message"
                  class="contact__textarea"
                  rows="6"
                  placeholder="Write your message here..."
                  required
                  name="message"
                ></textarea>
              </div>
              <button type="submit" class="button contact__button">
                Send Message
              </button>
            </form>
          </div>
        </div>
      </section>
    </main>