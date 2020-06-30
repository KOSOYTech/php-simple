<?php
	echo "<p style='display: block; width: 300px; margin-left: auto; margin-right: auto;'>Учёт выпитого алкоголя:</p>";

	// Соединяемся с базой данных
	$host = 'localhost';  // Хост, у нас все локально
	$user = 'kosoy95480_simpl';    // Имя созданного нами пользователя
	$pass = 'ZimaBlizko'; // Установленный вами пароль пользователю
	$db_name = 'kosoy95480_simpl';   // Имя базы данных
	$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Пишем запрос на показ содержимого таблицы
    $uchet = mysqli_query($link, "SELECT * FROM alcohol;");
    
    // Выводим таблицу
	echo "<table style='margin-left: auto; margin-right: auto; font-size: 35px;'><tbody>";
	echo "<tr><td>ID</td><td>Выпивающий</td><td>Количество литров</td></tr>";
    while ($row = mysqli_fetch_row($uchet)) {
        echo '<tr>';
        printf ("<td>%s</td> <td>%s</td> <td>%s</td>", $row[0], $row[1], $row[2]);
      	echo '</tr>';
    }
	echo "</tbody></table>";

    // Придумываем выпивающих
    // Массив имен выпивающих
    $alcoholarray = array("Валерио", "Казбек", "Вася", "Джон", "Рагнар", "Юля");

    // Формируем в цикле случайую строку VALUES, чтобы вставлялось от 3 до 6 новых записей
	// Случайно определяем, сколько добавить записей
    $kolichesctvo = rand(3, 6);

    // Инициализируем строку VALUES
    $values = '';

    // Цикл составления строки VALUES
    for ($i = 1; $i <= $kolichesctvo; $i++) {
        
        // Выбираем случайного выпивающего
        $sluchalc = $alcoholarray[rand(0, 5)];
      
        // Придумываем случайное количество литров
        $sluchlitr = rand(1, 10);
      
        // Добавляем значения в строку
    	$values .= "('   $sluchalc ', ' $sluchlitr '),";
	}
    
    // Обрезаем последнюю запятую в строке, чтобы не было ошибок при вставке в таблицу
    $values = substr($values, 0, -1); 

    // Формируем запрос
	$newalcogolics = "INSERT INTO alcohol (imya, litri) VALUES $values";
    
    // Добавляем в таблицу
    $link->query($newalcogolics);
    
    // Кнопка обновления страницы
    echo "<a style='display: block; width: 300px; color: black; bacgkround-color: white; font-size: 20px; margin-left: auto; margin-right: auto;' href='/mysql-alcohol.php'>Обновить страницу</a>";
?>