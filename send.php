<?
        if(isset($_POST['area'])){
            $area = $_POST['area'];
        } else {
            $area = "0";
        }
        $to = 'pareto-marketing@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = "Вопрос по аренде помещения"; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>
                        <p>Телефон: '.$_POST['phone'].'</p>        
                        <p>Офис: '.$area.' метров</p>                
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Galant <galant@site.com>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail

?>