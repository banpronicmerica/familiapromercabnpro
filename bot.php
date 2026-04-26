<?php

$TOKEN = "7865316021:AAHzA3NY8JU8VqknceAY_wop4nDg4z9QGqw";

// Leer lo que manda Telegram
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Verificar que llegó algo
if(isset($data["message"])) {

    $chat_id = $data["message"]["chat"]["id"];
    $text = $data["message"]["text"];

    // Respuesta automática
    $respuesta = "Recibí: " . $text;

    // Enviar mensaje de vuelta
    $url = "https://api.telegram.org/bot$TOKEN/sendMessage";

    $params = [
        "chat_id" => $chat_id,
        "text" => $respuesta
    ];

    file_get_contents($url . "?" . http_build_query($params));
}

// Respuesta obligatoria a Telegram
http_response_code(200);
