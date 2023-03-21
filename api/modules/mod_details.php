<?php

$result = $this -> connect -> prepare("SELECT * FROM `students`, `groups` WHERE students.id_group = groups.id_group AND id_student = ?");
$result -> bind_param("i", $id);
// $result = $this -> connect -> prepare("SELECT * FROM `students` WHERE id_student = ? AND s_fname = ?");
// $result -> bind_param("is", $id, $s_fname);
$result -> execute();
$rows = $result -> get_result(); 

echo "<a href='./'>Назад</a>";

if (!$result) {
    echo "<p>Данных нет</p>";
} else {
    $row = $rows -> fetch_assoc();
    echo "<div class='details'> 
        <img class='details__img' src='$row[path]' alt=''>
        <div>
            <p>$row[s_lname] $row[s_fname]</p> 
            <p>Пол $row[gender]</p>
            <p>Возраст $row[s_age]</p>
            <p>Группа: $row[group_name]</p>
        </div>
    </div>";
}

?>