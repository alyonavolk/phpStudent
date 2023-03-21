<?php
class Details extends ACore {
    public function get_content() {
        if(isset($_GET['id'])) {
            $id = $this -> formatstr($_GET['id']);
            include("api/modules/mod_details.php");
        }
        else {
            echo '<p>Не верные данные</p>';
        }
    }
}