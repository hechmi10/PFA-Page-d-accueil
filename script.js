const chatBox = document.getElementById('chat-box');
const userInput = document.getElementById('user-input');

// Function to add a message to the chat box
function addMessage(message, sender) {
  const messageElement = document.createElement('div');
  messageElement.classList.add('message', sender);
  messageElement.innerText = message;
  chatBox.appendChild(messageElement);
  chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
}

// Function to send user message and get bot response
function sendMessage() {
  const message = userInput.value;
  if (message.trim() === '') return; // Don't send empty messages
  addMessage(message, 'user');
  userInput.value = '';

  // Simulating a bot response (replace with actual bot logic)
  setTimeout(() => {
    const response = getBotResponse(message);
    addMessage(response, 'bot');
  }, 500);
}

// Function to generate bot response (replace with actual bot logic)
function getBotResponse(message) {
  // Simple example of bot responses based on user input
  if (message.toLowerCase().includes('crop')) {
    return "Crops such as wheat, rice, and maize are commonly grown in many regions.";
  } else if (message.toLowerCase().includes('pest')) {
    return "Pests can cause significant damage to crops. It's important to use integrated pest management techniques to control them.";
  } else if (message.toLowerCase().includes('soil')) {
    return "Healthy soil is essential for successful farming. Practices like crop rotation and soil conservation help maintain soil fertility.";
  } else {
    return "I'm sorry, I didn't understand that. Can you please provide more details?";
  }
}
