<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
    <h1 class="student__title">Информация о студентах</h1>
    <ol class="student__items">
        <?php
            $this -> get_content();
        ?>
    </ol>
</body>
</html>