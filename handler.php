<?php

require_once __DIR__ . '/mailer/Validator.php';
require_once __DIR__ . '/mailer/ContactMailer.php';

if (!Validator::isAjax() || !Validator::isPost()) {
	echo 'Доступ запрещен!';
	exit;
}
$page = $_POST['user_page'];
$name = isset($_POST['user_name']) ? trim(strip_tags($_POST['user_name'])) : null;
$phone = isset($_POST['user_phone']) ? trim(strip_tags($_POST['user_phone'])) : null;
$message = isset($_POST['user_message']) ? trim(strip_tags($_POST['user_message'])) : null;

if (empty($name) || empty($phone)) {
	echo 'Все поля обязательны для заполнения.';
	exit;
}

if (!Validator::isValidPhone($phone)) {
	echo 'Телефон не соответствует формату.';
	exit;
}

// Ключ задаётся в локальном конфиге (config.local.php, не хранится в git)
// или через переменную окружения SMARTCAPTCHA_SERVER_KEY.
if (file_exists(__DIR__ . '/config.local.php')) {
	require_once __DIR__ . '/config.local.php';
}
if (!defined('SMARTCAPTCHA_SERVER_KEY')) {
	define('SMARTCAPTCHA_SERVER_KEY', (string) getenv('SMARTCAPTCHA_SERVER_KEY'));
}

function check_captcha($token) {
    $ch = curl_init();
    $args = http_build_query([
        "secret" => SMARTCAPTCHA_SERVER_KEY,
        "token" => $token,
        "ip" => $_SERVER['REMOTE_ADDR'], // Нужно передать IP-адрес пользователя.
                                         // Способ получения IP-адреса пользователя зависит от вашего прокси.
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
      echo "Не удалось проверить капчу.";
    }
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}

$token = $_POST['smart-token'];
if (check_captcha($token)) {
    if (ContactMailer::send($page, $name, $phone, $message)) {
        echo htmlspecialchars($name) . ', Спасибо за вашу заявку! В ближайшее время мы свяжемся с Вами!';
    } else {
        echo 'Произошла ошибка! Не удалось отправить сообщение.';
    }
} else {
    echo "Не удалось проверить капчу.";
}

exit;
