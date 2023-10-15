<?php 

    if(isset($_POST['hash']) && is_numeric($_POST['rating1']) && is_numeric($_POST['rating2']) && is_numeric($_POST['rating3']) && is_numeric($_POST['certreq']))
    {
       
        $data = [
            'HASH' => $_POST['hash'], 
            'RATEDATA' => [ 
                'r1' => $_POST['rating1'], 
                'r2' => 0, 
                'r3' => $_POST['rating3'],
                'cr' => $_POST['certreq']
            ] 
        ];                                                                    
        $data_string = json_encode($data);                                                                                   

        $ch = curl_init('https://apihide.com/bitrix-api/callback_feedback_rate.php');   // where to post                                                                   
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string)
            )                                                                       
        );                                                                                                                   

        $result = curl_exec($ch);

        //var_dump($result);

        $result = json_decode($result, true);

        

        if($result['ok'] == 1) {
            $DONE = 1;
        }
        if($result['ok'] == 0) {
            $DONE = 0;
        }

    }
    
?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <title>Оценка качества</title>
        <style>
        html, body {
            font-family: 'Roboto', sans-serif; 
            background: rgb(8,13,33);
            background: linear-gradient(0deg, rgba(8,13,33,1) 0%, rgba(13,25,47,1) 50%, rgba(22,44,67,1) 100%);
            color: white;
            padding: 1rem 0;
            margin: 0;
            min-height: 100%;
        }
        figure#logo {
            text-align: center;
            margin-bottom: 3rem;
        }
        figure#logo img {
            width: 200px;
            height: auto;
        }
        h3 + div, h1 {
            margin-bottom: 3rem;
        }
        a, a:hover, a:active, a:focus {
            color: #FFD700;
        }
        .rating-area {
            overflow: hidden;
            width: 210px;
            margin: 1rem auto 3rem auto;
        }
        .rating-area:not(:checked) > input {
            display: none;
        }
        .rating-area:not(:checked) > label {
            float: right;
            width: 42px;
            padding: 0;
            cursor: pointer;
            font-size: 32px;
            line-height: 32px;
            color: lightgrey;
            text-shadow: 1px 1px #bbb;
        }
        .rating-area:not(:checked) > label:before {
            content: '★';
        }
        .rating-area > input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px #c60;
        }
        .rating-area:not(:checked) > label:hover,
        .rating-area:not(:checked) > label:hover ~ label {
            color: gold;
        }
        .rating-area > input:checked + label:hover,
        .rating-area > input:checked + label:hover ~ label,
        .rating-area > input:checked ~ label:hover,
        .rating-area > input:checked ~ label:hover ~ label,
        .rating-area > label:hover ~ input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }
        .rate-area > label:active {
            position: relative;
        }

        ul {
            display: block;
            margin: 0 auto;
            width: 280px;
        }
        ul li {
            text-align: left;
            list-style: none;
            line-height: 1.3rem;
        }
        #cert-get {
            padding: 1.3rem 1rem;
        }
        #cert-get img {
            display: block; 
            width: 100%; 
            height: auto;
            max-width: 640px;
            margin: 0 auto;
        }
        </style>
    </head>
    <body>
    <?php 
    if(isset($_GET['hash']))
    {
    ?>
        <figure id="logo"><img src="arenda-logo.png" alt=""></figure>

        <h1 style="text-align: center">Оцените по шкале  от 5 (отлично) до 1 (плохо)</h1>

        <h3 style="text-align: center">Качество работы оборудования</h3>

        <form action="/rating-aa.php" method="post">

            <div class="rating-area">
                <input type="radio" id="star1-5" name="rating1" value="5">
                <label for="star1-5" title="Оценка «5»"></label>	
                <input type="radio" id="star1-4" name="rating1" value="4">
                <label for="star1-4" title="Оценка «4»"></label>    
                <input type="radio" id="star1-3" name="rating1" value="3">
                <label for="star1-3" title="Оценка «3»"></label>  
                <input type="radio" id="star1-2" name="rating1" value="2">
                <label for="star1-2" title="Оценка «2»"></label>    
                <input type="radio" id="star1-1" name="rating1" value="1">
                <label for="star1-1" title="Оценка «1»"></label>
            </div>         

            <h3 style="text-align: center">Качество работы менеджера</h3>

            <div class="rating-area">
                <input type="radio" id="star3-5" name="rating3" value="5">
                <label for="star3-5" title="Оценка «5»"></label>	
                <input type="radio" id="star3-4" name="rating3" value="4">
                <label for="star3-4" title="Оценка «4»"></label>    
                <input type="radio" id="star3-3" name="rating3" value="3">
                <label for="star3-3" title="Оценка «3»"></label>  
                <input type="radio" id="star3-2" name="rating3" value="2">
                <label for="star3-2" title="Оценка «2»"></label>    
                <input type="radio" id="star3-1" name="rating3" value="1">
                <label for="star3-1" title="Оценка «1»"></label>
            </div>

            <h3 style="text-align: center">Проведем еще раз мероприятие?</h3>

            <div style="text-align: center" class="certreq">
                <input type="radio" id="star4-1" name="certreq" value="0" selected="" onclick="validate()">
                <label for="star4-1" title="Нет">Нет</label>	
                <input type="radio" id="star4-2" name="certreq" value="1" onclick="validate()">
                <label for="star4-2" title="Да">Да + Получить сертификат</label>  
                <div style="display: none;" id="cert-get">
                    <a target="_blank" href="cert-for-10000-by-arenda.jpeg"><img src="cert-for-10000-by-arenda.jpeg"></a>    
                </div>  
            </div>   

            <div style="text-align: center"><button style="display: inline-block; margin-bottom: 1.5rem; margin-top: 1rem; font-size: 22px;" type="submit">Отправить оценку</button></div>
            <input type="hidden" name="hash" value="<?=$_GET['hash']?>">

        </form>
        <div class="cursiv" style="text-align: center; width: 100%;">
            <p>
                Ваша команда AA Friends
            </p>
            <ul>
                <li>Сайт: <a href="https://arenda-attrakcionov.ru/" target="_blank">https://arenda-attrakcionov.ru/</a></li>
                <li>Телефон: +7 (495) 256-40-47</li>
            </ul>
        </div>
    <?php 
    }
    if($_POST['hash'] && isset($DONE) && $DONE === 1) {
        echo '<h1 style="text-align: center">Спасибо за Вашу оценку!</h1>'; 
    } elseif($_POST['hash'] && isset($DONE) && $DONE === 0) {
        echo '<h1 style="text-align: center">Вы уже проголосовали</h1>';
    }
    ?>
    <script>
        
        function validate() {
            let inputCert = document.getElementById('star4-2');
            let blCert = document.getElementById('cert-get');
            if (inputCert.checked) {
                blCert.style.display = "block";  
            } else {
                blCert.style.display = "none";     
            }
        }

        validate();
    </script>
    </body>
    </html>
<?php 
    
?>