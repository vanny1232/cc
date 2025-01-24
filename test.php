<?php
// Telegram Bot API Token
$botToken = "7444502388:AAEnQM_0RAYX22aMTDfldf9-UxGu350PrIw"; // Replace with your bot's token

// Chat ID
$chatId = "5158405142"; // Replace with your chat ID

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message from the form
    $message = htmlspecialchars($_POST['message']);

    // Telegram API URL
    $telegramApiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";

    // Data to send
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    // Send the request
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($telegramApiUrl, false, $context);

    // Handle the response
    if ($response === false) {
        echo "Failed to send the message.";
    } else {
        echo "Message sent successfully!";
    }
} else {
    echo "Invalid request.";
}
?>
