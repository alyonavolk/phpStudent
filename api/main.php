<?php
class Main extends ACore {
    public function get_content() {
        include("api/modules/mod_auth.php");
        include("api/modules/mod_list.php");
    }
}