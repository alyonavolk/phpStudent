<?php
class Details extends ACore {
    public function get_content() {
        include("api/modules/mod_auth.php");
        if(isset($_GET['id'])) {
            $id = $this -> formatstr($_GET['id']);
            include("api/modules/mod_details.php");
        }
        else {
            echo '<p>Не верные данные</p>';
        }
    }
}