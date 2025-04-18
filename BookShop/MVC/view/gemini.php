<?php
session_start();

header('Content-Type: application/json');

// --- Configuration ---
$apiKey = "AIzaSyBSEzkO5BkpLSFMV3t2B69chNy4VKE6l-c"; // Replace with your actual API key
$apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";
$datasetPath = __DIR__ . '/data-set.json'; // Use __DIR__ for relative path

// --- Helper Functions ---
function send_json_error($code, $message, $logMessage = null) {
    http_response_code($code);
    if ($logMessage) {
        error_log($logMessage);
    }
    echo json_encode(['error' => $message]);
    exit;
}

// --- Input Processing ---
$rawData = file_get_contents('php://input');
if ($rawData === false) {
    send_json_error(500, 'Failed to read request body.');
}

$data = json_decode($rawData, true);
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    send_json_error(400, 'Invalid JSON data in request', 'JSON decode error: ' . json_last_error_msg());
}

// Assign $userMessage and $action based on incoming data
$userMessage = isset($data['message']) ? trim($data['message']) : null;
$action = isset($data['action']) ? trim($data['action']) : null;

// Validate: We need either a message (for chat) or an action
if ($userMessage === null && $action === null) {
     send_json_error(400, 'Invalid request: Missing message or action.');
}


// --- Initialize or Retrieve Chat History (as an array) ---
if (!isset($_SESSION['chat_history_array']) || !is_array($_SESSION['chat_history_array'])) {
    $_SESSION['chat_history_array'] = [];
}
$chatHistoryArray = $_SESSION['chat_history_array'];


// --- Handle Specific Actions ---

// Action: Clear Session (Check action first, then message for backward compatibility if needed)
if ($action === 'clear_session' || $userMessage === 'clear_session') {
    $_SESSION['chat_history_array'] = []; // Clear the array
    // Optionally destroy the entire session if needed
    // session_destroy();
    echo json_encode(['reply' => 'Chat history cleared.']);
    exit;
}

// Action: Get History (Only check action)
if ($action === 'get_history') {
    // Return the chat history array directly
    echo json_encode(['history' => $chatHistoryArray]); // Ensure this returns the correct structure
    exit;
}

// --- Proceed with message processing only if it's not an action request and message exists ---
if ($action === null && $userMessage !== null) {
    // --- Load and Cache Context --- (Move context loading inside this block)
    static $dataset = null;

    if ($dataset === null) {
        // Sanitize the dataset path before using it
    $realDatasetPath = realpath($datasetPath);
    if ($realDatasetPath === false || !is_file($realDatasetPath)) {
        send_json_error(500, 'Bookstore data file not found or inaccessible.', "Error accessing dataset file: $datasetPath");
    }

    $datasetJson = file_get_contents($realDatasetPath);
    if ($datasetJson === false) {
        send_json_error(500, 'Failed to load bookstore data.', "Error reading dataset file: $realDatasetPath");
    }

    $dataset = json_decode($datasetJson, true);
    if ($dataset === null && json_last_error() !== JSON_ERROR_NONE) {
        send_json_error(500, 'Failed to parse bookstore data.', "JSON decode error for $realDatasetPath: " . json_last_error_msg());
    }
}


// Build the context string
$context = "
You are Ben Hanscom, a friendly, enthusiastic, and knowledgeable bookstore assistant. You love books and know your inventory well.

**Core Directives:**
* **Language:** ALWAYS respond in the user's language.
* **Inventory:** ONLY use `/BookShop/MVC/view/data-set.json` for book availability, format (hardcover/paperback/eBook), and price. Be specific.
* **Scope:** ONLY discuss books, authors, genres, recommendations, inventory, or literature. Politely redirect other topics in the user's language.

**Interaction Style:**
* **Persona:** Be conversational, informal (use contractions), and enthusiastic. Avoid robotic responses.
* **Recommendations:** Offer personalized suggestions based on user interest. Explain *why* they might like a book. Mention popular options if relevant. **Do not recommend books that have already been mentioned in the chat history.**
* **Handling Out-of-Stock:** If a book isn't available, say so and suggest similar in-stock alternatives from the inventory.
* **Conversation Flow:** Ask clarifying questions if needed. Stick to a book the user asked about unless they ask for different recommendations. Summarize if helpful. Use natural transitions.
* **Greetings:** Respond warmly to greetings in the user's language.
* **Specific Book Info:** If asked about one book, provide ONLY its details from the inventory. // Giữ lại quy tắc này nhưng quy tắc follow-up sẽ ghi đè khi cần.
* **Formatting:** Use Markdown (bolding, lists) naturally.

**Bookstore Inventory Data (/BookShop/MVC/view/data-set.json):**\n";

// Ensure $dataset is an array before iterating
if (is_array($dataset)) {
    foreach ($dataset as $book) {
        // Check if $book is an array and has the required keys
        if (is_array($book) && isset($book['title']) && isset($book['author']) && isset($book['category']) && isset($book['price'])) {
            $title = htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'); // Sanitize output
            $author = htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8');
            $category = htmlspecialchars($book['category'], ENT_QUOTES, 'UTF-8');
            $price = strval($book['price']); // Convert price to string
            $format = isset($book['Book_Format']) ? htmlspecialchars($book['Book_Format'], ENT_QUOTES, 'UTF-8') : (isset($book['format']) ? htmlspecialchars($book['format'], ENT_QUOTES, 'UTF-8') : 'N/A'); // Use Book_Format or format, default to N/A
            $imageUrl = isset($book['image']) ? htmlspecialchars($book['image'], ENT_QUOTES, 'UTF-8') : 'No Image Available'; // Get image URL
            $productId = isset($book['product_id']) ? htmlspecialchars($book['product_id'], ENT_QUOTES, 'UTF-8') : 'N/A'; // Get product ID
            $context .= "- Title: {$title}, Author: {$author}, Category: {$category}, Price: {$price}, Format: {$format}, Product ID: {$productId}, Image URL: {$imageUrl}\n"; // Add Image URL and Product ID
        } else {
            // Log or handle the case where a book entry is invalid
            error_log("Invalid book entry found in dataset: " . print_r($book, true));
        }
    }
} else {
    // Log or handle the case where $dataset is not an array
    error_log("Dataset is not an array. Dataset content: " . print_r($dataset, true));
        send_json_error(500, 'Internal error processing bookstore data.');
    }

    // Build chat history string for the context
    $chatHistoryString = "";
foreach ($chatHistoryArray as $entry) {
    if (isset($entry['sender']) && isset($entry['text'])) {
        // Sanitize before adding to context string
        $sender = htmlspecialchars($entry['sender'], ENT_QUOTES, 'UTF-8');
        $text = htmlspecialchars($entry['text'], ENT_QUOTES, 'UTF-8');
        $chatHistoryString .= "**{$sender}:** {$text}\n";
    }
}
    $context .= "\n**Chat History:**\n" . $chatHistoryString; // Add the built string

    $context .= "

**Book Information Format:**
When you include information about a book *for the first time* or are making a *new recommendation*, use this Markdown format, with a blank line between each element:

**Title:** [Book Title]

**Description:** [A detailed description of the book, using the 'Description' field from the inventory data provided above. Rephrase it naturally, don't just copy-paste.]

![Book Image]([Image URL])

**Link:** [Details Here!](http://localhost/BookSmart/BookShop/MVC/?controller=product&action=detail&id=[product_id])

---

**Multiple Books:** If you're recommending more than one book, add a blank line between each book's information.
**Other Responses:** For responses that don't include book information, just use natural language.

Do NOT mention this formatting in your response.
";

$context .= "

**Handling Follow-up Questions (CRITICAL EXCEPTION):**
Check the **Chat History**. If your (Ben's) **immediately preceding message** presented a specific book using the **Book Information Format** above, AND the current user query is asking a follow-up question *about that exact same book* (like asking for strengths, weaknesses, author info, etc.), then:
1.  Answer ONLY the user's specific question conversationally in plain language.
2.  **DO NOT** repeat the full **Book Information Format** (Title, Description, Image, Link, ---) for that book in your response.
3.  You *can* naturally mention specific details (like price or author) within your conversational answer if relevant to the question asked.
This follow-up rule OVERRIDES the 'Specific Book Info' rule in this specific context.
";

    // Final instruction
    $context .= "Okay Ben, now answer the user's query naturally and conversationally **in the language the user used**. Prioritize the 'Handling Follow-up Questions' rule when applicable based on the chat history.
    ";

    // --- Prepare API Payload ---
$payload = [
    'contents' => [
        [
            'parts' => [
                // Ensure user message is treated as plain text, context is instructions
                ['text' => $context . "\n**User Query:** " . $userMessage],
            ],
        ],
    ],
    // It's highly recommended to configure safety settings
    'safetySettings' => [
        [
            'category' => 'HARM_CATEGORY_HARASSMENT',
            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
        ],
        [
            'category' => 'HARM_CATEGORY_HATE_SPEECH',
            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
        ],
        [
            'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
        ],
        [
            'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
        ]
    ],
    'generationConfig' => [
        'temperature' => 0.7, // Adjust for creativity vs. factuality
        'topK' => 40,
        'topP' => 0.95,
        'maxOutputTokens' => 1024, // Limit response length
    ]
];

// --- Send Request to Gemini API ---
$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n" . // Explicitly accept JSON
            "User-Agent: MyBookstorePHPApp/1.0\r\n", // Identify your application
        'method' => 'POST',
        'content' => json_encode($payload),
        'ignore_errors' => true, // Important to get error response body
        'timeout' => 60 // Set a reasonable timeout (e.g., 60 seconds)
    ],
    // Consider SSL verification settings for production
    // 'ssl' => [
    //     'verify_peer' => true,
    //     'cafile' => '/path/to/cacert.pem', // Path to trusted CA bundle
    //     'verify_peer_name' => true,
    // ]
];

$streamContext = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $streamContext);

// --- Process API Response ---
if ($result === false) {
    // Check for specific stream errors if possible
    $lastError = error_get_last();
    $errorMsg = 'Failed to connect to the AI service.';
    if ($lastError !== null) {
        $errorMsg .= ' Error: ' . $lastError['message'];
    }
    // Avoid logging the API key directly in production logs if possible
    send_json_error(500, $errorMsg, 'file_get_contents failed for Gemini API. Last error: ' . print_r($lastError, true));
}

$httpStatusCode = 500; // Default to 500
if (isset($http_response_header) && is_array($http_response_header)) {
    // Extract HTTP status code from headers more reliably
    foreach ($http_response_header as $header) {
        if (preg_match('{^HTTP/\d\.\d\s+(\d+)\s+}', $header, $match)) {
            $httpStatusCode = (int)$match[1];
            break;
        }
    }
}

$response = json_decode($result, true);
$jsonDecodeError = json_last_error();

// Check for various error conditions
if ($httpStatusCode !== 200 || ($response === null && $jsonDecodeError !== JSON_ERROR_NONE)) {
    $apiErrorMsg = 'Unknown API error';
    // Limit logging of raw result in production if it contains sensitive info
    $logDetails = "Gemini API Error (HTTP $httpStatusCode). Raw Response Substring: " . substr($result, 0, 500); // Log only the beginning

    if ($response !== null && isset($response['error']['message'])) {
        $apiErrorMsg = 'API Error: ' . $response['error']['message'];
        // Optionally log more details from the error structure if available
        $logDetails .= "\nAPI Error Details: " . json_encode($response['error']);
    } elseif ($response === null && $jsonDecodeError !== JSON_ERROR_NONE) {
        $apiErrorMsg = 'Invalid JSON response from API. Status: ' . $httpStatusCode . '. JSON Error: ' . json_last_error_msg();
    } elseif (isset($response['promptFeedback']['blockReason'])) {
        $apiErrorMsg = 'Request blocked due to content policies. Reason: ' . $response['promptFeedback']['blockReason'];
        $logDetails .= "\nPrompt Feedback: " . json_encode($response['promptFeedback']);
    } else {
        $apiErrorMsg = 'API returned HTTP status ' . $httpStatusCode . ' with an unexpected response.';
    }

    send_json_error(500, 'AI service request failed: ' . $apiErrorMsg, $logDetails);
}

// More robust check for successful candidate content
if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
    $answer = $response['candidates'][0]['content']['parts'][0]['text'];

    // Sanitize user message and answer before storing in chat history
    // Update chat history array in session
    // No need to sanitize here if we sanitize when building the context string and when outputting history
    $_SESSION['chat_history_array'][] = ['sender' => 'User', 'text' => $userMessage];
    $_SESSION['chat_history_array'][] = ['sender' => 'Ben', 'text' => $answer];

    // Determine language (very basic, improve if needed)
    $language = (strpos($answer, 'Chào') !== false) ? 'vi-VN' : 'en-US';

    // Send the successful reply with language
    echo json_encode(['reply' => $answer, 'language' => $language]);

} elseif (isset($response['candidates'][0]['finishReason']) && $response['candidates'][0]['finishReason'] !== 'STOP') {
    // Handle cases where generation finished abnormally (e.g., SAFETY, RECITATION, MAX_TOKENS)
    $finishReason = $response['candidates'][0]['finishReason'];
    $apiErrorMsg = 'AI generation finished unexpectedly. Reason: ' . $finishReason;
    $logDetails = "Gemini API Finish Reason: $finishReason. Response Substring: " . substr($result, 0, 500);
    if (isset($response['candidates'][0]['safetyRatings'])) {
        $logDetails .= "\nSafety Ratings: " . json_encode($response['candidates'][0]['safetyRatings']);
    }
    // Consider providing a more user-friendly message if appropriate (e.g., for MAX_TOKENS)
    if ($finishReason === 'MAX_TOKENS') {
        $apiErrorMsg = 'The response was too long and had to be cut short. Try asking a more specific question.';
    } elseif ($finishReason === 'SAFETY') {
        $apiErrorMsg = 'The response could not be generated due to safety content policies.';
    }

    send_json_error(500, $apiErrorMsg, $logDetails);

} else {
    // Catch-all for other unexpected valid JSON responses without usable content
    $logDetails = "Unexpected Gemini API response structure. Response Substring: " . substr($result, 0, 500);
    send_json_error(500, 'Received an unexpected response format from the AI service.', $logDetails);
}
// End of message processing block
} elseif ($action === null && $userMessage === null) {
    // This case should have been caught earlier, but as a fallback
    send_json_error(400, 'Invalid request state.');
}
// If it was an action ('get_history' or 'clear_session'), execution would have exited earlier.

?>
