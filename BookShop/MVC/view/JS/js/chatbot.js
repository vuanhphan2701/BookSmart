/*=============== CHATBOT ===============*/
document.addEventListener("DOMContentLoaded", () => {
  "use strict";
  // Configuration
  const USE_PHP_BACKEND = true; // Set to false to call Gemini API directly
  // API URLs
  const GEMINI_API_URL =
    "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent";
  const PHP_BACKEND_URL = "/BookShop/MVC/view/gemini.php";
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
  let isSubmitting = false;
  // Toggle chatbox visibility
  chatboxToggle.setAttribute("aria-expanded", "false");
  chatboxToggle.addEventListener("click", () => {
    const isExpanded = chatboxMessageWrapper.classList.toggle("show");
    chatboxToggle.setAttribute("aria-expanded", isExpanded);
    if (isExpanded) chatboxMessageInput.focus();
  });
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
      displayMessage(
        "Error: Could not retrieve response. Check the console for details.",
        "received"
      );
    } finally {
      isSubmitting = false;
    }
  }
  // Display message in chatbox
  function displayMessage(message, type) {
    const messageItem = document.createElement("div");
    messageItem.classList.add("chatbox-message-item", type);
    messageItem.innerHTML = window.marked ? marked.parse(message) : message;
    // Add time to message
    const timeSpan = document.createElement("span");
    timeSpan.classList.add("chatbox-message-item-time");
    timeSpan.textContent = new Date().toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });
    messageItem.appendChild(timeSpan);
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
    thinkingMessage.textContent = "AI is thinking...";
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
    const answer =
      responseData.candidates?.[0]?.content?.parts?.[0]?.text || "No response";
    return answer;
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
});
