/*=============== CHATBOT ===============*/
document.addEventListener("DOMContentLoaded", () => {
  const chatboxToggle = document.querySelector(".chatbox-toggle");
  const chatboxMessageWrapper = document.querySelector(
    ".chatbox-message-wrapper"
  );
  const chatboxMessageContent = document.querySelector(
    ".chatbox-message-content"
  );
  const chatboxMessageForm = document.querySelector(".chatbox-message-form");
  const chatboxMessageInput = document.querySelector(".chatbox-message-input");

  // Toggle chatbox visibility
  chatboxToggle.addEventListener("click", () => {
    chatboxMessageWrapper.classList.toggle("show");
  });

  // Handle form submission
  chatboxMessageForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const messageText = chatboxMessageInput.value.trim();
    if (!messageText) return;

    // Display user message
    displayMessage(messageText, "sent");
    chatboxMessageInput.value = "";

    // Send message to Gemini API and display response
    try {
      // Display "AI is thinking..." message
      displayThinkingMessage();
      const geminiResponse = await sendMessageToGemini(messageText);
      removeThinkingMessage();
      displayMessage(geminiResponse, "received");
    } catch (error) {
      console.error("Error sending message to Gemini API:", error);
      removeThinkingMessage();
      displayMessage("Error: Could not retrieve response.", "received");
    }
  });

  // Display message in chatbox
  function displayMessage(message, type) {
    const messageItem = document.createElement("div");
    messageItem.classList.add("chatbox-message-item", type);
    messageItem.innerHTML = marked.parse(message); // Render Markdown
    // Add time to message
    const time = new Date().toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });
    const timeSpan = document.createElement("span");
    timeSpan.classList.add("chatbox-message-item-time");
    timeSpan.textContent = time;
    messageItem.appendChild(timeSpan);
    chatboxMessageContent.appendChild(messageItem);
    // Scroll to bottom of chatbox
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
    if (thinkingMessage) {
      thinkingMessage.remove();
    }
  }

  // Send message to Gemini API
  async function sendMessageToGemini(message) {
    const apiKey = "AIzaSyABpqeSAi2W3TBXaNuwT1cbHKSNtzme_Rg";
    const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;

    const data = {
      contents: [
        {
          parts: [{ text: message + ". Format your response using Markdown." }],
        },
      ],
    };

    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const responseData = await response.json();
    // Extract the text from the response
    const responseText = responseData.candidates[0].content.parts[0].text;
    return responseText;
  }
});
