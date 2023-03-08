<?php
abstract class ACore {
    protected $connect;

    public function __construct() {
        $this -> connect = new mysqli(HOST, USER, PASS, DB);
        if ($this -> connect -> connect_error) {
            exit("Ошибка соединения сбазой данных: ".$this -> connect -> connect_error);
        }
        $this -> connect -> set_charset('utf8');
    }

    public function __destruct() {
        $this -> connect -> close();
    }

    public function get_body() {
        include("templates/index.php");
    }
}