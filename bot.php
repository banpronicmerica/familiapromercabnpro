<?php

$TOKEN = "7865316021:AAHzA3NY8JU8VqknceAY_wop4nDg4z9QGqw";

$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Guardar log (para verificar que llega algo)
file_put_contents("log.txt", $input . PHP_EOL, FILE_APPEND);

if(isset($data["message"])) {
    $chat_id = $data["message"]["chat"]["id"];
    $text = $data["message"]["text"];

    $url = "https://api.telegram.org/bot$TOKEN/sendMessage";

    $params = [
        "chat_id" => $chat_id,
        "text" => "Recibí: " . $text
    ];

    file_get_contents($url . "?" . http_build_query($params));
}

http_response_code(200);
