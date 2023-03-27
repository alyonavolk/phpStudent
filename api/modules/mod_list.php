<form action="./" method="POST" class="form">
    <p>Сортировка по возрасту</p>
    <input type="radio" name="sort" id="sort-asc" value="asc">
    <label for="sort-asc">По позрастанию</label>
    <input type="radio" name="sort" id="sort-desc" value="desc">
    <label for="sort-desc">По убыванию</label><br>
    <input type="radio" name="filter" id="filter-asc" value="f">
    <label for="filter-asc">Женский</label>
    <input type="radio" name="filter" id="filter-desc" value="m">
    <label for="filter-desc">Мужской</label><br>
    <?php
        $resGroup = $this -> connect -> query("SELECT * FROM groups");
        foreach ($resGroup as $groupRow) {
            echo "<input type='radio' name='group' id='$groupRow[group_name]' value='$groupRow[id_group]'>
            <label for='$groupRow[group_name]'>$groupRow[group_name]</label>";
        }
    ?>
    <br><input type="submit" value="Фильтровать" class='form__btn'>
</form>

<?php
$extra_sql = " ";

if (isset($_POST['group'])) {
    $group = $this -> formatstr($_POST['group']);
    if ($group == 1) {
        $extra_sql .= " AND `groups`.id_group = 1";
    } elseif ($group == 2) {
        $extra_sql .= " AND `groups`.id_group = 2";
    } else {
        $extra_sql .= " AND `groups`.id_group = 3";
    }
}

if (isset($_POST['filter'])) {
    $filter = $this -> formatstr($_POST['filter']);
    if ($filter == 'f') {
        $extra_sql .= " AND `students`.gender = 'ж'";
    } else {
        $extra_sql .= " AND `students`.gender = 'м'";
    }
}

if (isset($_POST['sort'])) {
    $sort = $this -> formatstr($_POST['sort']);
    if ($sort == 'asc') {
        $extra_sql .= " ORDER BY s_age";
    } else {
        $extra_sql .= " ORDER BY s_age DESC";
    }
}


$result1 = $this -> connect -> query("SELECT * FROM `students`, `groups` WHERE students.id_group = groups.id_group".$extra_sql);  
$result2 = $this -> connect -> query("SELECT * FROM students ORDER BY s_lname");

foreach ($result1 as $myrow) {
    echo "<li class='student__item'>
        $myrow[s_lname] $myrow[s_fname], $myrow[gender], $myrow[s_age], $myrow[group_name] 
        <a href='?option=details&id=$myrow[id_student]'>Подробнее</a>
        </li>";
}