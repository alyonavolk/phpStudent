<?php
class User extends ACore {
    public function auth($login, $pass) {
        $result = $this -> connect -> query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = md5('$pass')");
        if ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
            $_SESSION['login'] = $row['login'];
            echo "<p>Вы авторизованы</p>";
            header("Location: ./");
        } else {
            echo "<p>Логин или пароль не верен</p>";
        }
    }
}