<?php 

if(isset($_GET['exit'])) {
    unset($_SESSION['login']);

    //$_SESSION = []; //удаляет всё
}

if(isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    echo "<p>Профиль: $login</p>
    <a href='?exit=true'>Выйти</a>";
} else {
    echo "<form action='./' method='POST'>
    <input type='text' name='login' class='form__input' placeholder='Введите логин' required><br>
    <input type='password' name='pass' class='form__input' placeholder='Введите пароль' required><br>
    <input type='submit' value='Войти' class='form__btn'>
</form>";
}

if(isset($_POST['login']) && isset($_POST['pass'])) {
    $user = new User();
    $user -> auth($_POST['login'], $_POST['pass']);
}


