<?php

header('Content-Type: text/html; charset=utf-8');

$host = '127.0.0.1:3310'; //имя хоста (для локального сервера localhost)
$database = 'arenda24'; //имя базы данных
$user = 'effectik'; //имя пользователя СУБД (по умолчанию: root)
$password = 'qZ0jY8oO4j'; //пароль пользователя (по умолчанию: ничего)

$link = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_error($link)); //если возникнет ошибка подключения - выведем на экран

$query = "SELECT `meta_value` FROM `arenda24`.`wp_postmeta` WHERE CONVERT(`meta_value` USING utf8) LIKE '%грузчик%' ORDER BY `wp_postmeta`.`post_id` ASC LIMIT 1";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

if (!$result) {
    echo "Выполнение запроса прошло не успешно";
}

$update_data = [];

while ($row = mysqli_fetch_row($result)) {
    //выводим на страницу результаты выборки

    echo "$row[0]"; //красиво оформляем

    // $dom = new DOMDocument();
    // $dom->loadHTML($row[0]);
    // $xpath = new DOMXpath($dom);
    // $result = $xpath->query('//table');
    // if ($result->length > 0) {
    //     echo $result->item(0)->nodeValue;
    // }

    die();

}