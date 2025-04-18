// --- Helper functions to update counts ---
function updateCartCount(count) {
  const cartCountElement = document.getElementById("cart-count"); // Adjust selector if needed
  if (cartCountElement) {
    cartCountElement.textContent = count;
  } else {
    console.warn("Cart count element (#cart-count) not found.");
  }
}

function updateWishlistCount(count) {
  const wishlistCountElement = document.getElementById("wishlist-count"); // Adjust selector if needed
  if (wishlistCountElement) {
    wishlistCountElement.textContent = count;
  } else {
    console.warn("Wishlist count element (#wishlist-count) not found.");
  }
}

// Function to update the cart and wishlist counts
function updateCounts() {
  // Fetch counts from the server
  fetch('<?= href("product", "ajaxGetCounts") ?>') // Need a new controller method for this
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateCartCount(data.cartCount);
        updateWishlistCount(data.wishlistCount);
      }
    })
    .catch((error) => console.error("Error fetching initial counts:", error));
}

updateCounts();
/*=============== HOME SWIPER ===============*/
let swiperHome = new Swiper(".home__swiper", {
  loop: true,
  spaceBetween: -32,
  grabCursor: true,
  slidesPerView: "auto",
  centeredSlides: "auto",

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },

  breakpoints: {
    1220: {
      slidesPerview: 3,
      spaceBetween: -32,
    },
  },
});
/*=============== TRENDING SWIPER ===============*/
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".trending__swiper", {
    loop: true,
    spaceBetween: 16,
    grabCursor: true,
    slidesPerView: 3,
    slidesPerGroup: 6,
    loopAdditionalSlides: 6,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: { slidesPerView: 6, slidesPerGroup: 6 },
      992: { slidesPerView: 4, slidesPerGroup: 4 },
      768: { slidesPerView: 3, slidesPerGroup: 3 },
      576: { slidesPerView: 2, slidesPerGroup: 2, centeredSlides: true },
      320: { slidesPerView: 1, slidesPerGroup: 1, centeredSlides: true },
    },
    preloadImages: false,
    lazy: true,
  });
});

/*=============== FEATURED SWIPER ===============*/
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".featured__swiper", {
    loop: true,
    spaceBetween: 16,
    grabCursor: true,
    slidesPerView: 3,
    slidesPerGroup: 6,
    loopAdditionalSlides: 6,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: { slidesPerView: 6, slidesPerGroup: 6 },
      992: { slidesPerView: 4, slidesPerGroup: 4 },
      768: { slidesPerView: 3, slidesPerGroup: 3 },
      576: { slidesPerView: 2, slidesPerGroup: 2, centeredSlides: true },
      320: { slidesPerView: 1, slidesPerGroup: 1, centeredSlides: true },
    },
    preloadImages: false,
    lazy: true,
  });
});

/*=============== NEW SWIPER ===============*/
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".new-arrivals__swiper", {
    loop: true,
    spaceBetween: 16,
    grabCursor: true,
    slidesPerView: 3,
    slidesPerGroup: 6,
    loopAdditionalSlides: 6,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: { slidesPerView: 6, slidesPerGroup: 6 },
      992: { slidesPerView: 4, slidesPerGroup: 4 },
      768: { slidesPerView: 3, slidesPerGroup: 3 },
      576: { slidesPerView: 2, slidesPerGroup: 2, centeredSlides: true },
      320: { slidesPerView: 1, slidesPerGroup: 1, centeredSlides: true },
    },
    preloadImages: false,
    lazy: true,
  });
});

/*=============== AUTHOR SWIPER ===============*/
let swiperAuthor = new Swiper(".author__swiper", {
  loop: true,
  slidesPerView: 1, // Default for very small screens
  spaceBetween: 20,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    480: {
      slidesPerView: 1, // Small phones
    },
    768: {
      slidesPerView: 2, // Tablets
    },
    1024: {
      slidesPerView: 3, // Laptops
    },
    1440: {
      slidesPerView: 4, // Larger screens
    },
    1750: {
      slidesPerView: 5, // Extra-large screens
    },
  },
});

/*=============== BOOKS-CATALOG PAGE ===============*/
function startCountdown(duration, display) {
  let timer = duration,
    hours,
    minutes,
    seconds;
  setInterval(() => {
    hours = Math.floor(timer / 3600);
    minutes = Math.floor((timer % 3600) / 60);
    seconds = timer % 60;

    display.textContent =
      (hours < 10 ? "0" : "") +
      hours +
      ":" +
      (minutes < 10 ? "0" : "") +
      minutes +
      ":" +
      (seconds < 10 ? "0" : "") +
      seconds;

    if (--timer < 0) {
      timer = 0;
    }
  }, 1000);
}
window.onload = function () {
  let display = document.getElementById("deal-countdown");
  startCountdown(86400, display);
};

/*=============== BOOKS-CATALOG SWIPER ===============*/
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".books__swiper", {
    loop: true,
    spaceBetween: 16,
    grabCursor: true,
    slidesPerView: 3,
    slidesPerGroup: 6,
    loopAdditionalSlides: 6,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: { slidesPerView: 6, slidesPerGroup: 6 },
      992: { slidesPerView: 4, slidesPerGroup: 4 },
      768: { slidesPerView: 3, slidesPerGroup: 3 },
      576: { slidesPerView: 2, slidesPerGroup: 2, centeredSlides: true },
      320: { slidesPerView: 1, slidesPerGroup: 1, centeredSlides: true },
    },
    preloadImages: false,
    lazy: true,
  });
});

const SWIPER_SPACE_BETWEEN = 20;
const defaultSwiperConfig = {
  loop: true,
  spaceBetween: SWIPER_SPACE_BETWEEN,
  grabCursor: true,
  slidesPerView: "auto",
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
};

/*=============== LIMITED DEALS SWIPER ===============*/
var limitedDealsSwiper = new Swiper(".limited-deals__swiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  grabCursor: true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".limited-deals .swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    1200: {
      slidesPerView: 7,
      centeredSlides: false,
    },
    992: {
      slidesPerView: 4,
      centeredSlides: false,
    },
    768: {
      slidesPerView: 3,
      centeredSlides: false,
    },
    576: {
      slidesPerView: 2,
      centeredSlides: true,
    },
    320: {
      slidesPerView: 1,
      centeredSlides: true,
    },
  },
});

/*=============== GENRE SPOTLIGHT SWIPER ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".genre-spotlight__swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: {
        slidesPerView: 5,
        centeredSlides: false,
      },
      992: {
        slidesPerView: 4,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 3,
        centeredSlides: false,
      },
      576: {
        slidesPerView: 2,
        centeredSlides: true,
      },
      320: {
        slidesPerView: 1,
        centeredSlides: true,
      },
    },
  });

  const swiperContainer = document.querySelector(".genre-spotlight__swiper");

  swiperContainer.addEventListener("mouseenter", () => {
    swiper.autoplay.stop();
  });

  swiperContainer.addEventListener("mouseleave", () => {
    swiper.autoplay.start();
  });
});

/*=============== SHOW SCROLL UP ===============*/
const scrollUp = () => {
  const scrollUpEl = document.getElementById("scroll-up");
  if (scrollUpEl) {
    window.scrollY >= 350
      ? scrollUpEl.classList.add("show-scroll")
      : scrollUpEl.classList.remove("show-scroll");
  }
};

window.addEventListener("scroll", scrollUp);

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll("section[id]");

const scrollActive = () => {
  const scrollDown = window.scrollY;

  sections.forEach((current) => {
    const sectionHeight = current.offsetHeight;
    const sectionTop = current.offsetTop - 58;
    const sectionId = current.getAttribute("id");
    const sectionsClass = document.querySelector(
      `.nav__menu a[href="#${sectionId}"]`
    );

    if (sectionsClass) {
      // Check if the element exists before modifying classList
      if (scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight) {
        sectionsClass.classList.add("active-link");
      } else {
        sectionsClass.classList.remove("active-link");
      }
    }
  });
};

window.addEventListener("scroll", scrollActive);

/*=============== SCROLL REVEAL ANIMATION ===============*/
const scrollRevealConfig = {
  origin: "top",
  distance: "60px",
  duration: 2500,
  delay: 400,
  opacity: 0,
  reset: false,
};

const sr = ScrollReveal(scrollRevealConfig);

const revealSelectors = [
  ".home__data",
  ".featured__container",
  ".new__container",
  ".join__container",
  ".author__container",
  ".register-section",
  ".login-section",
  ".books__container",
  ".catalog__filter-genre",
  ".filter__container",
  ".banner__container",
  ".book-detail__container",
  ".detail-customer__container",
  ".related__container",
  ".wishlist__container",
  ".cart__items-container",
  ".cart__suggestions-container",
  ".order-summary__container",
  ".checkout__container",
  ".profile__container",
  ".orders__container",
  ".profile",
  ".about__container",
  ".contact__container",
  ".limited-deals__container",
  ".search-bar__container",
  ".categories__container",
  ".genre-spotlight__container",
  ".recommend-book__container",
  ".book-category__container",
  ".home__images",
  ".services__card",
  ".suggestion__box",
  ".offers__container",
  ".best-sellers__main",
  ".home-main",
  ".new-arrivals__container",
  ".trending__container",
  ".blog__container",
  ".forgot-password-section",
  ".edit-address__container",
  ".manage-payment__container",
  ".change-password__container",
  ".update-preferences__container",
  ".payment-section",
  ".comments__container",
  ".confirm__container",
  ".order-detail-container",
];

// Combine them into one string for ScrollReveal
const combinedSelectors = revealSelectors.join(", ");

// Reveal them with optional configuration
sr.reveal(combinedSelectors, {
  origin: "bottom",
  distance: "50px",
  duration: 800,
  delay: 200,
  opacity: 0,
  reset: false,
});

/*=============== CUSTOMER-DETAILS SWIPER ===============*/
// let customerSwiper = new Swiper(".customer-detail__swiper", {
//   loop: true,
//   spaceBetween: 20,
//   slidesPerView: 1,

//   autoplay: {
//     delay: 3000,
//     disableOnInteraction: false,
//   },
//   breakpoints: {
//     1150: {
//       slidesPerView: 1,
//     },
//   },
// });

/*=============== RELATED-BOOK SWIPER ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".book-related__swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: {
        slidesPerView: 6,
        centeredSlides: false,
      },
      992: {
        slidesPerView: 4,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 3,
        centeredSlides: false,
      },
      576: {
        slidesPerView: 2,
        centeredSlides: true,
      },
      320: {
        slidesPerView: 1,
        centeredSlides: true,
      },
    },
  });

  const swiperContainer = document.querySelector(".book-related__swiper");

  swiperContainer.addEventListener("mouseenter", () => {
    swiper.autoplay.stop();
  });

  swiperContainer.addEventListener("mouseleave", () => {
    swiper.autoplay.start();
  });
});

/*=============== RECOMMENDED-BOOKS SWIPER ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".book-recommend__swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: {
        slidesPerView: 6,
        centeredSlides: false,
      },
      992: {
        slidesPerView: 4,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 3,
        centeredSlides: false,
      },
      576: {
        slidesPerView: 2,
        centeredSlides: true,
      },
      320: {
        slidesPerView: 1,
        centeredSlides: true,
      },
    },
  });

  const swiperContainer = document.querySelector(".book-related__swiper");

  swiperContainer.addEventListener("mouseenter", () => {
    swiper.autoplay.stop();
  });

  swiperContainer.addEventListener("mouseleave", () => {
    swiper.autoplay.start();
  });
});

/*=============== CART ===============*/
/*=============== CART-SUGGESTIONS SWIPER ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".cart-suggestions__swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 6 },
    },
  });

  const swiperContainer = document.querySelector(".cart-suggestions__swiper");

  swiperContainer.addEventListener("mouseenter", () => {
    swiper.autoplay.stop();
  });

  swiperContainer.addEventListener("mouseleave", () => {
    swiper.autoplay.start();
  });
});

/*=============== EDDIT-ADDRESS-MANAGE ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const cancelButton = document.querySelector(
    ".edit-address__button.cancel-button"
  );

  cancelButton.addEventListener("click", function () {
    // Handle cancel button click (e.g., redirect to profile page)
    window.location.href = "profile.html";
  });
});

/*=============== PROFILE-MANAGE-PAYMENT ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const addPaymentForm = document.getElementById("add-payment-form");
  const cancelButton = document.querySelector(
    ".manage-payment__button.cancel-button"
  );
  const removeButtons = document.querySelectorAll(".payment-methods__remove");

  addPaymentForm.addEventListener("submit", function (event) {
    event.preventDefault();
    // Handle form submission (e.g., send data to the server)
    alert("Payment method added successfully!");
  });

  cancelButton.addEventListener("click", function () {
    // Handle cancel button click (e.g., redirect to profile page)
    window.location.href = "profile.html";
  });

  removeButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Handle remove button click (e.g., send request to the server to remove the payment method)
      const listItem = button.closest(".payment-methods__item");
      listItem.remove();
      alert("Payment method removed successfully!");
    });
  });
});

/*=============== CHANGE-PASSWORD-MANAGE ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const cancelButton = document.querySelector(
    ".change-password__button.cancel-button"
  );

  cancelButton.addEventListener("click", function () {
    // Handle cancel button click (e.g., redirect to profile page)
    window.location.href = "profile.html";
  });
});

/*=============== UPDATE PREFERENCES-MANAGE ===============*/
document.addEventListener("DOMContentLoaded", function () {
  const cancelButton = document.querySelector(
    ".update-preferences__button.cancel-button"
  );

  cancelButton.addEventListener("click", function () {
    // Handle cancel button click (e.g., redirect to profile page)
    window.location.href = "profile.html";
  });
});

// /*=============== CHATBOT ===============*/
document.addEventListener("DOMContentLoaded", () => {
  "use strict";
  // Configuration
  const USE_PHP_BACKEND = true; // Set to false to call Gemini API directly
  // API URLs
  const GEMINI_API_URL =
    "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent";
  const PHP_BACKEND_URL = "/BookSmart/BookShop/MVC/view/gemini.php"; // Path to PHP script
  // Cached DOM elements
  const chatboxToggle = document.querySelector(".chatbox-toggle");
  const chatboxMessageWrapper = document.querySelector(
    ".chatbox-message-wrapper"
  );
  const chatboxMessageContent = document.querySelector(
    ".chatbox-message-content"
  );
  const chatboxMessageForm = document.querySelector(".chatbox-message-form");
  const chatboxMessageInput = document.querySelector(".chatbox-message-input");
  const chatboxIntroMessage = document.querySelector(".chatbox-intro-message"); // Get intro message element
  chatboxMessageInput.setAttribute("spellcheck", "false");
  let isSubmitting = false;
  let introMessageHidden = false; // Flag to track if intro is hidden
  // Toggle chatbox visibility
  chatboxToggle.setAttribute("aria-expanded", "false");
  chatboxToggle.addEventListener("click", () => {
    const isExpanded = chatboxMessageWrapper.classList.toggle("show");
    chatboxToggle.setAttribute("aria-expanded", isExpanded);
    if (isExpanded) chatboxMessageInput.focus();
  });

  // Function to load chat history from backend
  async function loadChatHistory() {
    try {
      const response = await fetch(PHP_BACKEND_URL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action: "get_history" }), // Request history
      });
      if (!response.ok)
        throw new Error(`HTTP error! Status: ${response.status}`);
      const data = await response.json();

      if (
        data.history &&
        Array.isArray(data.history) &&
        data.history.length > 0
      ) {
        // Hide intro message if history exists
        if (chatboxIntroMessage) {
          chatboxIntroMessage.style.display = "none";
          introMessageHidden = true;
        }
        // Display each message from history
        data.history.forEach((message) => {
          if (message.sender && message.text) {
            const type = message.sender === "User" ? "sent" : "received";
            // Pass false for adding time, as history doesn't have precise timestamps
            displayMessage(message.text, type, false);
          }
        });
        // Scroll to bottom after loading history
        chatboxMessageContent.scrollTop = chatboxMessageContent.scrollHeight;
      }
    } catch (error) {
      console.error("Error loading chat history:", error);
      // Optionally display an error to the user in the chatbox
      // displayMessage("Could not load previous chat.", "received");
    }
  }

  // Handle form submission
  chatboxMessageForm.addEventListener("submit", handleFormSubmit);
  // Handle Enter key in textarea
  chatboxMessageInput.addEventListener("keydown", (event) => {
    if (event.key === "Enter" && !event.shiftKey) {
      event.preventDefault();
      chatboxMessageForm.dispatchEvent(new Event("submit"));
    }
  });
  async function handleFormSubmit(event) {
    event.preventDefault();
    if (isSubmitting) return;
    isSubmitting = true;
    const messageText = chatboxMessageInput.value.trim();
    if (!messageText) {
      isSubmitting = false;
      return;
    }
    // Hide intro message if it exists and hasn't been hidden yet
    if (chatboxIntroMessage && !introMessageHidden) {
      chatboxIntroMessage.style.display = "none";
      introMessageHidden = true;
    }
    // Display user message
    displayMessage(messageText, "sent");
    chatboxMessageInput.value = "";
    // Send message to API and display response
    try {
      displayThinkingMessage();
      const response = USE_PHP_BACKEND
        ? await sendMessageToBackend(messageText)
        : await sendMessageToGemini(messageText);
      removeThinkingMessage();
      displayMessage(response, "received");
    } catch (error) {
      console.error("Error fetching response:", error);
      removeThinkingMessage();
      displayMessage("Error: Could not retrieve response.", "received");
    } finally {
      isSubmitting = false;
    }
  }
  // Display message in chatbox (add optional parameter to control time display)
  function displayMessage(message, type, addTime = true) {
    const messageItem = document.createElement("div");
    messageItem.classList.add("chatbox-message-item", type);
    messageItem.innerHTML = window.marked ? marked.parse(message) : message;
    // Add book-image class to img elements
    const imgElements = messageItem.querySelectorAll("img");
    imgElements.forEach((img) => {
      img.classList.add("book-image");
    });
    // Add time to message
    const timeSpan = document.createElement("span");
    timeSpan.classList.add("chatbox-message-item-time");
    timeSpan.textContent = new Date().toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });
    if (addTime) {
      // Only add time if requested (true by default)
      messageItem.appendChild(timeSpan);
    }
    chatboxMessageContent.appendChild(messageItem);
    chatboxMessageContent.scrollTop = chatboxMessageContent.scrollHeight;
  }
  // Display "AI is thinking..." message
  function displayThinkingMessage() {
    const thinkingMessage = document.createElement("div");
    thinkingMessage.classList.add(
      "chatbox-message-item",
      "received",
      "thinking"
    );
    // Use a custom "dots" spinner
    thinkingMessage.innerHTML = `
      <i class="fas fa-spinner fa-spin"></i>
    `;
    thinkingMessage.id = "thinking-message";
    chatboxMessageContent.appendChild(thinkingMessage);
    chatboxMessageContent.scrollTop = chatboxMessageContent.scrollHeight;
  }
  // Remove "AI is thinking..." message
  function removeThinkingMessage() {
    const thinkingMessage = document.getElementById("thinking-message");
    if (thinkingMessage) thinkingMessage.remove();
  }
  // Send message to Gemini API directly
  async function sendMessageToGemini(message) {
    const response = await fetch(`${GEMINI_API_URL}?key=YOUR_API_KEY`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ contents: [{ parts: [{ text: message }] }] }),
    });
    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
    const responseData = await response.json();
    return (
      responseData.candidates?.[0]?.content?.parts?.[0]?.text || "No response"
    );
  }
  // Send message to PHP backend
  async function sendMessageToBackend(message) {
    const response = await fetch(PHP_BACKEND_URL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message }),
    });
    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
    const responseData = await response.json();
    // Corrected line: Use responseData.reply
    return (
      responseData.reply || "Error: Could not parse response from backend."
    );
  }
  // Add this function to clear messages
  async function clearMessages() {
    // Select all message items (sent and received)
    const messageItems = chatboxMessageContent.querySelectorAll(
      ".chatbox-message-item"
    );
    // Remove each message item
    messageItems.forEach((item) => {
      // Make sure not to remove the intro message if it was somehow added with this class
      if (!item.classList.contains("chatbox-intro-message")) {
        item.remove();
      }
    });
    // Show the intro message again if it exists
    if (chatboxIntroMessage) {
      chatboxIntroMessage.style.display = "block"; // Explicitly set to block or its original display type
      chatboxIntroMessage.classList.add("zoom-in"); // Add zoom-in class
      introMessageHidden = false; // Reset the flag
    }
    // Send clear_session message to backend
    try {
      const response = await fetch(PHP_BACKEND_URL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ message: "clear_session" }),
      });
      if (!response.ok)
        throw new Error(`HTTP error! Status: ${response.status}`);
      const responseData = await response.json();
      console.log(responseData.reply); // Optional: Log the response
    } catch (error) {
      console.error("Error clearing session:", error);
    }
  }
  // Add this code to create the delete icon and attach the clearMessages function
  const chatboxMessageHeader = document.querySelector(
    ".chatbox-message-header"
  );
  const deleteIcon = document.createElement("i");
  deleteIcon.classList.add("bx", "bx-trash");
  deleteIcon.style.cursor = "pointer";
  deleteIcon.addEventListener("click", clearMessages);
  chatboxMessageHeader.appendChild(deleteIcon);
  // Add fade-in style
  const style = document.createElement("style");
  style.textContent = `
     .zoom-in {
       animation: zoomIn 0.3s;
     }
     @keyframes zoomIn {
       from {
         transform: scale(0.5);
         opacity: 0;
       }
       to {
         transform: scale(1);
         opacity: 1;
       }
     }
     .chatbox-intro-message {
      transform-origin: center;
    }
  `;
  document.head.appendChild(style);

  // Load chat history when the DOM is ready
  loadChatHistory();
});
