<?php
$result1 = $this -> connect -> query("SELECT * FROM students");
$result2 = $this -> connect -> query("SELECT * FROM students ORDER BY s_lname");

foreach ($result2 as $myrow) {
    echo "<li class='student__item'>
        $myrow[s_lname] $myrow[s_fname], $myrow[s_age]
        <li>";
}