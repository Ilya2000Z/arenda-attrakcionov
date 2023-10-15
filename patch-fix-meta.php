<?php

$host = '127.0.0.1:3310'; //имя хоста (для локального сервера localhost)
$database = 'arenda24'; //имя базы данных
$user = 'effectik'; //имя пользователя СУБД (по умолчанию: root)
$password = 'qZ0jY8oO4j'; //пароль пользователя (по умолчанию: ничего)

$link = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_error($link)); //если возникнет ошибка подключения - выведем на экран

$query = "SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'filter_labels' && `meta_value` != '' ORDER BY `wp_postmeta`.`post_id` ASC "; //производим выборку по двум столбцам запросом SQL
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if (!$result) { //в случае ошибки запроса уведомляем об этом
    echo "Выполнение запроса прошло не успешно";
}

$update_data = [];

while ($row = mysqli_fetch_row($result)) { //выводим на страницу результаты выборки
    // echo "<b>$row[1]</b>:<b>$row[2]</b>:<b>$row[3]</b><br/>"; //красиво оформляем
    if(!empty(trim($row[3])))
    if(isset($update_data[$row[1]])) { 
        $update_data[$row[1]] .= trim($row[3]);
    } else {
        $update_data[$row[1]] = trim($row[3]);
    }
    
}


// $path = './new-file.json';
// // JSON data as an array

// // Convert JSON data from an array to a string
// $jsonString = json_encode($update_data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
// // Write in the file
// $fp = fopen($path, 'w');
// fwrite($fp, $jsonString);
// fclose($fp);

// echo "<pre>";
// print_r($update_data);
// echo "</pre>";

foreach($update_data as $key => $value) 
{

    echo "<b>$key|$value</b><br>";
    $query = "DELETE FROM `wp_postmeta` WHERE `meta_key` = 'filter_labels' AND `post_id` = $key"; //производим выборку по двум столбцам запросом SQL
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if (!$result) { //в случае ошибки запроса уведомляем об этом
        echo "Выполнение запроса прошло не успешно 1";
    }
    $query = "INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES ($key,'filter_labels','$value')"; //производим выборку по двум столбцам запросом SQL
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if (!$result) { //в случае ошибки запроса уведомляем об этом
        echo "Выполнение запроса прошло не успешно 2";
    }

    

}