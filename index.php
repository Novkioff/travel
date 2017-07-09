<?
include("php/db.php");
if (isset($_POST["tourist_surname"])) {$surname = $_POST["tourist_surname"]; if ($surname == '') {unset($surname);}}
if (isset($_POST["tourist_name"])) {$name = $_POST["tourist_name"]; if ($name == '') {unset($name);}}
if (isset($_POST["tourist_secname"])) {$secname = $_POST["tourist_secname"]; if ($secname == '') {unset($secname);}}
if (isset($_POST["tourist_sex"])) {$sex = $_POST["tourist_sex"]; if ($sex == '') {unset($sex);}}
if (isset($_POST["tourist_birthdate"])) {$birthdate = $_POST["tourist_birthdate"]; if ($birthdate == '') {unset($birthdate);}}
if (isset($_POST["tourist_pasport"])) {$pasport = $_POST["tourist_pasport"]; if ($pasport == '') {unset($pasport);}}
if (isset($_POST["country_shortname"])) {$short_name = $_POST["country_shortname"]; if ($short_name == '') {unset($short_name);}}
if (isset($_POST["country_name"])) {$full_name = $_POST["country_name"]; if ($full_name == '') {unset($full_name);}}
if (isset($_POST["country_continent"])) {$continent = $_POST["country_continent"]; if ($continent == '') {unset($continent);}}
if (isset($_POST["country_visa"])) {$visa = $_POST["country_visa"]; if ($visa == '') {unset($visa);}}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Туристическое агенство главная</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <header>
        <h1>Заявка на покупку тура</h1>
    </header>
    <div class="wrapper">
        <main>
            <?php if (isset($surname)) {
                $tour_rec = mysqli_query($db, "INSERT INTO nk_tourists (surname, name, secname, sex, birthdate, pasport) VALUES ('$surname','$name','$secname','$sex','$birthdate','$pasport')");
                $country_rec = mysqli_query($db, "INSERT INTO nk_countrys (short_name, full_name, continent, visa) VALUES ('$short_name','$full_name','$continent','$visa')");
                if ($tour_rec==true || $country_rec==true) {
                    echo "<p>Данные Внесены</p>";
                    echo "<a href='index.php' title='назад'>Назад</a>";
						}
                else {
                    echo "<p>Данные  НЕ Внесены</p>";
                    echo "<a href='index.php' title='назад'>Назад</a>";
						}
            }
            else {
                echo '
                        <form name = "request" action = "index.php" method = "post" >
                    <div class="tourists" >
                        <h2 > Информация о туристе </h2 >
                        <label for="tourist_surname" > Фамилия</label ><br >
                        <input type = "text" name = "tourist_surname" id = "tourist_surname" placeholder = "Введите фамилию туриста" >
                        <label for="tourist_name" > Имя</label ><br >
                        <input type = "text" name = "tourist_name" id = "tourist_name" placeholder = "Введите имя туриста" >
                        <label for="tourist_secname" > Отчество</label ><br >
                        <input type = "text" name = "tourist_secname" id = "tourist_secname" placeholder = "Введите отчество туриста" >
                        <label for="tourist_sex" > Пол</label ><br >
                        <select name = "tourist_sex" id = "tourist_sex" >
                            <option value = "Мужской" >Мужской</option >
                            <option selected value = "Женский" >Женский</option >
                        </select >
                        <label for="tourist_birthdate" > Дата рождения </label ><br>
                        <input type = "date" name = "tourist_birthdate" id = "tourist_birthdate">
                        <label for="tourist_pasport">Заграничный паспорт </label ><br >
                        <select name = "tourist_pasport" id = "tourist_pasport" >
                            <option value = "Да">Да</option >
                            <option selected value = "Нет">Нет</option >
                        </select >
                    </div >
                    <div class="countrys" >
                        <h2 > Информация о стране для направления на отдых </h2 >
                        <label for="country_shortname" > Сокращенное название страны </label ><br >
                        <input type = "text" name = "country_shortname" id = "country_shortname" placeholder = "Введите сокращенное название страны" ><br >
                        <label for="country_name" > Полное название страны </label ><br >
                        <input type = "text" name = "country_name" id = "country_name" placeholder = "Введите полное название страны" ><br >
                        <label for="country_continent" > Континент</label ><br >
                        <input type = "text" name = "country_continent" id = "country_continent" placeholder = "Введите континент" ><br >
                        <label for="country_visa" > Оформление визы </label ><br >
                        <select name = "country_visa" id = "country_visa" >
                            <option value = "Нет" > Нет</option >
                            <option selected value = "На границе" > На границе </option >
                            <option selected value = "Обязательное оформление" > Обязательное оформление </option >
                        </select >
                    </div >
                    <button type = "submit" name= "submit"> Отправить</button >
                </form >
            </main >';}
            ?>
    </div>
</div>
</body>
</html>